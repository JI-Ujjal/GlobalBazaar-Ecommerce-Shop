<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.newPage') }}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link " href="{{ route('category.list') }}">
                <i class="fa fa-"></i>
                <span>Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('sub.category.list') }}">
                <i class="bi bi-grid"></i>
                <span>Sub Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('brand.list') }}">
                <i class="bi bi-grid"></i>
                <span>Brand</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('product.list') }}">
                <i class="bi bi-grid"></i>
                <span>Product</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('customer.list') }}">
                <i class="bi bi-grid"></i>
                <span>Customer</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('order.list') }}">
                <i class="bi bi-card-checklist"></i>
                <span>Order List</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('delivery.man.list') }}">
                <i class="bi bi-truck"></i>
                <span>Delivery Man</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('user.list') }}">
                <i class="fa fa-fw fa-user"></i>
                <span>Users</span>
            </a>
        </li>

    </ul>

</aside>