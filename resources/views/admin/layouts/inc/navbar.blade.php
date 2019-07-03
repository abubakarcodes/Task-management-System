<header class="main-header">
     <!-- Logo -->
     <a href="" class="logo">
       <!-- mini logo for sidebar mini 50x50 pixels -->
       <span class="logo-mini">Admin </span>
       <!-- logo for regular state and mobile devices -->
       <span class="logo-lg">Admin </span>
     </a> 
     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top">
       <!-- Sidebar toggle button-->
       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
 
       <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
          
           <!-- Notifications: style can be found in dropdown.less -->
           <li class="dropdown notifications-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-bell-o"></i>
               <span class="label label-warning">10</span>
             </a>
             <ul class="dropdown-menu">
               <li class="header">You have 10 notifications</li>
               <li>
                 <!-- inner menu: contains the actual data -->
                 <ul class="menu">
                   <li>
                     <a href="#">
                       <i class="fa fa-users text-aqua"></i> 5 new members joined today
                     </a>
                   </li>
                 </ul>
               </li>
               <li class="footer"><a href="#">View all</a></li>
             </ul>
           </li>
           
           <li class="dropdown user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
               <span class="hidden-xs">{{auth()->user()->first_name}}</span>
             </a>
             <ul class="dropdown-menu">
               <!-- User image -->
               <li class="user-header">
                 <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                 <p>
                   {{auth()->user()->first_name}}
                 </p>
               </li>
              
               
               <!-- Menu Footer-->
               <li class="user-footer">
                 <div class="pull-left">
                   <a href="" class="btn btn-default btn-flat">Profile</a>
                 </div>
                 <div class="pull-right">
                   <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>                                 
                 </div>
               </li>

             </ul>
        
          </ul>
        
       </div>
     </nav>
   </header>