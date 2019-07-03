<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\Task;
class JobTasks extends Model
{
    protected $fillable = ['task_id' , 'job_id' , 'task_type' , 'name' , 'order_by'];

   
    
}
