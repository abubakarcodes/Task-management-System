<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Job;
use App\jobTasks;
class Task extends Model
{
    public function category(){
    	return $this->belongsTo(Category::class);
    }
    
}
