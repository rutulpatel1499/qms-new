@section('css')
<style>

   .menu-item {
      font-size:15px;
   }
  
   
   
</style>

<aside class="admin-sidebar">
   <div class="admin-sidebar-brand" >
      <!-- begin sidebar branding-->
      <span class="avatar-title rounded-circle" style="width: 76px; background-color:red">R</span>
      <!-- <img class="admin-brand-logo" src="{{asset('assets/img/logo.png')}}" width="40" alt="atmos Logo"> -->
      <!-- end sidebar branding-->
      
      <div class="ml-auto">
         <!-- sidebar pin -->
         <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
         <!-- sidebar close for mobile device-->
         <a href="#" class="admin-close-sidebar"></a>
      </div>
   </div>

   <div class="admin-sidebar-wrapper js-scrollbar">
   <ul class="menu">
   <li class="menu-item  ">
      <a href="{{route('CompanySidebar')}}" class=" menu-link">
         <span class="menu-label">
            <span class="menu-name " >Dashboard
               <span class=""></span>
            </span>
         </span>
         <span class="menu-icon">
         <i class="icon-placeholder fe fe-activity "></i>
         </span>
      </a>      
   </li>
   <div class="admin-sidebar-wrapper js-scrollbar">
   <ul  class="menu  ">
   <li  class="menu-item {{ Request::is('companyclients/*') ? 'opened' : '' }}">
      <a href="#" class="open-dropdown menu-link">
         <span class="menu-label">
            <span class="menu-name ">Clients
               <span class="menu-arrow"></span>
            </span>
         </span>
         <span class="menu-icon" >
         <i class="icon-placeholder fe fe-users "></i>
         </span>
      </a>
      <!--submenu-->
      <ul class="sub-menu"  style="display:{{ Request::is('companyclients/create','companyclients') ? 'block' : 'none' }}">
         <li class="menu-item {{ Request::is('companyclients/create') ? 'active' : '' }}">
            <a href="{{route('companyclients.create')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name ">create clients</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder  fe fe-zap ">
               </i>
               </span>
            </a>
         </li>
         
         <li class="menu-item {{'companyclients'== request()->path() ? 'active' : ''}}" >
            
            <a href="{{route('companyclients.index')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name ">view clients</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder fe fe-edit-2 ">
               </i>
               </span>
            </a>
         </li>
      </ul>
   </li>
   <div class="admin-sidebar-wrapper js-scrollbar">
   <ul class="menu">
   <li class="menu-item {{ Request::is('companycategories/*') ? 'opened' : '' }} ">
      <a href="#" class="open-dropdown menu-link">
         <span class="menu-label">
            <span class="menu-name ">Categories
               <span class="menu-arrow"></span>
            </span>
         </span>
         <span class="menu-icon">
         <i class="icon-placeholder fe fe-italic "></i>
         </span>
      </a>
      <!--submenu-->
      <ul class="sub-menu" style="display:{{ Request::is('companycategories/create','companycategories') ? 'block' : 'none' }}">
         <li class="menu-item {{ Request::is('companycategories/create') ? 'active' : '' }}">
            <a href="{{route('companycategories.create')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name "> create catagories</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder  fe fe-zap ">
               </i>
               </span>
            </a>
         </li>
         <!-- <ul  style="display:{{ Request::is('companycategories/create') ? 'block' : 'none' }}"> -->
         <li class="menu-item  {{'companycategories'== request()->path() ? 'active' : ''}}">
            <a href="{{route('companycategories.index')}}"class=" menu-link">
               <span class="menu-label" >
                  <span class="menu-name"> view categories</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder fe fe-edit-2 ">
               </i>
               </span>
            </a>
         </li>
      </ul>
   </li>
   <div class="admin-sidebar-wrapper js-scrollbar">
   <ul class="menu">
   <li class="menu-item {{ Request::is('companybrands/*') ? 'opened' : '' }} ">
      <a href="#" class="open-dropdown menu-link">
         <span class="menu-label">
            <span class="menu-name">Brands
               <span class="menu-arrow"></span>
            </span>
         </span>
         <span class="menu-icon">
         <i class="icon-placeholder fe fe-activity "></i>
         </span>
      </a>
      <!--submenu-->
      <ul class="sub-menu " style="display:{{ Request::is('companybrands/create','companybrands') ? 'block' : 'none' }}">
         <li class="menu-item {{ Request::is('companybrands/create') ? 'active' : '' }}">
            <a href="{{route('companybrands.create')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name"> create brand</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder  fe fe-zap ">
               </i>
               </span>
            </a>
         </li>
         <li class="menu-item {{'companybrands'== request()->path() ? 'active' : ''}}">
            <a href="{{route('companybrands.index')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name"> view brand</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder fe fe-edit-2 ">
               </i>
               </span>
            </a>
         </li>
      </ul>
   </li>
   <div class="admin-sidebar-wrapper js-scrollbar">
   <ul class="menu">
   <li class="menu-item   {{ Request::is('companyproducts/*') ? 'opened' : '' }} ">
      <a href="#" class="open-dropdown menu-link">
         <span class="menu-label">
            <span class="menu-name">Product
               <span class="menu-arrow"></span>
            </span>
         </span>
         <span class="menu-icon">
         <i class="icon-placeholder fe fe-shopping-cart "></i>
         </span>
      </a>
      <!--submenu-->
      <ul class="sub-menu" style="display:{{ Request::is('companyproducts/create','companyproducts') ? 'block' : 'none' }}">
         <li class="menu-item {{ Request::is('companyproducts/create') ? 'active' : '' }}" >
            <a href="{{route('companyproducts.create')}}"class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name"> create Product</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder  fe fe-zap ">
               </i>
               </span>
            </a>
         </li>
         <li class="menu-item {{'companyproducts'== request()->path() ? 'active' : ''}}">
            <a href="{{route('companyproducts.index')}}" class=" menu-link" >
               <span class="menu-label">
                  <span class="menu-name"> view Product</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder fe fe-edit-2 ">
               </i>
               </span>
            </a>
         </li>
      </ul>
   </li>
   <div class="admin-sidebar-wrapper js-scrollbar">
   <ul class="menu">
   <li class="menu-item {{ Request::is('productspecification/*') ? 'opened' : '' }} ">
      <a href="#" class="open-dropdown menu-link">
         <span class="menu-label">
            <span class="menu-name">Product_Specification
               <span class="menu-arrow"></span>
            </span>
         </span>
         <span class="menu-icon">
         <i class="icon-placeholder fe fe-shopping-cart "></i>
         </span>
      </a>
      <!--submenu-->
      <ul class="sub-menu" style="display:{{ Request::is('productspecification/create','productspecification') ? 'block' : 'none' }}">
         <li class="menu-item {{'productspecification/create'== request()->path() ? 'active' : ''}} ">
            <a href="{{route('productspecification.create')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name">create Product_specification </span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder  fe fe-zap ">
               </i>
               </span>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{route('productspecification.index')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name"> view Product_specification </span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder fe fe-edit-2 ">
               </i>
               </span>
            </a>
         </li>
      </ul>
   </li>
   <div class="admin-sidebar-wrapper js-scrollbar">
   <ul class="menu">
   <li class="menu-item {{ Request::is('companyquatation/*') ? 'opened' : '' }} ">
      <a href="#" class="open-dropdown menu-link">
         <span class="menu-label">
            <span class="menu-name">Quatations
               <span class="menu-arrow"></span>
            </span>
         </span>
         <span class="menu-icon">
         <i class="icon-placeholder fe fe-maximize "></i>
         </span>
      </a>
      <!--submenu-->
      <ul class="sub-menu" style="display:{{ Request::is('companyquatation/create','companyquatation') ? 'block' : 'none' }}">
         <li class="menu-item {{ Request::is('companyquatation/create') ? 'active' : '' }} ">
            <a href="{{route('companyquatation.create')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name"> create Quatations</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder  fe fe-zap ">
               </i>
               </span>
            </a>
         </li>
         <li class="menu-item {{'companyquatation'== request()->path() ? 'active' : ''}}">
            <a href="{{route('companyquatation.index')}}" class=" menu-link">
               <span class="menu-label">
                  <span class="menu-name"> view Quatations</span>
               </span>
               <span class="menu-icon">
               <i class="icon-placeholder fe fe-edit-2 ">
               </i>
               </span>
            </a>
         </li>
      </ul>
   </li>
   <div class="admin-sidebar-wrapper js-scrollbar">
      <ul class="menu">
      <li class="menu-item {{ Request::is('companyquatationitem/*') ? 'opened' : '' }}   ">
         <a href="#" class="open-dropdown menu-link">
            <span class="menu-label">
               <span class="menu-name">Quatations_items
                  <span class="menu-arrow"></span>
               </span>
            </span>
            <span class="menu-icon">
            <i class="icon-placeholder fe fe-maximize "></i>
            </span>
         </a>
         <!--submenu-->
         <ul class="sub-menu" style="display:{{ Request::is('companyquatationitem/create','companyquatationitem') ? 'block' : 'none' }}">
            <li class="menu-item {{ Request::is('companyquatationitem/create') ? 'active' : '' }}">
               <a href="{{route('companyquatationitem.create')}}" class=" menu-link">
                  <!-- <span class="menu-label">
                     <span class="menu-name"> create Quatations_items</span>
                     </span> -->
                  <!-- <span class="menu-icon">
                     <i class="icon-placeholder  fe fe-zap ">
                     </i>
                     </span> -->
               </a>
            </li>
            <li class="menu-item {{'companyquatationitem'== request()->path() ? 'active' : ''}}">
               <a href="{{route('companyquatationitem.index')}}" class=" menu-link">
                  <span class="menu-label">
                     <span class="menu-name"> view Quatations_items</span>
                  </span>
                  <span class="menu-icon" >
                  <i class="icon-placeholder fe fe-edit-2 ">
                  </i>
                  </span>
               </a>
            </li>
         </ul>
      </li>
   </div>
</aside>