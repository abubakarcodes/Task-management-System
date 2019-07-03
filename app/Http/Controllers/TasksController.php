<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Toast;
use App\Category;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $tasks = Task::orderBy('order_by' , 'ASC')->get();
        return view('admin.tasks.listing' , compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     $categories = Category::all();
         return view('admin.tasks.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
*/
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'type' => 'required',
            'category' => 'required',
            'order_by' => 'required',

        ]);
       
        $task = new Task;
        $task->name = $request->input('name');
        $task->type = $request->input('type');
        $task->category_id = $request->input('category');
        $task->order_by = $request->input('order_by');
        $task->options = json_encode($request->input('options'));
        $task->save();
       Toast::success('Tasks added Successfully' , 'success');
       return redirect()->route('admin.task.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('created_at' , 'DSC')->get();
        $task = Task::find($id);
         return view('admin.tasks.edit' , compact('categories' , 'task'));
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
        $this->validate($request , [
            'name' => 'required',
            'type' => 'required',
            'category' => 'required',
            'order_by' => 'required',
       ]);


      $task = Task::find($id);
      $task->name = $request->input('name');
       $task->type = $request->input('type');
        $task->category_id = $request->input('category');
        $task->options = json_encode($request->input('options'));
         $task->order_by = $request->input('order_by');
         $task->save();
         Toast::success('Task update Successfully' , 'success');
         return redirect()->route('admin.task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $task = Task::find($id);
       $task->delete();
       return response()->json('success' , 200);
    }
}
