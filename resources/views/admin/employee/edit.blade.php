@extends('admin.layouts.master')
@section('content')
 <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="box">
            <div class="box-header m-t-10">
              <h3 class="box-title m-b-20">Update Employees </h3>
              <p><a href="{{ route('admin.employee.index') }}" class="btn btn-default">Back to Employee</a></p>
            </div>
           

            
            
            <div class="box-body">
                
              <div class="row">
                
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                 
                @include('admin.layouts.inc.message')
                <form action="{{ route('admin.employee.update' , $user->id) }}" method="POST" role="form" class="m-b-20">
                  @method('PUT')
                
                @csrf

                

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" placeholder="Enter First Name">
                  </div>

                  </div>
                   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" placeholder="Enter Last Name">
                  </div>

                  </div>

                </div> <!-- rwo -->


                 <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" readonly="readonly" class="form-control" value="{{$user->email}}" name="email" placeholder="Enter Email">
                  </div>

                  </div>
                   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    
                     <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" readonly="readonly" value="{{$user->password}}" class="form-control"  name="password" placeholder="Password">
                  </div>

                  </div>

                </div> <!-- rwo -->



                  <div class="form-group">
                    <label for="">Address Line</label>
                    <input type="text"  class="form-control" value="{{$user->address}}" name="address" placeholder="Address">
                  </div>


                 <div class="row">
                   <div class="col-xs-12 col-sm-3">
                    
                    <div class="form-group">
                       <label for="">City</label>
                       <input type="text" class="form-control" value="{{$user->city}}" name="city" placeholder="City">
                     </div>

                   </div>

                    <div class="col-xs-12 col-sm-3 ">
                    
                    <div class="form-group">
                       <label for="state">State</label>
                       <select id="state" name="state"  class="form-control" >
                            
                          <option value="">Select State</option>
                          <option value="AL" @if($user->state == 'AL') selected @endif>Alabama</option>
                          <option value="AK" @if($user->state == 'AK') selected @endif>Alaska</option>
                          <option value="AZ" @if($user->state == 'AZ') selected @endif>Arizona</option>
                          <option value="AR" @if($user->state == 'AR') selected @endif>Arkansas</option>
                          <option value="CA" @if($user->state == 'CA') selected @endif>California</option>
                          <option value="CO" @if($user->state == 'CO') selected @endif>Colorado</option>
                          <option value="CT" @if($user->state == 'CT') selected @endif>Connecticut</option>
                          <option value="DE" @if($user->state == 'DE') selected @endif>Delaware</option>
                          <option value="DC" @if($user->state == 'DC') selected @endif>District Of Columbia</option>
                          <option value="FL" @if($user->state == 'FL') selected @endif>Florida</option>
                          <option value="GA" @if($user->state == 'GA') selected @endif>Georgia</option>
                          <option value="HI" @if($user->state == 'HI') selected @endif>Hawaii</option>
                          <option value="ID" @if($user->state == 'ID') selected @endif>Idaho</option>
                          <option value="IL" @if($user->state == 'IL') selected @endif>Illinois</option>
                          <option value="IN" @if($user->state == 'IN') selected @endif>Indiana</option>
                          <option value="IA" @if($user->state == 'IA') selected @endif>Iowa</option>
                          <option value="KS" @if($user->state == 'KS') selected @endif>Kansas</option>
                          <option value="KY" @if($user->state == 'KY') selected @endif>Kentucky</option>
                          <option value="LA" @if($user->state == 'LA') selected @endif>Louisiana</option>
                          <option value="ME" @if($user->state == 'ME') selected @endif>Maine</option>
                          <option value="MD" @if($user->state == 'MD') selected @endif>Maryland</option>
                          <option value="MA" @if($user->state == 'MA') selected @endif>Massachusetts</option>
                          <option value="MI" @if($user->state == 'MI') selected @endif>Michigan</option>
                          <option value="MN" @if($user->state == 'MN') selected @endif>Minnesota</option>
                          <option value="MS" @if($user->state == 'MS') selected @endif>Mississippi</option>
                          <option value="MO" @if($user->state == 'MO') selected @endif>Missouri</option>
                          <option value="MT" @if($user->state == 'MT') selected @endif>Montana</option>
                          <option value="NE" @if($user->state == 'NE') selected @endif>Nebraska</option>
                          <option value="NV" @if($user->state == 'NV') selected @endif>Nevada</option>
                          <option value="NH" @if($user->state == 'NH') selected @endif>New Hampshire</option>
                          <option value="NJ" @if($user->state == 'NJ') selected @endif>New Jersey</option>
                          <option value="NM" @if($user->state == 'NM') selected @endif>New Mexico</option>
                          <option value="NY" @if($user->state == 'NY') selected @endif>New York</option>
                          <option value="NC" @if($user->state == 'NC') selected @endif>North Carolina</option>
                          <option value="ND" @if($user->state == 'ND') selected @endif>North Dakota</option>
                          <option value="OH" @if($user->state == 'OH') selected @endif>Ohio</option>
                          <option value="OK" @if($user->state == 'OK') selected @endif>Oklahoma</option>
                          <option value="OR" @if($user->state == 'OR') selected @endif>Oregon</option>
                          <option value="PA" @if($user->state == 'PA') selected @endif>Pennsylvania</option>
                          <option value="RI" @if($user->state == 'RI') selected @endif>Rhode Island</option>
                          <option value="SC" @if($user->state == 'SC') selected @endif>South Carolina</option>
                          <option value="SD" @if($user->state == 'SD') selected @endif>South Dakota</option>
                          <option value="TN" @if($user->state == 'TN') selected @endif>Tennessee</option>
                          <option value="TX" @if($user->state == 'TX') selected @endif>Texas</option>
                          <option value="UT" @if($user->state == 'UT') selected @endif>Utah</option>
                          <option value="VT" @if($user->state == 'VT') selected @endif>Vermont</option>
                          <option value="VA" @if($user->state == 'VA') selected @endif>Virginia</option>
                          <option value="WA" @if($user->state == 'WA') selected @endif>Washington</option>
                          <option value="WV" @if($user->state == 'WV') selected @endif>West Virginia</option>
                          <option value="WI" @if($user->state == 'WI') selected @endif>Wisconsin</option>
                          <option value="WY" @if($user->state == 'WY') selected @endif>Wyoming</option>
                       </select>
                     </div>

                   </div>

                    <div class="col-xs-12 col-sm-3 ">
                    
                    <div class="form-group">
                       <label for="">Zip Code</label>
                       <input type="text" class="form-control" value="{{$user->zipcode}}" name="zipcode" placeholder="zipcode">
                     </div>

                   </div>


                   <div class="col-xs-12 col-sm-3 ">
                     
                     <div class="form-group">
                       <label for="">Phone</label>
                       <input type="text" class="form-control" value="{{$user->phone}}" name="phone_number" placeholder="Phone Number">
                     </div>

                   </div>
                 </div>


                 <div class="form-group">
                   <label for="">Notes</label>
                   <textarea name="notes"  class="form-control" rows="3" required="required">{{$user->notes}}</textarea>
                 </div>
                 
    
                
                  <button type="submit" class="btn btn-success">Update Employee</button>

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