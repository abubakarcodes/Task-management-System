@extends('admin.layouts.master')
@section('content')
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Add Task Category </h3>
              <p><a href="{{ route('admin.categories.index') }}" class="btn btn-default">Back to Category</a></p>
            </div>
           

            
            
            <div class="box-body">
                
              <div class="row">
              		 
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                @include('admin.layouts.inc.message')
                
                <form action="{{ route('admin.categories.store') }}" method="POST" role="form" class="m-b-20">
                  
               
					@csrf
					

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Category">
                  </div>

                  </div>

                </div> <!-- rwo -->


                 
                    <div class="form-group">
                    <label for="">Display Order</label>
                    <input type="text" class="form-control sm-field" name="order_by">
                  </div>

                 
    
                
                  <button type="submit" class="btn btn-success">Add Category</button>

                </form>

                </div> 
              </div> <!-- row --> 
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
      </div>  

@endsection