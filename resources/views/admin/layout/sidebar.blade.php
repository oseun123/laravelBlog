  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left ">
          
        </div>
        <div class="pull-left image" style="color: #fff;">
          <p>{{ Auth::user()->name }}</p>
         
        </div>
      </div>
      <!-- search form -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview">
          <a href="{{ route('user.index') }}">
            <i class="fa fa-dashboard"></i> <span>Users</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        
        </li>

        <li class="treeview">
          <a href="{{ route('post.index') }}">
            <i class="fa fa-dashboard"></i> <span>Posts</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        
        </li>
         @can('posts.category',Auth::user())
        <li class="treeview">
          <a href="{{ route('category.index') }}">
            <i class="fa fa-dashboard"></i> <span>Categories</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        
        </li>
        @endcan
        @can('posts.tag',Auth::user())
        <li class="treeview">
          <a href="{{ route('tag.index') }}">
            <i class="fa fa-dashboard"></i> <span>Tags</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        
        </li>
        @endcan
       @can('posts.role_admin',Auth::user())
        <li class="treeview">
          <a href="{{ route('role.index') }}">
            <i class="fa fa-dashboard"></i> <span>Roles</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        
        </li>
        @endcan

       {{--   <li class="treeview">
          <a href="{{ route('permission.index') }}">
            <i class="fa fa-dashboard"></i> <span>Permission</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        
        </li> --}}
           <li class="treeview">
          <a href="{{ route('archive.index') }}">
            <i class="fa fa-dashboard"></i> <span>Archive</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        
        </li>
      
       
     
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>