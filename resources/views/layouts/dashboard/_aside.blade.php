<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-right image">
              <img src="{{ asset('dashboard/img/user8-128x128.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>حسن الهوارى</p>
              <a href="#"><i class="fa fa-circle text-success"></i> نشط الان  </a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="بحث.....">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>

          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">@lang('site.main_navigation')</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>@lang('site.dashboard')</span>
               
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ route('dashboard.index')}}"><i class="fa fa-circle-o"></i> @lang('site.dashboard') </a></li>
              </ul>
            </li>
      
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>