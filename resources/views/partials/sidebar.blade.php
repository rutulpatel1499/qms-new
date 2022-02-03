<aside class="admin-sidebar">
         <div class="admin-sidebar-brand">
            <!-- begin sidebar branding-->
            <img class="admin-brand-logo" src="{{asset('assets/img/logo.png')}}" width="40" alt="atmos Logo">
            <!-- end sidebar branding-->
            <div class="ml-auto">
               <!-- sidebar pin-->
               <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
               <!-- sidebar close for mobile device-->
               <a href="#" class="admin-close-sidebar"></a>
            </div>
         </div>
         <div class="admin-sidebar-wrapper js-scrollbar">
            <ul class="menu">
               <li class="menu-item active ">
                  <a href="{{route('userdashboard')}}" class=" menu-link">
                  <span class="menu-label">
                  <span class="menu-name">Dashboard
              
                  </span>
                  </span>
                  <span class="menu-icon">
                  <i class="icon-placeholder fe fe-activity "></i>
                  </span>
                  </a>
                  <!--submenu-->
                  
               </li>
               
             <div class="admin-sidebar-wrapper js-scrollbar">
            <ul class="menu">
               <li class="menu-item  ">
                  <a href="#" class="open-dropdown menu-link">
                  <span class="menu-label">
                  <span class="menu-name">user
                  <span class="menu-arrow"></span>
                  </span>
                  </span>
                  <span class="menu-icon">
                  <i class="icon-placeholder fe fe-user "></i>
                  </span>
                  </a>
                  <!--submenu-->
                  <ul class="sub-menu">
                     
                     <li class="menu-item">
                        <a href="{{route('users.create')}}" class=" menu-link">
                        <span class="menu-label">
                        <span class="menu-name"> create user</span>
                        </span>
                        <span class="menu-icon">
                        <i class="icon-placeholder fe fe-users ">
                        </i>
                        </span>
                        </a>
                     </li>
                     <li class="menu-item">
                        <a href="{{route('users.index')}}"  class=" menu-link">
                        <span class="menu-label">
                        <span class="menu-name"> view all user</span>
                        </span>
                        <span class="menu-icon">
                        <i class="icon-placeholder  fe fe-compass">
                        </i>
                        </span>
                        </a>
                     </li>
                     
                  </ul>
                 
                  </ul>
               </li>
         </div>
      </aside>

      