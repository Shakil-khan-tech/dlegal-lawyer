@include('layouts.admin.header')
<body id="page-top">
<style>

tbody tr:hover {
    background-color: rgba(252, 252, 179, .45) !important;
}

.topbar #sidebarToggleTop:hover {
    background-color: transparent;
    border:0;
}
.topbar #sidebarToggleTop {
    height: 2.5rem;
    width: 0.5rem;
    padding: 0;
    border: 0;
}
 .btn:focus {
    outline: 0;
    box-shadow: 0 0 0 0rem rgba(13,110,253,.25);
}
.topbar {
    height: 2.8rem;
}
.topbar .nav-item .nav-link {
    height: 2.8rem;
    display: flex;
    align-items: center;
    padding: 0 0.75rem;
}
.topbar .topbar-divider {
    width: 0;
    border-right: 1px solid #e3e6f0;
    height: calc(4.375rem - 1.9rem);
    margin: auto 1rem;
}
.dropdown a:hover {
    background-color: transparent;
}
.sidebar .nav-item .collapse .collapse-inner .collapse-item, .sidebar .nav-item .collapsing .collapse-inner .collapse-item {
    padding: 0.2rem 1rem;
    margin: 0 0.5rem;
    display: block;
    color: #3a3b45;
    text-decoration: none;
    border-radius: 0.35rem;
    white-space: nowrap;
}
.action_doc a:hover {
    background-color: #3aafa9;
    color: #fff;
}

.main_nav{
    margin-Bottom:0.7rem;
}
</style>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            @php
            $setting=App\Setting::first();
            $website_lang=App\ManageText::all();
            @endphp
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="{{ $setting->sidebar_header_icon }}"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ $setting->sidebar_header_name }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Route::is('lawyer.dashboard')?'active':'' }}">
                <a class="nav-link" href="{{ route('lawyer.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ $website_lang->where('lang_key','dashboard')->first()->custom_lang }}</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ $website_lang->where('lang_key','interface')->first()->custom_lang }}
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Litigation</span>
            </a>
            <div id="collapsePages" class="collapse {{Route::is('lawyer.litigation.*') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Route::is('lawyer.litigation.all')?'active':'' }}" href="{{ route('lawyer.litigation.all') }}">All</a>
                    <a class="collapse-item {{ Route::is('lawyer.litigation.district-court')?'active':'' }}" href="{{ route('lawyer.litigation.district-court') }}">District</a>
                    <a class="collapse-item {{ Route::is('lawyer.litigation.special-court')?'active':'' }}" href="{{ route('lawyer.litigation.special-court') }}">Special</a>
                    <a class="collapse-item {{ Route::is('lawyer.litigation.high-court')?'active':'' }}" href="{{ route('lawyer.litigation.high-court') }}">High Court</a>
                    <a class="collapse-item {{ Route::is('lawyer.litigation.appellate-court')?'active':'' }}" href="{{ route('lawyer.litigation.appellate-court') }}">Appellate Court</a>
                    <a class="collapse-item {{ Route::is('lawyer.litigation.report')?'active':'' }}" href="{{ route('lawyer.litigation.report') }}">Report</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#legalPages"
            aria-expanded="true" aria-controls="legalPages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Legal Services</span>
        </a>

        <div id="legalPages" class="collapse {{ Route::is('lawyer.legalservice.*') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Route::is('lawyer.legalservice.all')?'active':'' }}" href="{{ route('lawyer.legalservice.all') }}">All</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.general')?'active':'' }}" href="{{ route('lawyer.legalservice.general') }}">General Legal Services</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.license')?'active':'' }}" href="{{ route('lawyer.legalservice.license') }}">License & Registration</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.tax')?'active':'' }}" href="{{ route('lawyer.legalservice.tax') }}">Income Tax</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.vat')?'active':'' }}" href="{{ route('lawyer.legalservice.vat') }}">Value Added Tax (VAT)</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.intellectual')?'active':'' }}" href="{{ route('lawyer.legalservice.intellectual') }}">Intellectual Property Rights</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.dispute')?'active':'' }}" href="{{ route('lawyer.legalservice.dispute') }}">Alternative Dispute Resulation</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.research')?'active':'' }}" href="{{ route('lawyer.legalservice.research') }}">Legal Research & Analysis</a>
                <a class="collapse-item {{ Route::is('lawyer.legalservice.visit')?'active':'' }}" href="{{ route('lawyer.legalservice.visit') }}">Visit, Training, Development</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Charts -->
