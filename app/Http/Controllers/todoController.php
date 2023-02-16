<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->paginate(3);

        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request): RedirectResponse
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();

        Todo::create($data);

        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo) #: Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $todo) #: Response
    {
        if (!$todoedit = Todo::find($todo))
            return redirect()->route('todo.index');

        return view('todo.edit', compact('todoedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, int $todo): RedirectResponse
    {
        $data = $request->all();

        if (!$todoedit = Todo::find($todo)) {
            return redirect()->route('todo.index');
        }


        if ($data['completed'] == "on") {
            $data['completed'] = 1;
        } else {
            $data['completed'] = 0;
        }


        $todoedit->update($data);

        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $todo): RedirectResponse
    {
        if (!$tododel = Todo::find($todo))
            return redirect()->route('todo.index');

        $tododel->delete();

        return redirect()->route('todo.index');
    }
}
