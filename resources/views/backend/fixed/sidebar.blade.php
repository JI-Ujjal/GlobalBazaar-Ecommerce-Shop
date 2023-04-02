<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.newPage') }}">
            <i class="bi bi-amd"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link " href="{{ route('category.list') }}">
            <i class="bi bi-circle-square"></i>
                <span>Category</span>
            </a>
        </li>
        
        <!--
        <li class="nav-item">
            <a class="nav-link " href="{{ route('sub.category.list') }}">
                <i class="bi bi-grid"></i>
                <span>Sub Category</span>
            </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link " href="{{ route('brand.list') }}">
            <i class="bi bi-bootstrap-fill"></i>
                <span>Brand</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('product.list') }}">
            <i class="bi bi-p-circle-fill"></i>
                <span>Product</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('customer.list') }}">
            <i class="bi bi-person-lines-fill"></i>
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
            <a class="nav-link " href="{{ route('todays.order') }}">
            <i class="bi bi-cart4"></i>
                <span>Todays Order</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('delivery.man.list') }}">
            <i class="bi bi-microsoft-teams"></i>
                <span>Delivery Man</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dot.list') }}">
            <i class="bi bi-geo-alt-fill"></i>
                <span>Delivery Order Tracking</span>
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