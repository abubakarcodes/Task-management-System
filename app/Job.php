<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Service;
use App\JobTasks;
use App\Task;

class Job extends Model
{
	protected	$fillable = ['job_title' , 'employee_id' , 'customer_id' , 'start_date' , 'service_id' , 'order_by' ];
   public function employee(){
   		return $this->belongsTo(User::class);
   }

    public function customer(){
   		return $this->belongsTo(User::class);
   }

   public function jobTasks(){
   		return $this->hasMany(JobTasks::class , 'job_id');
   }

   public function tasks(){
    return $this->belongsToMany(Task::class , 'job_tasks');
   }
    public function ServiceType(){
        return $this->belongsTo(Service::class);
    }


}
