<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $categories = Category::where('user_id', $userId)->get();
        $data['categories'] = $categories;

        return view('tasks.create_task', $data);
    }

    public function create_action(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'due_date' => 'required|date',
            'category_id' => [
                'required',
                //este codigo verifica se o category_id fornecido no formulario:
                Rule::exists('categories', 'id')->where(function ($query) { //assegura que o campo 'categort_id' durante a criação ou atualização de uma tarefa corresponde a uma categoria que realmente existe no banco de dados e que pertence ao usuário autenticado. 
                    return $query->where('user_id', Auth::id());
                })
            ],
            'description' => 'required|string',
        ]);

        //Coleta as infos da tarefa e vincula ao usuario
        $task = $request->only(['title', 'due_date', 'category_id', 'description']);
        $task['user_id'] = Auth::id();

        //Cria tarefa no db
        Task::create($task);

        return redirect(route('authenticated'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $task = Task::find($id);
        if (!$task) {
            return redirect(route('authenticated'));
        }
        $categories = Category::all();
        $data['categories'] = $categories;
        $data['task'] = $task;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request)
    {
        $request_data = $request->only(['title', 'due_date', 'category_id', 'description']);
        $request_data['is_done'] = $request->is_done ? true : false;
        $task = Task::find($request->id);
        if (!$task) {
            return 'Task não existente';
        }
        $task->update($request_data);
        $task->save();
        return redirect(route('authenticated'));
    }

    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        if (!$task) {
            return response()->json(['success' => false, 'message' => 'Task não encontrada'], 404);
        }
        $task->is_done = $request->status ? 1 : 0;
        $task->save();

        return response()->json(['success' => true, 'task' => $task]);
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect(route('authenticated'));
    }
}
