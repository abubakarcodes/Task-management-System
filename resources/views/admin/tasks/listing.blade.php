@extends('admin.layouts.master')
@section('content')
   <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Tasks </h3>
              <p><a href="{{ route('admin.task.create') }}" class="btn btn-success">Add Task</a></p>
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
                       <th>Type</th>
                       <th>Display Order</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>

                    @foreach($tasks as $task)
                     <tr data-delete="{{ route('admin.task.destroy' , $task->id) }}">
                       <td>{{$task->id}}</td> 
                       <td>{{$task->name}}</td>
                       <td>{{$task->type}}</td>
                       <td>{{$task->order_by}}</td>
                       <td>
                         <a href="{{ route('admin.task.edit' , $task->id) }}"><i class="fa fa-pencil"></i></a>
                         <a data-delete-trigger href="#"><i class="fa fa-trash"></i></a>
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