<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
    public function index()
    {
        return view('todos.index')->with('todos', Todo::all()->reverse());
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $todo = new Todo();

        $this->validate($request, [
            'name' => 'required',
            'descriptio' => 'required'
            ]
        );

        $todo->name = $request['name'];
        $todo->descriptio = $request['descriptio'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Task created');

        return redirect('/todos');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        session()->flash('success', 'Task completed');

        return redirect('/todos');
    }
}
