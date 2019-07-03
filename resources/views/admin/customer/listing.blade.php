@extends('admin.layouts.master')
@section('content')
  <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Customers </h3>
              <p><a href="{{ route('admin.customer.create') }}" class="btn btn-success">Add Customer</a></p>
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
                       <th>Email</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                   	@foreach($users as $user)
                     <tr data-delete="{{ route('admin.customer.destroy' , $user->id) }}">
                       <td>{{$user->id}}</td>
                       <td>{{ $user->first_name . " " . $user->last_name }}</td>
                       <td>{{$user->email}}</td>
                       
                       <td>
                         <a href="{{ route('admin.customer.edit' , $user->id) }}"><i class="fa fa-pencil"></i></a>
                         <a href="" data-delete-trigger><i class="fa fa-trash"></i></a>
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