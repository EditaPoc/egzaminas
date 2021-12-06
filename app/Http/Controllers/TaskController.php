<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Status;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('superadmin')->only(['create','edit', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks=Task::all();
      
        return view('index', [ 'tasks'=>$tasks, 'order'=>'ASC']); 
    }
    
    public function indexOrder($field, $order, Request $request)
    {
        $statuses=Status::all();
      
        if(isset($request->name)){                                      /*filtravimas*/
            $statusesQuery=Task::where('status_id', $request->name);
        }else{
            $statusesQuery=Task::where('status_id', '!=', 0);
         }
        
        if($order=='ASC'){                                    /*rikiavimas*/
            $statusesQuery=$statusesQuery->orderBy($field);
        }else{
            $statusesQuery=$statusesQuery->orderByDesc($field);
        }
        $tasks=$statusesQuery->get();
        
      if($order=='ASC')$order='DESC';
        else $order='ASC';
     
     
        return view('index', [ 'tasks'=>$tasks,  'statuses'=>$statuses, 'field'=>$field, 'order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses=Status::all();
      
        return view('create', [ 'statuses'=>$statuses]);
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
            'add_date'=>'required',
            'completed_date'=>'required'
        ]);
        
        if($request->completed_date < $request->add_date ){
            return back()->withErrors(['add_date'=>"Klaida, užduoties pabaiga negali būti ansktenė"]);
        } 
        
        $task=new Task();
        $task->fill($request->all());
        $task->save();
        return redirect()->route("tasks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $statuses=Status::all();
        return view('edit', ['task'=>$task, 'statuses'=>$statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'add_date'=>'required',
            'completed_date'=>'required'
        ]);
        
        if($request->completed_date < $request->add_date ){
            return back()->withErrors(['add_date'=>"Klaida, užduoties pabaiga negali būti ansktenė"]);
        }
        
        $task->fill($request->all());
        $task->save();
        return redirect()->route("tasks.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->id);
        return redirect()->route("tasks.index");
    }
}
