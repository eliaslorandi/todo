<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('category.create_category');
    }

    public function create_action(Request $request){
        $request->validate([
            'title' => 'required|string|max:30',
        ]);

        $category = $request->only(['title']);
        $category['user_id'] = Auth::id();

        Category::create($category);

        return redirect(route('authenticated'));
    }
}
