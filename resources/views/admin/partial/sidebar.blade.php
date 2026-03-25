<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th-list"></i>
                <p>Danh mục sản phẩm</p>
            </a>
        </li>

        <li class="nav-item {{ request()->is('admin/product*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cubes"></i>
                <p>
                    Quản lý Sản phẩm
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon text-info"></i>
                        <p>Danh sách sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.create') }}" class="nav-link {{ request()->routeIs('product.create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon text-success"></i>
                        <p>Thêm mới sản phẩm</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>