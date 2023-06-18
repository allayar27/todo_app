<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskConfirmController extends Controller
{

    public function __invoke(Task $task)
    {
        $task->status = 'completed';
        $task->save();
        return redirect(route('tasks.index'));
    }
}
