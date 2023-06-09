<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{

    public function index(): View
    {
        $tasks = Task::query()->orderByDesc('created_at')->get();
        return view('todo.index', compact('tasks'));
    }


    public function create()
    {
        
    }


    public function store(TaskRequest $request, Task $task): RedirectResponse
    {
        $validated = $request->validated();
        $task->create($validated);
        return redirect(route('tasks.index'));
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id): View
    {
        $task = Task::query()->findOrFail($id);
        return view('todo.edit', compact('task'));
    }


    public function update(TaskRequest $request, string $id): RedirectResponse
    {
        $validate = $request->validated();
        Task::query()->where('id', $id)->update($validate);
        return redirect(route('tasks.index'));
    }


    public function destroy(string $id): RedirectResponse
    {
        Task::query()->findOrFail($id)->delete();
        return redirect(route('tasks.index'));
    }
}
