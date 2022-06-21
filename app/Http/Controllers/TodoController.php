<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use App\Http\Requests\TextRequest;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {
        // $todos = Todo::all();
        
        $todos = Todo::where('name', '=', Auth::user()->id)->get();

        return view('welcome', compact('todos'));
    }

  public function store(TextRequest $request)
    {
        $todo = new Todo();
        $todo->name = $request->name; 
        $todo->text = $request->text; 
        $todo->save();

        return redirect()->route('welcome');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        $user = User::find($todo->name);
        $user_name = $user->name;

        return view('show', compact('todo','user_name'));
    }

    public function delete($id)
    {
        Todo::destroy($id);

        return redirect()->route('welcome');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('edit', compact('todo'));
    }

    public function update(TextRequest $request, $id)
    {
        $todo = Todo::find($id);
        $todo->text = $request ->text;
        $todo->save();

        return redirect()->route('welcome');
    }
}
