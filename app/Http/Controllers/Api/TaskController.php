<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    // Add a Task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'is_completed' => $request->is_completed ?? false,
        ]);

        return response()->json($task, 201);
    }

    // Mark Task as Completed
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'is_completed' => 'required|boolean',
        ]);

        $task->is_completed = $request->is_completed;
        $task->save();

        return response()->json($task);
    }

    // Get Pending Tasks
    public function pending()
    {
        $tasks = Task::where('is_completed', false)->get();
        return response()->json($tasks);
    }
}
