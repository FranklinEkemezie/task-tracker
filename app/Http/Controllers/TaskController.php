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
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $query = $this->baseQuery($request);

        $status = $request->string('status')->toString();
        $query
            ->when($status === 'completed', fn ($query) => $query->whereNotNull('completed_at'))
            ->when($status === 'incomplete', fn ($query) => $query->whereNotNull('completed_at'))
            ->when($request->filled('category'), fn ($query) => $query->where('category_id', '=', $request['category']))
            ->when($request->filled('date_from'), fn ($query) => $query->whereDate('task_date', '>=', $request['date_from']))
            ->when($request->filled('date_to'), fn ($query) => $query->whereDate('task_date', '<=', $request['date_to']))
            ->latest();

        $tasks = $query->paginate(9)->withQueryString();
        $categories = $request->user()->categories()->orderBy('name')->get();

        return view('dashboard.task-board', [
            'tasks'         => $tasks->toResourceCollection()->resolve(),
            'links'         => fn () => $tasks->links(),
            'categories'    => $categories,
            'filters'       => $request->only(['status', 'category', 'date_from', 'date_to'])
        ]);
    }

    public function todo(Request $request): View
    {
        $tasks = $this->baseQuery($request)
            ->whereNull('completed_at')
            ->whereNull('task_date')
            ->paginate(8);

        return view('dashboard.tasks-todo', [
            'tasks'         => $tasks->toResourceCollection()->resolve(),
            'links'         => fn () => $tasks->links(),
            'categories'    => $request->user()->categories()->orderBy('name')->get(),
        ]);
    }

    public function inProgress(Request $request): View
    {
        $tasks = $this->baseQuery($request)
            ->whereNull('completed_at')
            ->whereNotNull('task_date')
            ->paginate(8);

        return view('dashboard.tasks-in-progress', [
            'tasks'         => $tasks->toResourceCollection()->resolve(),
            'links'         => fn () => $tasks->links(),
            'categories'    => $request->user()->categories()->orderBy('name')->get(),
        ]);
    }

    public function completed(Request $request): View
    {
        $tasks = $this->baseQuery($request)
            ->whereNotNull('completed_at')
            ->paginate(8);

        return view('dashboard.tasks-completed', [
            'tasks'         => $tasks->toResourceCollection()->resolve(),
            'links'         => fn () => $tasks->links(),
            'categories'    => $request->user()->categories()->orderBy('name')->get(),
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

        $data = $request->validated();

        $category = $this->resolveCategory($request->user(), $data);
        if ($request->user()->cannot('manage', $category)) {
            Toast::warning('The given category does not exist!');
            throw ValidationException::withMessages(['category_id' => 'The given category does not exist.']);
        }

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
        $category = $user->categories()->firstOrCreate([
            'name' => $name,
        ]);

        return $category;
    }
}
