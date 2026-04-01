<?php

namespace App\Console\Commands;

use App\Enums\TaskFrequency;
use App\Models\RecurringTask;
use App\Models\Task;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class GenerateRecurringTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-recurring-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate recurring tasks.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        //

        // 1. Determine which date we're generating the tasks for (default it to today)

        $targetDate = today();

        // 2. Find all recurring task templates that are within their date range and are not marked as soft deleted

        $recurringTasksQuery = RecurringTask::query()
            ->active($targetDate)
            ->whereDoesntHave('tasks', fn(Builder  $q) => $q->whereDate('task_date', $targetDate));

        if (! ($totalRecurringTasks = $recurringTasksQuery->count())) {
            $this->info('No active recurring tasks found.');
            return self::FAILURE;
        }

        $this->info('Processing ' . $totalRecurringTasks . ' recurring tasks templates...');

        $created = 0;
        $skipped = 0;

        $recurringTasksQuery->chunkById(250, function (Collection $recurringTasks) use ($targetDate, &$created, &$skipped) {

            try {


                $createTasksBatch = [];

                foreach ($recurringTasks as $recurringTask) {

                    /** @var RecurringTask $recurringTask */

                    try {

                        // 3. For each recurring task template, check if we should generate a task for this date based on frequency rule

                        if (! $this->isRecurringTasksDue($recurringTask, $targetDate)) {
                            $this->info('Skipping task: ' . $recurringTask->id);
                            $skipped++;
                            continue;
                        }

                        // 4. Verify we haven't already generated this task to prevent duplicates
                        // Already done in No. 2 query

                        // 5. Create the task instance

                        $createTasksBatch[] = [
                            'uuid'              => (string) Str::uuid7(),
                            'user_id'           => $recurringTask->user_id,
                            'category_id'       => $recurringTask->category_id,
                            'title'             => $recurringTask->title,
                            'description'       => $recurringTask->description,
                            'recurring_task_id' => $recurringTask->id,
                            'task_date'         => $targetDate,
                            'created_at'        => now(),
                            'updated_at'        => now()
                        ];

                        if (! empty($createTasksBatch)) {
                            Task::insert($createTasksBatch);
                        }

                        $created = count($createTasksBatch);

                    } catch (Exception $e) {

                        report($e);
                    }

                }

            } catch (Exception $e) {

                report($e);

            }

        });


        // 6. Check if any recurring tasks have passed their end date and soft delete them
        // Moved to ArchiveExpiredRecurringTasks command

        // 7. Output feedback so we know what happened

        $this->info('Created ' . $created . ' recurring tasks.');

        if ($skipped > 0) {
            $this->warn('Skipped ' . $skipped . ' recurring tasks.');
        }

        $this->newLine();

        return self::SUCCESS;
    }

    protected function isRecurringTasksDue(RecurringTask $recurringTask, Carbon $targetDate): bool
    {
        return match ($recurringTask->frequency) {
            TaskFrequency::DAILY    => true,
            TaskFrequency::WEEKDAYS => $targetDate->isWeekday(),
            TaskFrequency::WEEKLY   => $this->isWeeklyRecurringTaskDue($recurringTask, $targetDate),
            TaskFrequency::MONTHLY  => $this->isMonthlyRecurringTaskDue($recurringTask, $targetDate),
        };
    }

    protected function isWeeklyRecurringTaskDue(RecurringTask $recurringTask, Carbon $targetDate): bool
    {
        $config = $recurringTask->frequency_config;

        if (!$config || !isset($config['days']) || !is_array($config['days'])) {
            return false;
        }

        return in_array(strtolower($targetDate->englishDayOfWeek), $config['days']);
    }

    protected function isMonthlyRecurringTaskDue(RecurringTask $recurringTask, Carbon $targetDate): bool
    {
        $config = $recurringTask->frequency_config;

        if (!$config || !isset($config['day'])) {
            return false;
        }

        $dayOfMonth = min($config['day'], $targetDate->daysInMonth());

        return $targetDate->day === $dayOfMonth;
    }
}
