<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/')}}" class="text-center brand-link">
    <span class="brand-text font-weight-light">W-apartment</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="pb-3 mt-3 mb-3 user-panel d-flex justify-content-center">
      <div class="info">
        <a href="#" class="d-block">管理者A様</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 active">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="{{(request()->is('admin/housing*'))?'nav-item menu-is-opening menu-open':'nav-item'}}">
          <a href="#" class="{{(request()->is('admin/housing*'))?'nav-link active':'nav-link'}}">
            <i class="nav-icon far fa fa-home"></i>
            <p>
              商品住宅
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="{{(request()->is('admin/housing/'))?'nav-item active':'nav-item'}}">
              <a href="{{url('/admin/housing/create')}}" class="{{(request()->is('admin/housing/create'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>商品住宅登録</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/housing')}}" class="{{(request()->is('admin/housing'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>商品住宅一覧</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="{{(request()->is('admin/results*'))?'nav-item menu-is-opening menu-open':'nav-item'}}">
          <a href="#" class="{{(request()->is('admin/results*'))?'nav-link active':'nav-link'}}">
            <i class="nav-icon far fa-fw fa fa-signal"></i>
            <p>
              施工実績
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/admin/results/create')}}" class="{{(request()->is('admin/results/create'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>施工実績登録</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/results/')}}" class="{{(request()->is('admin/results'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>施工実績一覧</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/results_area/create')}}" class="{{(request()->is('admin/results_area/create'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>地域</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/results_amount/create')}}" class="{{(request()->is('admin/results_amount/create'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>金額</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/results_housetype/create')}}" class="{{(request()->is('admin/results_housetype/create'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>間取り</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="{{(request()->is('admin/news*'))?'nav-item menu-is-opening menu-open':'nav-item'}}">
          <a href="#" class="{{(request()->is('admin/news*'))?'nav-link active':'nav-link'}}">
            <i class="nav-icon fa fa-bell"></i>
            <p>
              お知らせ
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('/admin/news/create')}}" class="{{(request()->is('admin/news/create'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>投稿</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/admin/news')}}" class="{{(request()->is('admin/news'))?'nav-link active':'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>お知らせ一覧</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="{{(request()->is('admin/blog*'))?'nav-item menu-is-opening menu-open':'nav-item'}}">
            <a href="#" class="{{(request()->is('admin/blog*'))?'nav-link active':'nav-link'}}">
              <i class="nav-icon far fa-fw fa fa-pen-nib"></i>
              <p>
                ブログ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/blog/create')}}" class="{{(request()->is('admin/blog/create'))?'nav-link active':'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>投稿</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/blog')}}" class="{{(request()->is('admin/blog/list'))?'nav-link active':'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ブログ一覧</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/blog_category')}}" class="{{(request()->is('admin/blog_category*'))?'nav-link active':'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>カテゴリ</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
// $('.nav-link').click(function() {
//   $(this).parent('.nav-item').addClass('menu-is-opening menu-open');
//   $(this).parent().siblings().removeClass("menu-is-opening menu-open");
// });
</script>
