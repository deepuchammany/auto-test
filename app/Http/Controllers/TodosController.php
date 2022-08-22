<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos=Todos::where('user_id',Auth::user()->id)->get();
        return view('home', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todo = new Todos();
        $todo->user_id=$request->user_id;
        $todo->description=$request->description;
        $todo->save();
        return redirect('/home')->with('status','Todo created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $todo = Todos::where('id',$id)->select('id','user_id','description')->first();
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(Todos $todos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodosRequest  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todos $todos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todo = Todos::find($id);
        $todo->delete();
        return redirect('/home')->with('status','Todo deleted successfully!');
    }
    public function complete($id)
    {
        //
        $todo = Todos::find($id);
        $todo->completed=1;
        $todo->save();
        return redirect('/home')->with('status','Todo completed successfully!');
    }
}
