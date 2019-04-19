 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-graduation-cap"></i>
         </div>
         <div class="sidebar-brand-text mx-2">Pranata WEb</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('home') ?>">
             <i class="fas fa-home"></i>
             <span>Home</span></a>
     </li>


     <hr class="sidebar-divider">


     <div class="sidebar-heading">
         USER
     </div>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('user'); ?>">
             <i class="fas fa-user"></i>
             <span>My Profile</span></a>

         <a class="nav-link" href="<?= base_url('user/edit'); ?>">
             <i class="far fa-edit"></i>
             <span>Edit Profile</span></a>
     </li>

     <hr class="sidebar-divider">

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
             <i class="fas fa-sign-out-alt"></i>
             <span>Logout</span></a>

     </li>

     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>