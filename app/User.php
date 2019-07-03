<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Job;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firt_name', 'last_name' , 'email', 'password', 'address' , 'city' , 'state' , 'zipcode', 'phone' , 'notes' , 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function userType(){
        return $this->user_type;
   }

    public function employeeJobs(){
        return $this->hasMany(Job::class , 'employee_id' , 'id'); // this seems correct
    }


    public function customerJobs(){
        return $this->hasMany(Job::class , 'customer_id' , 'id');
    }

   
   
}
