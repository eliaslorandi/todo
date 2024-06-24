<?php

namespace App\Http\Controllers;

use App\Models\Task;
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

        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();
        $data['AuthUser'] = Auth::user();

        $data['tasks_count'] = $data['tasks']->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();

        return view('home', $data);
    }
}
