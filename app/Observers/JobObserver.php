<?php

namespace App\Observers;

use App\Job;
use Mail;
class JobObserver
{
    /**
     * Handle the job "created" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function created(Job $job)
    {
       Mail::to($job->customer->email)->send(new \App\Mail\JobPending);
    }

    /**
     * Handle the job "updated" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function updated(Job $job)
    {
        if($job->status == "pending"){
            Mail::to($job->customer->email)->send(new \App\Mail\JobPending);
        }
        elseif($job->status == "in-progress"){
            Mail::to($job->customer->email)->send(new \App\Mail\JobInprogress);
        }
      elseif($job->status == "completed"){
            Mail::to($job->customer->email)->send(new \App\Mail\JobCompleted);
        }
    }

    /**
     * Handle the job "deleted" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function deleted(Job $job)
    {
        //
    }

    /**
     * Handle the job "restored" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function restored(Job $job)
    {
        //
    }

    /**
     * Handle the job "force deleted" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function forceDeleted(Job $job)
    {
        //
    }
}
