@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Job Tasks</h3>
              <p><a href="{{ route('admin.job.index') }}" class="btn btn-success">Back</a></p>
            </div>
           

            
            
            <div class="box-body">
                
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 @include('toast::messages')
                 <table class="table table-custom">
                   <thead>
                     <tr>
                       <th>S.No</th>
                       <th>Name</th>
                       <th>Display Order</th>
                       <th>status</th>
                     </tr>
                   </thead>
                   <tbody>
          
            
          
          


          @foreach($tasks as $task)
                    <tr>
                      <td>{{$task->id}}</td>

                      <td>{{$task->name}}</td>
                      <td>{{$task->order_by}}</td>
                      <td>
                        @if($task->status)
                        <span class="label label-success">Completed</span>
                        @else
                        <span class="label label-warning">Pending</span>
                        @endif
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