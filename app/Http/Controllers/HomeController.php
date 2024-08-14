<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function authenticated(Request $request)
    {

        //dd($request->date);

        // Definindo a data filtrada
        $filteredDate = $request->date ? $request->date : date('Y-m-d');

        $carbonDate = Carbon::createFromFormat('Y-m-d', $filteredDate, 'America/Sao_Paulo');

        // Configurando as variáveis para a view
        $data['dateAsString'] = $carbonDate->translatedFormat('d M');
        $data['datePrevButton'] = $carbonDate->copy()->subDay()->translatedFormat('Y-m-d');
        $data['dateNextButton'] = $carbonDate->copy()->addDay()->translatedFormat('Y-m-d');

        // Obtendo o usuário autenticado
        $user = Auth::user();

        // Filtrando tarefas por usuário
        $data['tasks'] = Task::where('user_id', $user->id)->get();

        // Filtrando tarefas do dia selecionado
        $data['tasks_for_day'] = Task::where('user_id', $user->id)
            ->whereDate('due_date', $filteredDate)
            ->get();

        // Contando tarefas
        $data['tasks_count'] = $data['tasks_for_day']->count();
        $data['done_tasks_count'] = $data['tasks_for_day']->where('is_done', true)->count();
        $data['undone_tasks_count'] = $data['tasks_for_day']->where('is_done', false)->count();

        return view('tasks/home', $data);
    }

    public function welcome(){
        return view('components/welcome');
    }
}
