@extends('employee.layouts.master')
@section('content')
<div class="row">
    <div class="box">
      <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Employee Tasks</h3>
              <p><a href="{{ route('employee.dashboard') }}" class="btn btn-default">Back to Jobs</a></p>
            </div>
            <div class="box-body">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 @include('toast::messages')
                 <table class="table table-custom">
                   <thead>
                     <tr>
                       <th>S.No</th>
                       <th>Name</th>
                       <th>Type</th>
                       <th>Display Order</th>
                       <th>status</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
					
						
					
					


					@foreach($tasks as $task)
                    <tr>
                    	<td>{{$task->id}}</td>

                    	<td>{{$task->name}}</td>
                      
                    	<td>
                        @if($task->task_type == "FileUpload")
                       <form>
                          <input type="file" name="">
                       </form>
                       @elseif($task->task_type == "InputText")
                        <form>
                          <input type="text" name="">
                        </form> 
                        @elseif($task->task_type == "CheckBox")
                        <form>
                          <input type="checkbox" name="">
                        </form> 
                        @else
                        <form>
                          
                            <select>
                              <option>--select a value--</option>
                            </select>
                          
                        </form> 
                        @endif
                      </td>


                    	<td>{{$task->order_by}}</td>
                    	<td>
                    		@if($task->status)
                    		<span class="label label-success">Completed</span>
                    		@else
                    		<span class="label label-warning">Pending</span>
                    		@endif
                    	</td>
                    	<td>
                    		@if($task->status)
                    	
                    			<a href="{{ route('employee.pending' , $task->id) }}" class="fa fa-close fa-lg"></a>
                    		
                    		@else
                    		<a href="{{ route('employee.completed' , $task->id) }}" class="fa fa-check fa-lg"></a>
                    		@endif
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