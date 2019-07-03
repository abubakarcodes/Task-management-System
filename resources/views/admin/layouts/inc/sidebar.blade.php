 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
       <!-- Sidebar user panel -->
       <div class="user-panel">
         <div class="pull-left image">
           <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
           <p> {{auth()->user()->first_name}}</p>
           <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
       </div>
       <!-- search form -->
       <form action="#" method="get" class="sidebar-form">
         <div class="input-group">
           <input type="text" name="q" class="form-control" placeholder="Search...">
               <span class="input-group-btn">
                 <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                 </button>
               </span>
         </div>
       </form>
       <!-- /.search form -->
       <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="sidebar-menu" data-widget="tree">
         <li class="header">MAIN NAVIGATION</li>
 
 
         <li>
           <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
         </li>
 
           <li class="treeview">
           <a href="#">
             <i class="fa fa-dashboard"></i> <span>Categories</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i>Categories Listing</a></li>
             <li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-circle-o"></i>Add New Category</a></li>
           </ul>
         </li>

         <li class="treeview">
           <a href="#">
             <i class="fa fa-dashboard"></i> <span> Service Types</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="{{route('admin.services.index')}}"><i class="fa fa-circle-o"></i>Types Listing</a></li>
             <li><a href="{{route('admin.services.create')}}"><i class="fa fa-circle-o"></i>Add New Type</a></li>
           </ul>
         </li>

        
 
 
          <li class="treeview">
           <a href="#">
             <i class="fa fa-dashboard"></i> <span>Employees</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="{{ route('admin.employee.index') }}"><i class="fa fa-circle-o"></i>Employees Listing</a></li>
             <li><a href="{{ route('admin.employee.create') }}"><i class="fa fa-circle-o"></i>Add New Employee</a></li>
           </ul>
         </li>
 
         <li class="treeview">
           <a href="#">
             <i class="fa fa-dashboard"></i> <span>Customers</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="{{ route('admin.customer.index') }}"><i class="fa fa-circle-o"></i>Customers Listing</a></li>
             <li><a href="{{ route('admin.customer.create') }}"><i class="fa fa-circle-o"></i>Add New Customer</a></li>
           </ul>
         </li>
         

          <li class="treeview">
           <a href="#">
             <i class="fa fa-dashboard"></i> <span>Tasks</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="{{ route('admin.task.index') }}"><i class="fa fa-circle-o"></i>Tasks Listing</a></li>
             <li><a href="{{route('admin.task.create')}}"><i class="fa fa-circle-o"></i>Add New Tasks</a></li>
           </ul>
         </li>

          <li class="treeview">
           <a href="#">
             <i class="fa fa-dashboard"></i> <span>Jobs</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="{{ route('admin.job.index') }}"><i class="fa fa-circle-o"></i>Jobs Listing</a></li>
             <li><a href="{{ route('admin.job.create') }}"><i class="fa fa-circle-o"></i>Add New Job</a></li> </ul>
         </li>
 
      {{--    <li class="treeview">
           <a href="#">
             <i class="fa fa-dashboard"></i> <span>  Reports</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="client-types-listing.html"><i class="fa fa-circle-o"></i>Types Listing</a></li>
             <li><a href="client-add-new-type"><i class="fa fa-circle-o"></i>Add New Type</a></li>
           </ul>
         </li>
 
         
         <li class="header">Settings</li>
          
   
 
         <li class="treeview">
           <a href="#">
             <i class="fa fa-gear"></i>
             <span>Settings</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="client-"><i class="fa fa-users"></i>Users</a></li>
             <li><a href="client-"><i class="fa fa-globe"></i>General</a></li>
             <li><a href="client-"><i class="fa fa-envelope-o"></i>Mail</a></li>
             <li><a href="client-"><i class="fa fa-credit-card"></i>Gateway</a></li>
           </ul>
         </li>
         --}}
         
       </ul>
     </section>
     <!-- /.sidebar -->
   </aside> 
