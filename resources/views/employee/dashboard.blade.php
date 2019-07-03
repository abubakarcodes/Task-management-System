@extends('employee.layouts.master')
@section('content')
<div class="row">
    <div class="box">
      <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Employee Jobs</h3>
              
            </div>
            <div class="box-body">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 @include('toast::messages')
                 <table class="table table-custom">
                   <thead>
                     <tr>
                       <th>S.No</th>
                       <th>Name</th>
                       <th>Display Order</th>
                       <th>status</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
					@foreach($jobs as $job)
						<tr>
					<td>{{$job->id}}</td>
					<td>{{$job->job_title}}</td>
					<td>{{$job->order_by}}</td>
					<td>
            @if(getJobStatus($job->id) == "completed")
            <span class="label label-success">completed</span>
            @elseif(getJobStatus($job->id) == "in-progress")
            <span class="label label-info">in progress</span>
            @elseif(getJobStatus($job->id) == "pending")
            <span class="label label-warning">pending</span>
            @endif          
					</td>
					<td>
						<a href="{{ route('employee.tasks' , $job->id) }}" class="fa fa-list fa-lg"></a>
					</td>
					</tr>
                    @endforeach
                   </tbody>
                 </table>
					
                </div>   
            </div>
        </div>
      </div> 

@endsection