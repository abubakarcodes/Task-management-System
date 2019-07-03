<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobTasks;
use Toast;



class TaskController extends Controller
{
   public function index()
   {
   		$jobs = Job::where('employee_id' , auth()->user()->id)->orderBy('order_by')->get();
   		return view('employee.dashboard' , compact('jobs'));
   }

	public function showJobTasks($id){
		
			$tasks = JobTasks::where('job_id' , $id)->get();
			return view('employee.tasks', compact('tasks'));
		
		
		
	}


   public function pending($id){
   		

   			//find the task
	   		$task = JobTasks::findorFail($id);
	   		//update the task
	   		$task->status = 0;
	   		$task->save();
            //update the job status
            getJobStatus($task->job_id);
	   		//show message
	   		Toast::warning('Task has been marked as pending');
	   		//redirect back to the page
	   		return redirect()->back();
   		
   		
   }




   public function completed($id){
   
   		$task = JobTasks::findorFail($id);
   		$task->status = 1;
   		$task->save();
          //update the job status
         getJobStatus($task->job_id);
   		Toast::success('Task has been marked as completed');
   		return redirect()->back();


   }

 


}
