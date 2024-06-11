<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

    }

    public function create(Request $request){
        $categories = Category::all();

        $data['categories'] = $categories;

        return view('tasks.create', $data);
    }

    public function edit(Request $request){
        return view('tasks.edit');
    }

    public function delete(Request $request){
        //deleta e redireciona para home
        return redirect(route('home'));
    }

}
