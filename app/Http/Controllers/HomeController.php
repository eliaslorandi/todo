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

        $carbonDate = Carbon::createFromDate($filteredDate);//Lib carbon para formatar data

        $data['dateAsString'] = $carbonDate ->translatedFormat('d M');
        $data['datePrevButton'] = $carbonDate->addDay(-1)->translatedFormat('Y-m-d');
        $data['dateNextButton'] = $carbonDate->addDay(2)->translatedFormat('Y-m-d');

        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();
        $data['AuthUser'] = Auth::user();

        $data['tasks_count'] = $data['tasks']->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();

        return view('tasks/home', $data);
    }
}
