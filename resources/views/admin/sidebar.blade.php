       <!-- Sidebar -->
       {{-- {{ $name }} --}}
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fas fa-globe-asia"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
                
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject"
                aria-expanded="true" aria-controls="collapseProject">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Projects</span>
            </a>
            <div id="collapseProject" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="buttons.html">All Projects</a>
                    <a class="collapse-item" href="cards.html">Add New</a>
                </div>
            </div>
        </li>



           <!-- Divider -->
           <hr class="sidebar-divider">


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
                aria-expanded="true" aria-controls="collapseCategory">
                <i class="fas fa-fw fa-tags"></i>
                <span>Categories</span>
            </a>
            <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="buttons.html">All Categories</a>
                    <a class="collapse-item" href="cards.html">Add New</a>
                </div>
            </div>
        </li>


           <!-- Divider -->
           <hr class="sidebar-divider">


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSkill"
                aria-expanded="true" aria-controls="collapseSkill">
                <i class="fas fa-fw fa-star"></i>
                <span>Skills</span>
            </a>
            <div id="collapseSkill" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="buttons.html">All Skills</a>
                    <a class="collapse-item" href="cards.html">Add New</a>
                </div>
            </div>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-file-signature"></i>
                <span>Proposals</span></a>
        </li>
           <!-- Divider -->
           <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-users"></i>
                <span>Freelancers</span></a>
        </li>




        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
