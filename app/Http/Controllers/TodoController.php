<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {
        $todos = Todo::all();

        return view('welcome', compact('todos'));
    }

  public function store(Request $request)
    {
        $todo = new Todo(); 
        $todo->text = $request->text; 
        $todo->save();

        return redirect()->route('welcome');
    }
}