<li class="nav-item {{ Route::is('lawyer.client.*') ?'active':'' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#client-management"
        aria-expanded="true" aria-controls="client-management">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Client Management</span>
    </a>
    <div id="client-management" class="collapse {{ Route::is('lawyer.client.*') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::is('lawyer.client.*') || Route::is('lawyer.client.index') || Route::is('lawyer.client.index.create')?'active':'' }}" href="{{ route('lawyer.client.index') }}">
                All Clients
            </a>
            <a class="collapse-item {{ Route::is('lawyer.client.*') || Route::is('lawyer.client.index') || Route::is('lawyer.client.index.create')?'active':'' }}" href="{{ route('lawyer.client.index') }}">
                Business
            </a>
            <a class="collapse-item {{ Route::is('lawyer.client.person.*') || Route::is('lawyer.client.person.index') || Route::is('lawyer.client.person.index.create')?'active':'' }}" href="{{ route('lawyer.client.person.index') }}">
                Person
            </a>
            {{-- <a class="collapse-item {{ Route::is('lawyer.client.person.index') || Route::is('lawyer.client.person.*') || Route::is('lawyer.client.person.index.create')?'active':'' }}" href="{{ route('lawyer.client.person.index') }}">
                Person
            </a> --}}
        </div>
    </div>
</li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#task"
        aria-expanded="true" aria-controls="task">
        <i class="fa-clipboard-check fa-fw fas"></i>
        <span>Task</span>
    </a>
    <div id="task" class="collapse {{ Route::is('lawyer.task.*') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::is('lawyer.task.task') || Route::is('lawyer.task.task.create')?'active':'' }}" href="{{ route('lawyer.task.task') }}">
                Task
            </a>
            <a class="collapse-item {{ Route::is('lawyer.task.schedule') || Route::is('lawyer.task.schedule.create') ?'active':'' }}" href="{{ route('lawyer.task.schedule') }}">
                Schedule
            </a>
            <a class="collapse-item {{ Route::is('lawyer.task.assignment') || Route::is('lawyer.task.assignment.create') ?'active':'' }}" href="{{ route('lawyer.task.assignment') }}">
                Assignment
            </a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hr"
    aria-expanded="true" aria-controls="hr">
    <i class="fas fa-fw fa-users"></i>
    <span>HR</span>
</a>
<div id="hr" class="collapse {{ Route::is('lawyer.hr.*') || Route::is('lawyer.role.*') || Route::is('lawyer.hrlawyer.*') || Route::is('lawyer.hrnonlawyer.*') || Route::is('lawyer.chamber.*') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Route::is('lawyer.role.all') || Route::is('lawyer.role.create')?'active':'' }}" href="{{ route('lawyer.role.all') }}">
            Role
        </a>
        <a class="collapse-item {{ Route::is('lawyer.chamber.all') || Route::is('lawyer.chamber.create')?'active':'' }}" href="{{ route('lawyer.chamber.all') }}">
            Chamber
        </a>
        <a class="collapse-item {{ Route::is('lawyer.hrlawyer.all') || Route::is('lawyer.hrlawyer.create')?'active':'' }}" href="{{ route('lawyer.hrlawyer.all') }}">
            Lawyer
        </a>
        
        <a class="collapse-item {{ Route::is('lawyer.hrnonlawyer.all') || Route::is('lawyer.hrnonlawyer.create')?'active':'' }}" href="{{ route('lawyer.hrnonlawyer.all') }}">
            Non Lawyer
        </a>
        
    </div>
</div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#account"
    aria-expanded="true" aria-controls="account">
    <i class="fas fa-fw fa-money-bill"></i>
    <span>Account</span>
</a>

<div id="account" class="collapse {{ Route::is('lawyer.account.*') || Route::is('lawyer.account.balance-report') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Route::is('lawyer.account.billing') || Route::is('lawyer.account.billing-create') ?'active':'' }}" href="{{ route('lawyer.account.billing') }}">
            Bill
        </a>
        <a class="collapse-item {{ Route::is('lawyer.account.invoice') ?'active':'' }}" href="{{ route('lawyer.account.invoice') }}">
            Invoice
        </a>
        <a class="collapse-item {{ Route::is('lawyer.account.ledger-entry') ?'active':'' }}" href="{{ route('lawyer.account.ledger-entry') }}">
            Ledger Entry
        </a>
        <a class="collapse-item {{ Route::is('lawyer.account.ledger-report') ?'active':'' }}" href="{{ route('lawyer.account.ledger-report') }}">
            Ledger Report
        </a>
        <a class="collapse-item {{ Route::is('lawyer.account.balance-report') ?'active':'' }}" href="{{ route('lawyer.account.balance-report') }}">
            Balance Report
        </a>
        <a class="collapse-item {{ Route::is('lawyer.account.inc-exp-report') ?'active':'' }}" href="{{ route('lawyer.account.inc-exp-report') }}">
            Income Expense Report
        </a>
    </div>
