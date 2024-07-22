<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){

        //dd($request->date);
        if($request->date){
            $filteredDate = $request->date;
        } else {
            $filteredDate = date('Y-m-d');
        }

        $carbonDate = Carbon::createFromFormat('Y-m-d', $filteredDate, 'America/Sao_Paulo');//Lib carbon para formatar data

        $data['dateAsString'] = $carbonDate ->translatedFormat('d M');
        $data['datePrevButton'] = $carbonDate->addDay(-1)->translatedFormat('Y-m-d'); //volta 1 dia
        $data['dateNextButton'] = $carbonDate->addDay(2)->translatedFormat('Y-m-d'); //avança 1 dia

        //autenticação do usuario
        $user = Auth::user();

        //Filtragem das tasks pelo id do usuario
        $data['tasks'] = Task::where('user_id', $user->id)->whereDate('due_date', $filteredDate)->get();

        $data['tasks_count'] = $data['tasks']->count();
        $data['done_tasks_count'] = $data['tasks']->where('is_done', true)->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();

        return view('tasks/home', $data);
    }
}
