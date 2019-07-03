@extends('admin.layouts.master')
@section('content')

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Add Job </h3>
              <p><a href="{{ route('admin.job.index') }}" class="btn btn-default">Back to Jobs</a></p>
            </div>
            
           

            
            
            <div class="box-body">
                
              <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                 @include('admin.layouts.inc.message')
                
                <form action="{{ route('admin.job.store') }}" method="POST" role="form" class="m-b-20">
                  @csrf
                  
                
                  <div class="form-group">
                    <label for="">Job Title</label>
                    <input type="text" class="form-control" name="job_title" placeholder="Job title">
                  </div>

                 <div class="row">
                   <div class="col-xs-12 col-sm-6 ">
                    
                    <div class="form-group">
                       <label for="">Employee</label>
                       <select name="employee_id" id="input" class="form-control select2" >
                        <option value="">-- Select Employee --</option>
                        @foreach($employees as $employee)
                         <option value="{{$employee->id}}">{{$employee->first_name . " " . $employee->last_name}}</option>
                         @endforeach
                       </select>
                     </div>

                   </div>
                   <div class="col-xs-12 col-sm-6 ">
                     
                     <div class="form-group">
                       <label for="">Customer</label>
                       <select name="customer_id" id="input" class="form-control select2" >
                       <option value="">-- Select Customer --</option>
                        @foreach($customers as $customer)
                         <option value="{{$customer->id}}">{{$customer->first_name . " " . $customer->last_name}}</option>
                         @endforeach
                       </select>
                     </div>

                   </div>
                 </div> <!-- row -->


                 <div class="row">
                   <div class="col-xs-12 col-sm-6 ">
                    
                    <div class="form-group">
                       <label for="">Service Type</label>
                       <select name="service_id" id="input" class="form-control select2" >
                         <option value="">-- Select Service --</option>
                        @foreach($services as $service)
                         <option value="{{$service->id}}">{{$service->name}}</option>
                         @endforeach
                       </select>
                     </div>

                   </div>
                   <div class="col-xs-12 col-sm-6 ">
                     
                     <div class="form-group">
                       <label for="">Start Date</label>
                       <input type="text" name="start_date" id="input" class="form-control" data-datepicker value="">
                     </div>

                   </div>
                 </div>

                  <div class="well">
                     <div class="row">
                      <div id="error_task"></div>
                      <div class="col-xs-12 col-sm-10 ">
                       <div class="form-group">
                          <label for="">Select Tasks</label>
                          <select id="job_task"  class="form-control select2" >
                            <option value="" selected>-- Select Tasks --</option>
                            @foreach ($tasks as $task)
                              <option value="{{ $task->id }}" data-taskName="{{$task->name}}" data-tasktype={{$task->type}}>{{$task->name}}</option>

                            @endforeach
                           
                          </select>
                          <input type="hidden" id="task_type" value="">
                          <input type="hidden" id="task_name" value="">
                        </div>

                      </div>
                      <div class="col-xs-12 col-sm-2 ">
                       <label for="">&nbsp;</label>
                       <p>
                         <button id="add_task" type="button"  class="btn btn-info btn-block">Add Task</button>
                       </p>
                      </div>
                    </div>
                    <div id="results">
                    @include('admin.jobs.inc._taskTable')
                  </div>

                  </div>



                  <div class="form-group">
                    <label for="">Display Order</label>
                    <input type="text" name="order_by" class="form-control  sm-field" id="" placeholder="">
                  </div>
                  
                
                  <button type="submit" class="btn btn-success">Add Job</button>

                </form>

                </div> 
              </div> <!-- row -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
      </div>  
    @include('admin.jobs.inc._js')  
@endsection
