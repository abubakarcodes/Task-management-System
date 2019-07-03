@extends('admin.layouts.master')

@section('content')

<div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Jobs </h3>
              <p><a href="{{ route('admin.job.create') }}" class="btn btn-success">Add Job</a></p>
            </div>
           

            
            
            <div class="box-body">
                
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 @include('toast::messages')
                 <table class="table table-custom">
                   <thead>
                     <tr>
                       <th>S.No</th>
                       <th>Job Title</th>
                       <th>Employee Name</th>
                       <th>Customer Name</th>
                       <th>Start Date</th>
                       <th>Task Count</th>
                       <th>Display Order</th>
                       <th>Status</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                    
                    @foreach($jobs as $job)
                     <tr data-delete="{{ route('admin.job.destroy', $job->id) }}">
                       <td>{{$job->id}}</td>
                       <td>{{$job->job_title}}</td>
                       <td>{{$job->employee->first_name . " ". $job->employee->last_name}}</td>
                       <td>{{$job->customer->first_name . " ". $job->customer->last_name}}</td>
                       <td>{{$job->start_date}}</td>
                       <td>{{count($job->jobTasks)}}</td>
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
                         <a href="{{ route('admin.job.edit', $job->id ) }}"><i class="fa fa-pencil"></i></a>
                         <a href="#" data-delete-trigger><i class="fa fa-trash"></i></a>
                         <a href="{{ route('admin.job.show' , $job->id) }}" class="fa fa-list"></a>
                       </td>
                     </tr>
                     @endforeach
                   </tbody>
                 </table>

                </div> 
              </div> <!-- row -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
      </div> 

@endsection