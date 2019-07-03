<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Session;
use App\JobTasks;
use App\User;
use Toast;
use App\Service;
use App\Job;
class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('order_by' , 'ASC')->get();

       return view('admin.jobs.listing' , compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {    Session::forget('jobtasks');
        $tasks = Task::all();
        $employees = User::where('user_type' , 'employee')->get();
        $customers = User::where('user_type' , 'customer')->get();
        $services = Service::all();

        return view('admin.jobs.create' , compact('tasks' , 'employees' , 'customers' , 'services'));
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
            'job_title' => 'required',
            'employee_id' => 'required',
            'customer_id' => 'required',
            'service_id' => 'required',
            'start_date' => 'required',
            'order_by' => 'required',
        ]);
        $job = Job::create($request->except('_token'));
      foreach(session()->get('jobtasks') as $key => $value)
      {
        JobTasks::create([
               'task_id'   =>  $value['job_task'],
               'task_type' =>  $value['task_type'],
               'name'      =>  $value['task_name'],
               'order_by'  =>  $job->order_by,
               'job_id'    =>  $job->id,

        ]);
      }

      Toast::success('job task successfully created' , 'success');
      return redirect()->route('admin.job.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = JobTasks::where('job_id', $id )->get();
        return view('admin.jobs.details' , compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)

    {  
         Session::forget('jobtasks');
        $jobTasks = Job::find($id)->jobTasks()->get();
       $job = Job::find($id);
        $tasks = Task::all();
        $employees = User::where('user_type' , 'employee')->get();
        $customers = User::where('user_type' , 'customer')->get();
        $services = Service::all();

        return view('admin.jobs.edit' , compact('tasks' , 'employees' , 'customers' , 'services' , 'job' , 'jobTasks'));
        
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
            'job_title' => 'required',
            'employee_id' => 'required',
            'customer_id' => 'required',
            'service_id' => 'required',
            'start_date' => 'required',
            'order_by' => 'required',
        ]);
        $job = Job::findorFail($id);
        
        $job->update($request->except('_token'));
        if(session()->has('jobtasks')){
            $job->jobTasks()->delete();
            foreach(session()->get('jobtasks') as $key => $value)
              {
                
                JobTasks::create([
                       'task_id' => $value['job_task'],
                       'task_type' => $value['task_type'],
                       'name' => $value['task_name'],
                       'order_by'=> $job->order_by,
                       'job_id' => $job->id,

                ]);
              }

        }
      

      Toast::success('job task successfully updated' , 'success');
      return redirect()->route('admin.job.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    { //find job
       $job = Job::findorFail($id);
       
       
        //if job is found delete job_task and also delete the jobs
        $job->jobTasks()->delete();
        $job->delete();
        
        return response()->json('success' , 200);
        
      
        
      
   }

    


    public function jobTask(Request $request){
        
        
         $validate = $this->validate($request,
                [
                    'job_task' => 'required',
                    
                ]
            );
            
            Session::push('jobtasks', $request->all());

            return view('admin.jobs.inc._taskTable');

    }


    //this function will remove tasks from the edit page

        
        public function jobTasksEditRemove($id)
    {

        $jobTask = JobTasks::findorFail($id);
        $jobTask->delete();
       return view('admin.jobs.inc._taskTable');
    }


//this will remove the task from add page
        public function jobTasksRemove($id)
    {

        if (session()->has('jobtasks')) {
            foreach (session()->get('jobtasks') as $key => $value) {
                if ($key == $id) {
                    if(isset($value['id']))
                    {
                        jobTasks::find($value['id'])->delete();
                    }
                    Session::forget('jobtasks.' . $key);
                }
            }
        }
       return view('admin.jobs.inc._taskTable');
    }


    // public function getJobStatus($id){

    //     $totalTasks = JobTasks::where('job_id' , $id)->count();
    //     $completedTasks = JobTasks::where('job_id' , $id)->where('status' , 1)->count();
    //     $job = Job::findorFail($id);
    //     if($completedTasks == '0'){
    //         $job->status = "pending";
    //         $job->update();
    //         return $job->status;
    //     }
    //     elseif($totalTasks == $completedTasks){
    //         $job->status = "completed";
    //         $job->update();
    //         return $job->status;

    //     }
    //     elseif($totalTasks > $completedTasks){
    //         $job->status = "in-progress";
    //         $job->update();
    //         return $job->status;
    //     }
    //     else{
    //         return $job->status;
    //     }
       
    // }


    
}
