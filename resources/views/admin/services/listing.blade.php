@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Task services </h3>
              <p><a href="{{ route('admin.services.create') }}" class="btn btn-success">Add service</a></p>
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
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                   	@foreach($services as $service)
                     <tr data-delete="{{ route('admin.services.destroy' , $service->id) }}">
                     	
                       <td>{{$service->id}}</td>
                       <td>{{$service->name}}</td>
                       <td>{{$service->order_by}}</td>
                       
                       <td>
                       <a href="{{ route('admin.services.edit' , $service->id) }}"><i class="fa fa-pencil"></i></a>
                         
                         
                         	<a href="#" data-delete-trigger><i class="fa fa-trash"></i></a>
                         
                         
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