</div>
</li>
<!-- Nav Item - Charts -->
<li class="nav-item {{ Route::is('lawyer.today.appointment') || Route::is('lawyer.meet') || Route::is('lawyer.edit-prescription') ?'active':'' }}">
    <a class="nav-link" href="{{ route('lawyer.today.appointment') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>{{ $website_lang->where('lang_key','today_appointment')->first()->custom_lang }}</span>
    </a>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#litigation"
    aria-expanded="true" aria-controls="litigation">
    <i class="fas fa-fw fa-folder"></i>
    <span>{{ $website_lang->where('lang_key','manage_appointment')->first()->custom_lang }}</span>
</a>
<div id="litigation" class="collapse {{ Route::is('lawyer.new.appointment') || Route::is('lawyer.all.appointment') || Route::is('lawyer.already.treatment') || Route::is('lawyer.already-meet') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Route::is('lawyer.new.appointment')?'active':'' }}" href="{{ route('lawyer.new.appointment') }}">{{ $website_lang->where('lang_key','new_appointment')->first()->custom_lang }}</a>
        <a class="collapse-item {{ Route::is('lawyer.all.appointment') || Route::is('lawyer.already-meet') ?'active':'' }}" href="{{ route('lawyer.all.appointment') }}">{{ $website_lang->where('lang_key','appointment_history')->first()->custom_lang }}</a>
    </div>
</div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#live-consultant"
    aria-expanded="true" aria-controls="live-consultant">
    <i class="fas fa-fw fa-folder"></i>
    <span>{{ $website_lang->where('lang_key','live_consult')->first()->custom_lang }}</span>
</a>
<div id="live-consultant" class="collapse {{
    Route::is('lawyer.zoom-credential') || Route::is('lawyer.zoom-meetings') || Route::is('lawyer.create-zoom-meeting') || Route::is('lawyer.edit-zoom-meeting') || Route::is('lawyer.upcomming-meeting') || Route::is('lawyer.meeting-history') ? 'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Route::is('lawyer.zoom-meetings') || Route::is('lawyer.create-zoom-meeting') || Route::is('lawyer.edit-zoom-meeting')?'active':'' }}" href="{{ route('lawyer.zoom-meetings') }}">{{ $website_lang->where('lang_key','meeting')->first()->custom_lang }}</a>
        <a class="collapse-item {{ Route::is('lawyer.meeting-history') ?'active':'' }}" href="{{ route('lawyer.meeting-history') }}">{{ $website_lang->where('lang_key','meeting_history')->first()->custom_lang }}</a>
        <a class="collapse-item {{ Route::is('lawyer.upcomming-meeting') ?'active':'' }}" href="{{ route('lawyer.upcomming-meeting') }}">{{ $website_lang->where('lang_key','upcoming_meeting')->first()->custom_lang }}</a>
        <a class="collapse-item {{ Route::is('lawyer.zoom-credential')?'active':'' }}" href="{{ route('lawyer.zoom-credential') }}">{{ $website_lang->where('lang_key','setting')->first()->custom_lang }}</a>
    </div>
</div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Route::is('lawyer.leave.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('lawyer.leave.index') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>{{ $website_lang->where('lang_key','manage_leave')->first()->custom_lang }}</span>
    </a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Route::is('lawyer.payment.history')?'active':'' }}">
    <a class="nav-link" href="{{ route('lawyer.payment.history') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>{{ $website_lang->where('lang_key','payment_history')->first()->custom_lang }}</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Route::is('lawyer.schedule')?'active':'' }}">
        <a class="nav-link" href="{{ route('lawyer.schedule') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>{{ $website_lang->where('lang_key','my_schedule')->first()->custom_lang }}</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('lawyer.message.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>{{ $website_lang->where('lang_key','message')->first()->custom_lang }}</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar static-top shadow main_nav">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link  mr-3">
                        <i class="fas fa-bars"></i>
                    </button>
                     <ul class="navbar-nav">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item" style="margin-left:5px">
                            <a href="{{url('/lawyer/cause/create')}}" class="nav-link" style="color:#fff;font-size:16px">Cause List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('lawyer/litigation-calender-short')}}" class="nav-link" style="color:#fff;font-size:16px">Calendar List</a>
                        </li>
                    </ul>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @php
                    $doctorInfo=Auth::guard('lawyer')->user();
                    @endphp
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ ucfirst($doctorInfo->name) }}</span>
                    @if ($doctorInfo->image)
                    <img class="img-profile rounded-circle"
                    src="{{ url($doctorInfo->image) }}">
                    @else
                    <img class="img-profile rounded-circle"
                    src="{{ url('default-user.jpg') }}">
                    @endif

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('lawyer.profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ $website_lang->where('lang_key','profile')->first()->custom_lang }}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('lawyer.logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ $website_lang->where('lang_key','logout')->first()->custom_lang }}
                </a>
            </div>
        </li>

    </ul>

</nav>

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

   @yield('lawyer-content')

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('layouts.admin.footer')
