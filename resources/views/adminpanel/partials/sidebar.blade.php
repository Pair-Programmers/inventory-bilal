<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle"
                            src="{{ asset('storage') }}/images/admins/{{ Auth::guard('admin')->user()->profile_image }}"
                            {{-- src="{{ asset('adminpanel') }}/img/logo.jpg" --}}
                            style="width: 70px; height: 70px" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong
                                    class="font-bold">{{Auth::guard('admin')->user()->name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::guard('admin')->user()->type }}<b
                                    class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        {{-- <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li> --}}
                        <li><a href="{{route('admin.setting', ['id'=>1])}}">Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('admin.logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="logo-element">
                    BB
                </div>
            </li>
            <li>
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-th-large">
                    </i> <span class="nav-label">Dashboard
                    </span>
                </a>

            </li>


            <li class="@if (request()->is('admin/product*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.product.index') }}">
                    <i class="fa fa-cube"></i> <span class="nav-label">Products</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse active">
                    <li><a href="{{ route('admin.product.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.product.index') }}">List / Report</a></li>
                    <li><a href="{{ route('admin.product.category.index') }}">Manage Category</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('admin/sale_invoice*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.sale_invoice.index') }}">
                    <i class="fa fa-arrow-circle-up"></i> <span class="nav-label">Sale Invoice</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.sale_invoice.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.sale_invoice.index') }}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('admin/customer*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.customer.index') }}">
                    <i class="fa fa-user"></i> <span class="nav-label">Customers</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.customer.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.customer.index') }}">List / Report</a></li>
                </ul>
            </li>






            <li class="@if (request()->is('admin/purchase_invoice*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.purchase_invoice.index') }}">
                    <i class="fa fa-arrow-circle-down"></i> <span class="nav-label">Purchase Invoice</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.purchase_invoice.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.purchase_invoice.index') }}">List / Report</a></li>
                </ul>
            </li>



            <li class="@if (request()->is('admin/vendor*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.vendor.index') }}">
                    <i class="fa fa-user"></i> <span class="nav-label">Vendors</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.vendor.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.vendor.index') }}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('admin/payment*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.payment.index') }}">
                    <i class="fa fa-money"></i> <span class="nav-label">Payments</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.payment.create.recieve') }}">Recieve Payment</a></li>
                    <li><a href="{{ route('admin.payment.create.make') }}">Make Payment</a></li>
                    <li><a href="{{ route('admin.payment.index') }}">List / Report</a></li>
                </ul>
            </li>

            <li class="@if (request()->is('admin/expense*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.expense.index') }}">
                    <i class="fa fa-area-chart"></i> <span class="nav-label">Expenses</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.expense.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.expense.index') }}">List / Report</a></li>
                    <li><a href="{{ route('admin.expense.category.index') }}">Manage Category</a></li>
                </ul>
            </li>


            <li class="@if (request()->is('admin/employee*'))  {{'active'}} @else {{''}} @endif">
                <a href="{{ route('admin.employee.index') }}">
                    <i class="fa fa-group"></i> <span class="nav-label">Employees</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.employee.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.employee.index') }}">List / Report</a></li>
                </ul>
            </li>




            <li >
                <a href="{{ route('admin.login') }}">
                    <i class="fa fa-file-text"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.sale_invoice.index') }}">Sales List</a></li>
                    <li><a href="{{ route('admin.purchase_invoice.index') }}">Purchase List</a></li>
                    <li><a href="{{ route('admin.expense.category.index') }}">Expense List</a></li>
                    <li><a href="{{ route('admin.product.index') }}">Products List</a></li>
                    <li><a href="{{ route('admin.employee.index') }}">Employees List</a></li>
                    <li><a href="{{ route('admin.customer.index') }}">Customers List</a></li>
                    <li><a href="{{ route('admin.vendor.index') }}">Vendors List</a></li>
                </ul>
            </li>




        </ul>

    </div>
</nav>
