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
           
           <form id="taskForm" action="{{ route('admin.task.store') }}" method="POST" role="form" class="m-b-20">
            @csrf
            
            
            <div class="form-group">
              <label for="">Task Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter Task Name">
            </div>

            <div class="row">
             <div class="col-xs-12 col-sm-6 ">
              
              <div class="form-group">
               <label for="">Type</label>
               <select name="type" id="input_type" class="form-control" >
                <option value="">Select</option>
                <option value="CheckBox" >CheckBox</option>
                <option value="InputText">InputText</option>
                <option value="Dropdown">Dropdown</option>
                <option value="FileUpload">FileUpload</option>                         
              </select>
            </div>

          </div>
          <div class="col-xs-12 col-sm-6 ">
           
           <div class="form-group">
             <label for="">Category</label>
             <select name="category" id="input" class="form-control" >
               <option value="">Select</option>
               @foreach($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
               @endforeach
             </select>
           </div>

         </div>
       </div>
       <div class="form-group" id="type_change">
        
       </div>
       
        <textarea id="options_val" name="options" hidden="hidden"></textarea>        
       <div class="form-group">
        <label for="">Display Order</label>
        <input type="text" class="form-control sm-field" name="order_by" placeholder="Enter display order">
      </div>
      
      
      <button type="submit" class="btn btn-success">Add Task</button>

    </form>

  </div> 
</div> <!-- row -->

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div> 
</div> 

@include('admin.tasks.inc._js')

@endsection