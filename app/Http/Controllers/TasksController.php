<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {   $tasks=[];
        if (\Auth::check()) { // 認証済みの場合

        $user = \Auth::user() ;
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);}
        
        return view("tasks.index",["tasks"=>$tasks]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $task = new Task;
        return view("tasks.create",["task" => $task]);
        
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
        
                $request->validate([
            "status" => "required|max:10",
            "content" => "required|max:100",

            ]);

        $task = new Task;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->user_id = \Auth::user()->id;


        $task->save();
        return redirect("/");
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task = Task::findOrFail($id);

        if(\Auth::user()->id === $task->user_id ){
        return view("tasks.show",["task" => $task]);}
        
         else{
            return redirect("/");
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task =  Task::findOrFail($id);
        
        if(\Auth::user()->id == $task->user_id ){
            return view("tasks.edit",["task" => $task]);
        }
        else{
            return redirect("/");
            
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "status" => "required|max:10",
            "content" => "required|max:100",
            ]);
        if(\Auth::user()->id == $task->user_id ){

            $task = Task::findOrFail($id);
            $task -> content = $request -> content;
            $task -> status = $request -> status;
            $task -> save();
        }
        return redirect("/");
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if(\Auth::user()->id == $task->user_id ){
            $task -> delete();
            return redirect("/");
        }
        else{
            return redirect("/");
        }
            
                
        
        //
    }
}
