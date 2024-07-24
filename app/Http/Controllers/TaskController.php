<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){

    }

    public function create(Request $request){
        $categories = Category::all();
        $data['categories'] = $categories;

        return view('tasks.create', $data);
    }

    public function create_action(Request $request) {
        $request->validate([
            'title' => 'required|string|max:100',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id', //exige que valor exista na tabela categories, coluna id
            'description' => 'required|string',
        ]);
      
        //Coleta as infos da tarefa e vincula ao usuario
        $task = $request->only(['title', 'due_date', 'category_id', 'description']);
        $task['user_id'] = Auth::id();

        //Cria tarefa no db
        Task::create($task);

        return redirect(route('home'));
    }

    public function edit(Request $request){
        $id = $request->id;
        
        $task = Task::find($id);
        if (!$task) {
            return redirect(route('home'));
        }
        $categories = Category::all();
        $data['categories'] = $categories;
        $data['task'] = $task;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request){
        $request_data = $request->only(['title', 'due_date', 'category_id', 'description']);
        $request_data['is_done'] = $request->is_done ? true : false;
        $task = Task::find($request->id);
        if (!$task) {
            return 'Task não existente';
        }
        $task->update($request_data);
        $task->save();
        return redirect(route('home'));
    }

    public function update(Request $request){
        $task = Task::findOrFail($request->taskId);
        if(!$task){
            return ['sucess' => false];
        }
        $task->is_done = $request->status;
        $task->save();
        return['success' => true];
    }

    public function delete(Request $request){
        $id = $request->id;
        $task = Task::find($id);
        if($task){
            $task->delete();
        }
        return redirect(route('home'));
    }

}
