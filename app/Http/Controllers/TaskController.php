<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Nette\Utils\Random;
use App\Models\User;

class TaskController extends Controller
{

    function addTask(Request $req) {
        $user_id = rand(1, 3); // Assuming user IDs range from 1 to 3
        $user = User::find($user_id);

        if ($user) {
            $task = new Task;
            $task->user_id = $user_id;
            $task->title = $req->title;
            $task->status = $req->status;
            $task->save();

            return redirect()->back()->with('success', 'Task added successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid user ID');
        }
    }

    function editTask(Request $req) {
        $task = Task::find($req->id);

        if ($task) {
            $task->title = $req->title;
            $task->status = $req->status;
            $task->save();

            return redirect()->back()->with('success', 'Task updated successfully');
        } else {
            return redirect()->back()->with('error', 'Task not found');
        }
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect()->back()->with('success', 'Task deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Task not found');
        }
    }
}