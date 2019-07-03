@extends('admin.layouts.master')
@section('content')
 <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Add Customers </h3>
              <p><a href="{{ route('admin.customer.index') }}" class="btn btn-default">Back to Customer</a></p>
            </div>
           

            
            
            <div class="box-body">
                
              <div class="row">
               
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                 
                 @include('admin.layouts.inc.message')
                <form action="{{ route('admin.customer.store') }}" method="POST" role="form" class="m-b-20">
                
                
                @csrf

                

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" placeholder="Enter First Name">
                  </div>

                  </div>
                   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" placeholder="Enter Last Name">
                  </div>

                  </div>

                </div> <!-- rwo -->


                 <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Enter Email">
                  </div>

                  </div>
                   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control"  name="password" placeholder="Password">
                  </div>

                  </div>

                </div> <!-- rwo -->



                  <div class="form-group">
                    <label for="">Address Line</label>
                    <input type="text" class="form-control" value="{{old('address')}}" name="address" placeholder="Address">
                  </div>


                 <div class="row">
                   <div class="col-xs-12 col-sm-3">
                    
                    <div class="form-group">
                       <label for="">City</label>
                       <input type="text" class="form-control" name="city" placeholder="City">
                     </div>

                   </div>

                    <div class="col-xs-12 col-sm-3 ">
                    
                    <div class="form-group">
                       <label for="state">State</label>
                       <select id="state" name="state"  class="form-control" >
                         <option value="">Select State</option>
                         <option value="AL">Alabama</option>
                          <option value="AK">Alaska</option>
                          <option value="AZ">Arizona</option>
                          <option value="AR">Arkansas</option>
                          <option value="CA">California</option>
                          <option value="CO">Colorado</option>
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="DC">District Of Columbia</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="HI">Hawaii</option>
                          <option value="ID">Idaho</option>
                          <option value="IL">Illinois</option>
                          <option value="IN">Indiana</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NV">Nevada</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NM">New Mexico</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="ND">North Dakota</option>
                          <option value="OH">Ohio</option>
                          <option value="OK">Oklahoma</option>
                          <option value="OR">Oregon</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="SD">South Dakota</option>
                          <option value="TN">Tennessee</option>
                          <option value="TX">Texas</option>
                          <option value="UT">Utah</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WA">Washington</option>
                          <option value="WV">West Virginia</option>
                          <option value="WI">Wisconsin</option>
                          <option value="WY">Wyoming</option>
                       </select>
                     </div>

                   </div>

                    <div class="col-xs-12 col-sm-3 ">
                    
                    <div class="form-group">
                       <label for="">Zip Code</label>
                       <input type="text" class="form-control" value="{{old('zipcode')}}" name="zipcode" placeholder="zipcode">
                     </div>

                   </div>


                   <div class="col-xs-12 col-sm-3 ">
                     
                     <div class="form-group">
                       <label for="">Phone</label>
                       <input type="text" class="form-control" value="{{old('phone_number')}}" name="phone_number" placeholder="Phone Number">
                     </div>

                   </div>
                 </div>


                 <div class="form-group">
                   <label for="">Notes</label>
                   <textarea name="notes" value="{{old('notes')}}" class="form-control" rows="3" required="required"></textarea>
                 </div>
                 
    
                
                  <button type="submit" class="btn btn-success">Add Customer</button>

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