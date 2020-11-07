<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Session;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Todo::orderBy('id','desc')->paginate(5);
        return view('todo.index')->with('storedTasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'newTaskName' => 'required|min:5|max:255',
        ]);

        $task = new Todo;
        $task -> name = $request -> newTaskName;

        $task->save();
        Session::flash('success','New task has been successfully added');
        return redirect() -> route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Todo::find($id);
        return view('todo.edit')->with('taskToEdit',$task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request,[
            'updatedTaskName' => 'required|min:5|max:255',
        ]);
        $task = Todo::find($id);
        $task->name = $request->updatedTaskName;
        $task->save();
        Session::flash('success','Task # '.$id.' has been succesfully updated');
        return redirect()-> route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $todo = Todo::find($id);
       $todo -> delete();
       Session::flash('error','Task # '.$id.' has been succesfully deleted');
       return redirect()-> route('tasks.index');
    }
}
