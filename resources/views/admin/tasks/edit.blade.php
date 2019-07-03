@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Tasks </h3>
              <p><a href="{{ route('admin.task.index') }}" class="btn btn-default">Back to Tasks</a></p>
            </div>
           

            
            
            <div class="box-body">
                
              <div class="row">
                
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                 
                @include('admin.layouts.inc.message')
                <form action="{{ route('admin.task.update' , $task->id) }}" method="POST" role="form" class="m-b-20">
                  @csrf
                  
                  @method('PUT')
                  <div class="form-group">
                    <label for="">Task Name</label>
                    <input type="text" class="form-control" value="{{$task->name}}" name="name" placeholder="Enter Task Name">
                  </div>

                 <div class="row">
                   <div class="col-xs-12 col-sm-6 ">
                    
                    <div class="form-group">
                       <label for="">Type</label>
                       <select name="type" id="input_type" class="form-control" >
                          <option value="">Select</option>
                          <option value="CheckBox" @if($task->type == 'CheckBox') selected @endif>CheckBox</option>
                          <option value="InputText"  @if($task->type == 'InputText') selected @endif>InputText</option>
                          <option value="Dropdown"  @if($task->type == 'Dropdown') selected @endif>Dropdown</option>
                          <option value="FileUpload"  @if($task->type == 'FileUpload') selected @endif>FileUpload</option>
                         
                       </select>
                     </div>

                   </div>
                   <div class="col-xs-12 col-sm-6 ">
                     
                     <div class="form-group">
                       <label for="">Category</label>
                       <select name="category" id="input" class="form-control" >
                         <option value="">Select</option>
                         @foreach($categories->all() as $category)
                         <option value="{{$category->id}}" @if($task->category_id == $category->id) selected @endif>{{$category->name}}</option>
                         @endforeach
                       </select>
                     </div>

                   </div>
                 </div>
                 <div id="type_change">
                   
                 </div>

                <textarea class="form-control" name="options" id="options_val" style="display: none;">
                  {{json_decode($task->options)}}
                </textarea>


                  <div class="form-group">
                    <label for="">Display Order</label>
                    <input type="text" class="form-control sm-field" value="{{$task->order_by}}" name="order_by" placeholder="Enter display order">
                  </div>
                  
                
                  <button type="submit" class="btn btn-success">Update Task</button>

                </form>

                </div> 
              </div> <!-- row -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
      </div> 

@include("admin.tasks.inc._editjs")
@endsection