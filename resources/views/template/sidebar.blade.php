<div class="main-sidebar">
     <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
               <a href="index.html">Wiki Games</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
               <a href="index.html">WG</a>
          </div>
          <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
               <li class="{{ Route::is('home') ? 'active':'' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

          <li class="menu-header">Menu</li>

          {{-- <li class="nav-item dropdown">
               <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Category</span></a>
               <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="">List Category</a></li>
               </ul>
          </li> --}}
          
          <li class="{{ Route::is('heroes.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('heroes.index') }}"><i class="fas fa-mask"></i> <span>Heroes</span></a></li>
          <li class="{{ Route::is('type.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('type.index') }}"><i class="fab fa-typo3"></i> <span>Type</span></a></li>
        
          {{-- <li class="nav-item dropdown">
               <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-bookmark"></i> <span>Tag</span></a>
               <ul class="dropdown-menu">
                    <li class="#"><a class="nav-link" href="">List Tag</a></li>
               </ul>
          </li>
          <li class="nav-item dropdown">
               <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Post</span></a>
               <ul class="dropdown-menu">
                    <li class="#"><a class="nav-link" href="">List Post</a></li>
                    <li class="#"><a class="nav-link" href="">List Post Trash</a></li>
               </ul>
          </li> --}}
          {{-- <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
     </aside>
</div>