<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use App\Support\Toast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $query = $this->baseQuery($request);

        $status = $request->string('status')->toString();
        if ($status === 'completed') {
            $query->whereNotNull('completed_at');
        }
        if ($status === 'incomplete') {
            $query->whereNull('completed_at');
        }

        $category = $request->string('category')->toString();
        if ($category !== '') {
            $query->where('category_id', $category);
        }

        $this->applyDateRange($query, $request);

        $tasks = $query->paginate(9)->withQueryString();
        $categories = $request->user()->categories()->orderBy('name')->get();

        return view('dashboard.task-board', [
            'tasks'         => $tasks,
            'categories'    => $categories,
            'filters'       => [
                'status'    => $status,
                'category'  => $category,
                'from'      => $request->string('from')->toString(),
                'to'        => $request->string('to')->toString(),
            ],
        ]);
    }

    public function todo(Request $request): View
    {
        $tasks = $this->baseQuery($request)
            ->whereNull('completed_at')
            ->whereNull('task_date')
            ->paginate(8);

        return view('dashboard.tasks-todo', [
            'tasks' => $tasks,
            'categories' => $request->user()->categories()->orderBy('name')->get(),
        ]);
    }

    public function inProgress(Request $request): View
    {
        $tasks = $this->baseQuery($request)
            ->whereNull('completed_at')
            ->whereNotNull('task_date')
            ->paginate(8);

        return view('dashboard.tasks-in-progress', [
            'tasks' => $tasks,
            'categories' => $request->user()->categories()->orderBy('name')->get(),
        ]);
    }

    public function completed(Request $request): View
    {
        $tasks = $this->baseQuery($request)
            ->whereNotNull('completed_at')
            ->paginate(8);

        return view('dashboard.tasks-completed', [
            'tasks' => $tasks,
            'categories' => $request->user()->categories()->orderBy('name')->get(),
        ]);
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $user = $request->user();

        /** @var Task $task */
        $category   = $this->resolveCategory($request->user(), $data);
        $task       = $user->tasks()->make([
            'title'         => $data['title'],
            'description'   => $data['description'] ?? null,
            'is_recurring'  => (bool) ($data['is_recurring'] ?? false),
            'task_date'     => $data['task_date'] ?? null,
        ]);
        $task->category()->associate($category)->save();

        Toast::success('Task created successfully!');

        return redirect()->route('tasks.all');
    }

    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {

        $data       = $request->validated();
        $category   = $this->resolveCategory($request->user(), $data);

        $task->category()->associate($category);
        $task->update([
            'title'         => $data['title'],
            'description'   => $data['description'] ?? null,
            'is_recurring'  => (bool) ($data['is_recurring'] ?? false),
            'task_date'     => $data['task_date'] ?? null,
        ]);

        Toast::success('Task updated successfully!');

        return redirect()->route('tasks.all');
    }

    public function destroy(Task $task): RedirectResponse
    {

        $task->delete();

        Toast::success('Task deleted successfully!');

        return redirect()->route('tasks.all');
    }

    public function toggle(Task $task): RedirectResponse
    {

        $task->update([
            'completed_at' => $task->completed_at ? null : now(),
        ]);

        Toast::success($task->completed_at ? 'Task marked completed.' : 'Task marked incomplete.');

        return redirect()->route('tasks.all');
    }

    private function baseQuery(Request $request): Builder
    {
        return $request->user()->tasks()->with('category')->latest()->getQuery();
    }

    private function applyDateRange(Builder $query, Request $request): void
    {
        $from = $this->parseDate($request->string('from')->toString());
        $to = $this->parseDate($request->string('to')->toString());

        if ($from) {
            $query->whereDate('task_date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('task_date', '<=', $to);
        }
    }

    private function parseDate(string $value): ?Carbon
    {
        if ($value === '') {
            return null;
        }

        try {
            return Carbon::createFromFormat('Y-m-d', $value);
        } catch (\Throwable $exception) {
            return null;
        }
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function resolveCategory(User $user, array $data): ?Category
    {
        if (! empty($data['category_id'])) {
            $categoryId = (int) $data['category_id'];
            return Category::find($categoryId);
        }

        $name = $data['category_name'] ?? null;
        if (! $name) {
            return null;
        }

        /** @var Category $category */
        $category = $$user->categories()->firstOrCreate([
            'name' => $name,
        ]);

        return $category;
    }
}
