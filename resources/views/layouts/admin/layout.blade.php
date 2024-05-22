@include('layouts.admin.header')
<body id="page-top" class="body_bg">

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
            <li class="nav-item {{ Route::is('admin.dashboard')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ $website_lang->where('lang_key','dashboard')->first()->custom_lang }}</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ $website_lang->where('lang_key','interface')->first()->custom_lang }}
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#admin-case-pages"
                    aria-expanded="true" aria-controls="admin-case-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Litigation</span>
                </a>
                <div id="admin-case-pages" class="collapse {{ Route::is('admin.case-class.index') || Route::is('admin.case-category.index') || Route::is('admin.case-type.index') || Route::is('admin.case-matter.index') || Route::is('admin.case-title.index') || Route::is('admin.case-law.index') ?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item {{ Route::is('admin.case-class.index')?'active':'' }}" href="{{ route('admin.case-class.index') }}">All Case Class</a>
                         <a class="collapse-item {{ Route::is('admin.case-category.index') || Route::is('admin.case-category.index')?'active':'' }}" href="{{ route('admin.case-category.index') }}">All Case Category</a>
                         <a class="collapse-item {{ Route::is('admin.case-type.index') || Route::is('admin.case-type.index')?'active':'' }}" href="{{ route('admin.case-type.index') }}">All Case Type</a>
                         <a class="collapse-item {{ Route::is('admin.case-matter.index') || Route::is('admin.case-matter.index')?'active':'' }}" href="{{ route('admin.case-matter.index') }}">All Case Matter</a>
                         <a class="collapse-item {{ Route::is('admin.case-title.index') || Route::is('admin.case-title.index')?'active':'' }}" href="{{ route('admin.case-title.index') }}">All Case Title</a>
                         <a class="collapse-item {{ Route::is('admin.case-law.index') || Route::is('admin.case-law.index')?'active':'' }}" href="{{ route('admin.case-law.index') }}">All Case Laws</a>
                         <a class="collapse-item {{ Route::is('admin.case-section.index') || Route::is('admin.case-section.index')?'active':'' }}" href="{{ route('admin.case-section.index') }}">All Case Section</a>
                         <a class="collapse-item {{ Route::is('admin.case-nature.index') || Route::is('admin.case-nature.index')?'active':'' }}" href="{{ route('admin.case-nature.index') }}">All Case Natures</a>
                         <a class="collapse-item {{ Route::is('admin.case-prayer.index') || Route::is('admin.case-prayer.index')?'active':'' }}" href="{{ route('admin.case-prayer.index') }}">All Case Prayer</a>
                         <a class="collapse-item {{ Route::is('admin.court.index') || Route::is('admin.court.index')?'active':'' }}" href="{{ route('admin.court.index') }}">All Courts</a>
                         <a class="collapse-item {{ Route::is('admin.case-status.index') || Route::is('admin.case-status.index')?'active':'' }}" href="{{ route('admin.case-status.index') }}">All Case Status</a>
                         <a class="collapse-item {{ Route::is('admin.disposed-status.index') || Route::is('admin.disposed-status.index')?'active':'' }}" href="{{ route('admin.disposed-status.index') }}">All Disposed Status</a>
                         <a class="collapse-item {{ Route::is('admin.diposed-by.index') || Route::is('admin.diposed-by.index')?'active':'' }}" href="{{ route('admin.diposed-by.index') }}">All Disposed By</a>
                         <a class="collapse-item {{ Route::is('admin.evidence-of-diposed.index') || Route::is('admin.evidence-of-diposed.index')?'active':'' }}" href="{{ route('admin.evidence-of-diposed.index') }}">All Evidence Of Disposed</a>
                         <a class="collapse-item {{ Route::is('admin.evidence-type.index') || Route::is('admin.evidence-type.index')?'active':'' }}" href="{{ route('admin.evidence-type.index') }}">All Evidence Type</a>
                         <a class="collapse-item {{ Route::is('admin.client-category.index') || Route::is('admin.client-category.index')?'active':'' }}" href="{{ route('admin.client-category.index') }}">All Client Category</a>
                         <a class="collapse-item {{ Route::is('admin.client-sub-category.index') || Route::is('admin.client-sub-category.index')?'active':'' }}" href="{{ route('admin.client-sub-category.index') }}">All Client Sub Category</a>
                         <a class="collapse-item {{ Route::is('admin.document-received.index') || Route::is('admin.document-received.index')?'active':'' }}" href="{{ route('admin.document-received.index') }}">All Document Litigation</a>
                         <a class="collapse-item {{ Route::is('admin.fixed-for.index') || Route::is('admin.fixed-for.index')?'active':'' }}" href="{{ route('admin.fixed-for.index') }}">All Case Fixed For</a>
                         <a class="collapse-item {{ Route::is('admin.court-proceeding.index') || Route::is('admin.court-proceeding.index')?'active':'' }}" href="{{ route('admin.court-proceeding.index') }}">All Court Proceeding</a>
                         <a class="collapse-item {{ Route::is('admin.court-order.index') || Route::is('admin.court-order.index')?'active':'' }}" href="{{ route('admin.court-order.index') }}">All Court Orders</a>
                         <a class="collapse-item {{ Route::is('admin.day-notes.index') || Route::is('admin.day-notes.index')?'active':'' }}" href="{{ route('admin.day-notes.index') }}">All Day Notes</a>
                         <a class="collapse-item {{ Route::is('admin.next-day-presence.index') || Route::is('admin.next-day-presence.index')?'active':'' }}" href="{{ route('admin.next-day-presence.index') }}">All Next Day Presence</a>
                         <a class="collapse-item {{ Route::is('admin.case-proceeding-status.index') || Route::is('admin.case-proceeding-status.index')?'active':'' }}" href="{{ route('admin.case-proceeding-status.index') }}">All Case Proceeding Status</a>
                         <a class="collapse-item {{ Route::is('admin.activities-mode.index') || Route::is('admin.activities-mode.index')?'active':'' }}" href="{{ route('admin.activities-mode.index') }}">All Activities Mode</a>
                         <a class="collapse-item {{ Route::is('admin.title-events.index') || Route::is('admin.title-events.index')?'active':'' }}" href="{{ route('admin.title-events.index') }}">All Title Events</a>
                         <a class="collapse-item {{ Route::is('admin.client-behalve.index') || Route::is('admin.client-behalve.index')?'active':'' }}" href="{{ route('admin.client-behalve.index') }}">All Client Behalves</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#admin-account"
                    aria-expanded="true" aria-controls="admin-account">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Account</span>
                </a>
                <div id="admin-account" class="collapse {{ Route::is('admin.bill-category.index') ? 'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item {{ Route::is('admin.bill-category.index')?'active':'' }}" href="{{ route('admin.bill-category.index') }}">All Bill Categories</a>
                         <a class="collapse-item {{ Route::is('admin.bill-reference.index') || Route::is('admin.bill-reference.index')?'active':'' }}" href="{{ route('admin.bill-reference.index') }}">All Bill References</a>
                         <a class="collapse-item {{ Route::is('admin.bill-type.index') || Route::is('admin.bill-type.index')?'active':'' }}" href="{{ route('admin.bill-type.index') }}">All Bill Type</a>
                         <a class="collapse-item {{ Route::is('admin.ledger-head.index') || Route::is('admin.ledger-head.index')?'active':'' }}" href="{{ route('admin.ledger-head.index') }}">All Ledger Head</a>
                         <a class="collapse-item {{ Route::is('admin.ledger-sub-head.index') || Route::is('admin.ledger-sub-head.index')?'active':'' }}" href="{{ route('admin.ledger-sub-head.index') }}">All Ledger Sub Head</a>
                         <a class="collapse-item {{ Route::is('admin.payment-type.index') || Route::is('admin.payment-type.index')?'active':'' }}" href="{{ route('admin.payment-type.index') }}">All Payment Types</a>
                         <a class="collapse-item {{ Route::is('admin.adjustment-reason.index') || Route::is('admin.adjustment-reason.index')?'active':'' }}" href="{{ route('admin.adjustment-reason.index') }}">All Adjustment Reasons</a>
                         <a class="collapse-item {{ Route::is('admin.invoice-subject.index') || Route::is('admin.invoice-subject.index')?'active':'' }}" href="{{ route('admin.invoice-subject.index') }}">All Invoice Subject</a>
                         {{-- <a class="collapse-item {{ Route::is('admin.engagement-type.index') || Route::is('admin.engagement-type.index')?'active':'' }}" href="{{ route('admin.engagement-type.index') }}">All Engagement Type</a> --}}
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#admin-client"
                    aria-expanded="true" aria-controls="admin-client">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Client</span>
                </a>
                <div id="admin-client" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item {{ Route::is('admin.engagement-type.index')?'active':'' }}" href="{{ route('admin.engagement-type.index') }}">All Engagement Types</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#admin-legal"
                    aria-expanded="true" aria-controls="admin-legal">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Legal Service</span>
                </a>
                <div id="admin-legal" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item {{ Route::is('admin.service-category.index')?'active':'' }}" href="{{ route('admin.service-category.index') }}">Service Category</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#admin-general"
                    aria-expanded="true" aria-controls="admin-general">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>General Setting</span>
                </a>
                <div id="admin-general" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item {{ Route::is('admin.division.index')?'active':'' }}" href="{{ route('admin.division.index') }}">All Division</a>
                         <a class="collapse-item {{ Route::is('admin.district.index') || Route::is('admin.district.index')?'active':'' }}" href="{{ route('admin.district.index') }}">All District</a>
                         <a class="collapse-item {{ Route::is('admin.police-station.index') || Route::is('admin.police-station.index')?'active':'' }}" href="{{ route('admin.police-station.index') }}">All Police Station</a>
                         <a class="collapse-item {{ Route::is('admin.zone.index') || Route::is('admin.zone.index')?'active':'' }}" href="{{ route('admin.zone.index') }}">All Zones</a>
                         <a class="collapse-item {{ Route::is('admin.area.index') || Route::is('admin.area.index')?'active':'' }}" href="{{ route('admin.area.index') }}">All Areas</a>
                         <a class="collapse-item {{ Route::is('admin.branch.index') || Route::is('admin.branch.index')?'active':'' }}" href="{{ route('admin.branch.index') }}">All Branch</a>
                       

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#admin-order-pages"
                    aria-expanded="true" aria-controls="admin-order-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span> {{ $website_lang->where('lang_key','order')->first()->custom_lang }}</span>
                </a>
                <div id="admin-order-pages" class="collapse {{Route::is('admin.all.order') || Route::is('admin.pending.order') || Route::is('admin.show.order') ?'show':''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.pending.order')?'active':'' }}" href="{{ route('admin.pending.order') }}">{{ $website_lang->where('lang_key','pending_order')->first()->custom_lang }}</a>
                        <a class="collapse-item {{ Route::is('admin.all.order') || Route::is('admin.show.order')?'active':'' }}" href="{{ route('admin.all.order') }}">{{ $website_lang->where('lang_key','all_order')->first()->custom_lang }}</a>

                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin-appointment-pages"
                    aria-expanded="true" aria-controls="admin-appointment-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span> {{ $website_lang->where('lang_key','appointment')->first()->custom_lang }}</span>
                </a>
                <div id="admin-appointment-pages" class="collapse {{ Route::is('admin.all.appointment') || Route::is('admin.clients') || Route::is('admin.client.show') || Route::is('admin.payment') || Route::is('admin.schedule.*') || Route::is('admin.appointment-show') || Route::is('admin.patient.show') || Route::is('admin.zoom-meeting') || Route::is('admin.day.*') ? 'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item {{ Route::is('admin.all.appointment') || Route::is('admin.appointment-show') ? 'active':'' }}" href="{{ route('admin.all.appointment') }}">All {{ $website_lang->where('lang_key','appointment')->first()->custom_lang }}</a>


                        <a class="collapse-item {{ Route::is('admin.clients') || Route::is('admin.client.show')?'active':'' }}" href="{{ route('admin.clients') }}">{{ $website_lang->where('lang_key','client')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.payment')?'active':'' }}" href="{{ route('admin.payment') }}">{{ $website_lang->where('lang_key','payment')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.schedule.*')?'active':'' }}" href="{{ route('admin.schedule.index') }}">{{ $website_lang->where('lang_key','schedule')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.day.*')?'active':'' }}" href="{{ route('admin.day.index') }}">{{ $website_lang->where('lang_key','day')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.zoom-meeting')?'active':'' }}" href="{{ route('admin.zoom-meeting') }}">{{ $website_lang->where('lang_key','zoom_meeting')->first()->custom_lang }}</a>


                    </div>
                </div>
            </li>






             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','pages')->first()->custom_lang }}</span>
                </a>
                <div id="collapsePages" class="collapse {{
                Route::is('admin.service.*') ||
                Route::is('admin.faq-category.index') ||
                Route::is('admin.testimonial.index') ||
                Route::is('admin.about.index') ||
                Route::is('admin.custom-page.index') ||
                Route::is('admin.terms-privacy.index') ||
                Route::is('admin.service-video.*') ||
                Route::is('admin.faq.by.service')||
                Route::is('admin.custom-page.*') ||
                Route::is('admin.faq.category')
                 ? 'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">


                        <a class="collapse-item {{ Route::is('admin.service.*') || Route::is('admin.service-video.*') || Route::is('admin.faq.by.service')?'active':'' }}" href="{{ route('admin.service.index') }}">{{ $website_lang->where('lang_key','service')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.faq-category.index') || Route::is('admin.faq.category')?'active':'' }}" href="{{ route('admin.faq-category.index') }}">{{ $website_lang->where('lang_key','create_faq')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.testimonial.index')?'active':'' }}" href="{{ route('admin.testimonial.index') }}">{{ $website_lang->where('lang_key','testimonial')->first()->custom_lang }}</a>
                        <a class="collapse-item {{ Route::is('admin.about.index')?'active':'' }}" href="{{ route('admin.about.index') }}">{{ $website_lang->where('lang_key','about_us')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.custom-page.index') || Route::is('admin.custom-page.*')?'active':'' }}" href="{{ route('admin.custom-page.index') }}">{{ $website_lang->where('lang_key','custom_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.terms-privacy.index')?'active':'' }}" href="{{ route('admin.terms-privacy.index') }}">{{ $website_lang->where('lang_key','terms_and_cond')->first()->custom_lang }}</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctor-2-pages"
                    aria-expanded="true" aria-controls="doctor-2-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','lawyer')->first()->custom_lang }}</span>
                </a>
                <div id="doctor-2-pages" class="collapse {{ Route::is('admin.department.*') || Route::is('admin.location.*') || Route::is('admin.lawyer.*') || Route::is('admin.department-video.*') || Route::is('admin.faq.by.department') ? 'show': '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.department.*') || Route::is('admin.department-video.*') || Route::is('admin.faq.by.department') ?'active':'' }}" href="{{ route('admin.department.index') }}">{{ $website_lang->where('lang_key','department')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.location.*')?'active':'' }}" href="{{ route('admin.location.index') }}">{{ $website_lang->where('lang_key','location')->first()->custom_lang }}</a>
                        <a class="collapse-item {{ Route::is('admin.lawyer.*')?'active':'' }}" href="{{ route('admin.lawyer.index') }}">{{ $website_lang->where('lang_key','lawyer')->first()->custom_lang }}</a>



                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#page-setup-pages"
                    aria-expanded="true" aria-controls="page-setup-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','seo_setup')->first()->custom_lang }}</span>
                </a>
                <div id="page-setup-pages" class="collapse {{
                    Route::is('admin.home.page') ||
                    Route::is('admin.aboutus.page') ||
                    Route::is('admin.lawyer-page') ||
                    Route::is('admin.department-page') ||
                    Route::is('admin.service-page') ||
                    Route::is('admin.testimonial.page') ||
                    Route::is('admin.faq.page') ||
                    Route::is('admin.blog.page') ||
                    Route::is('admin.contactus.page') ? 'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.home.page')?'active':'' }}" href="{{ route('admin.home.page') }}">{{ $website_lang->where('lang_key','home_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.aboutus.page')?'active':'' }}" href="{{ route('admin.aboutus.page') }}">{{ $website_lang->where('lang_key','about_us')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.lawyer-page')?'active':'' }}" href="{{ route('admin.lawyer-page') }}">{{ $website_lang->where('lang_key','lawyer_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.department-page')?'active':'' }}" href="{{ route('admin.department-page') }}">{{ $website_lang->where('lang_key','department_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.service-page')?'active':'' }}" href="{{ route('admin.service-page') }}">{{ $website_lang->where('lang_key','service_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.testimonial.page')?'active':'' }}" href="{{ route('admin.testimonial.page') }}">{{ $website_lang->where('lang_key','testimonial_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.faq.page')?'active':'' }}" href="{{ route('admin.faq.page') }}">{{ $website_lang->where('lang_key','faq_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.blog.page')?'active':'' }}" href="{{ route('admin.blog.page') }}">{{ $website_lang->where('lang_key','blog_page')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.contactus.page')?'active':'' }}" href="{{ route('admin.contactus.page') }}">{{ $website_lang->where('lang_key','contact_us_page')->first()->custom_lang }}</a>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#website-setup-pages"
                    aria-expanded="true" aria-controls="website-setup-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','language')->first()->custom_lang }}</span>
                </a>
                <div id="website-setup-pages" class="collapse {{
                    Route::is('admin.setup.navbar') ||
                    Route::is('admin.setup.text') || Route::is('admin.validation.errors') || Route::is('admin.notification.text') ? 'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.setup.navbar')?'active':'' }}" href="{{ route('admin.setup.navbar') }}">{{ $website_lang->where('lang_key','navigation')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.setup.text')?'active':'' }}" href="{{ route('admin.setup.text') }}">{{ $website_lang->where('lang_key','website_lang')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.validation.errors')?'active':'' }}" href="{{ route('admin.validation.errors') }}">{{ $website_lang->where('lang_key','valid_lang')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.notification.text')?'active':'' }}" href="{{ route('admin.notification.text') }}">{{ $website_lang->where('lang_key','notify_lang')->first()->custom_lang }}</a>



                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#home-section-2-pages"
                    aria-expanded="true" aria-controls="home-section-2-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','home_section')->first()->custom_lang }}</span>
                </a>
                <div id="home-section-2-pages" class="collapse {{ Route::is('admin.feature.index') || Route::is('admin.slider.index') || Route::is('admin.home-section.*') || Route::is('admin.overview.index') || Route::is('admin.work.index') || Route::is('admin.work-faq.index') || Route::is('admin.partner.index') || Route::is('admin.slider.content') ? 'show': '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.slider.index') || Route::is('admin.slider.content')?'active':'' }}" href="{{ route('admin.slider.index') }}">{{ $website_lang->where('lang_key','slider')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.feature.index')?'active':'' }}" href="{{ route('admin.feature.index') }}">{{ $website_lang->where('lang_key','feature')->first()->custom_lang }}</a>


                        <a class="collapse-item {{ Route::is('admin.work.index')?'active':'' }}" href="{{ route('admin.work.index') }}">{{ $website_lang->where('lang_key','work_section')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.work-faq.index')?'active':'' }}" href="{{ route('admin.work-faq.index') }}">{{ $website_lang->where('lang_key','work_faq')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.overview.index')?'active':'' }}" href="{{ route('admin.overview.index') }}">{{ $website_lang->where('lang_key','overview')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.partner.index')?'active':'' }}" href="{{ route('admin.partner.index') }}">{{ $website_lang->where('lang_key','partner')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.home-section.*')?'active':'' }}" href="{{ route('admin.home-section.index') }}">{{ $website_lang->where('lang_key','section_control')->first()->custom_lang }}</a>


                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting-pages"
                    aria-expanded="true" aria-controls="setting-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span> {{ $website_lang->where('lang_key','setting')->first()->custom_lang }}</span>
                </a>
                <div id="setting-pages" class="collapse {{
                Route::is('admin.settings.index') ||
                Route::is('admin.comment.setting') ||
                Route::is('admin.cookie.consent.setting') ||
                Route::is('admin.payment-account.index') ||
                Route::is('admin.captcha.setting') ||
                Route::is('admin.livechat.setting') ||
                Route::is('admin.preloader.setting') ||
                Route::is('admin.google.analytic.setting') ||
                Route::is('admin.theme-color') ||
                Route::is('admin.clear.database') ||
                Route::is('admin.pagination.index') ||
                Route::is('admin.banner.image') ||
                Route::is('admin.email.template') || Route::is('admin.email-edit') || Route::is('admin.login.image') || Route::is('admin.profile.image') || Route::is('admin.email-configuration') ? 'show' :'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.settings.index')?'active':'' }}" href="{{ route('admin.settings.index') }}">{{ $website_lang->where('lang_key','general_setting')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.comment.setting')?'active':'' }}" href="{{ route('admin.comment.setting') }}">{{ $website_lang->where('lang_key','blog_comment')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.cookie.consent.setting')?'active':'' }}" href="{{ route('admin.cookie.consent.setting') }}">{{ $website_lang->where('lang_key','cookie_consent')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.payment-account.index')?'active':'' }}" href="{{ route('admin.payment-account.index') }}">{{ $website_lang->where('lang_key','payment_account')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.captcha.setting')?'active':'' }}" href="{{ route('admin.captcha.setting') }}">{{ $website_lang->where('lang_key','google_captcha')->first()->custom_lang }}</a>
                        <a class="collapse-item {{ Route::is('admin.livechat.setting')?'active':'' }}" href="{{ route('admin.livechat.setting') }}">{{ $website_lang->where('lang_key','live_chat')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.preloader.setting')?'active':'' }}" href="{{ route('admin.preloader.setting') }}">{{ $website_lang->where('lang_key','preloader')->first()->custom_lang }}</a>
                        <a class="collapse-item {{ Route::is('admin.google.analytic.setting')?'active':'' }}" href="{{ route('admin.google.analytic.setting') }}">{{ $website_lang->where('lang_key','google_analytic')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.theme-color')?'active':'' }}" href="{{ route('admin.theme-color') }}">{{ $website_lang->where('lang_key','theme_color')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.clear.database')?'active':'' }}" href="{{ route('admin.clear.database') }}">{{ $website_lang->where('lang_key','clear_database')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.pagination.index')?'active':'' }}" href="{{ route('admin.pagination.index') }}">{{ $website_lang->where('lang_key','pagination')->first()->custom_lang }}</a>


                        <a class="collapse-item {{ Route::is('admin.email.template') || Route::is('admin.email-edit')?'active':'' }}" href="{{ route('admin.email.template') }}">{{ $website_lang->where('lang_key','email_template')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.email-configuration')?'active':'' }}" href="{{ route('admin.email-configuration') }}">{{ $website_lang->where('lang_key','email_config')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.banner.image')?'active':'' }}" href="{{ route('admin.banner.image') }}">{{ $website_lang->where('lang_key','banner_image')->first()->custom_lang }}</a>
                        <a class="collapse-item {{ Route::is('admin.login.image')?'active':'' }}" href="{{ route('admin.login.image') }}">{{ $website_lang->where('lang_key','login_image')->first()->custom_lang }}</a>
                        <a class="collapse-item {{ Route::is('admin.profile.image')?'active':'' }}" href="{{ route('admin.profile.image') }}">{{ $website_lang->where('lang_key','default_profile')->first()->custom_lang }}</a>





                    </div>
                </div>
            </li>

            @php
                $admin=Auth::guard('admin')->user();
            @endphp
            @if ($admin->admin_type==1)
            <li class="nav-item {{ Route::is('admin.admin-list.index')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.admin-list.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>{{ $website_lang->where('lang_key','admin')->first()->custom_lang }}</span></a>
            </li>
            @endif



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog-pages"
                    aria-expanded="true" aria-controls="blog-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','blog')->first()->custom_lang }}</span>
                </a>
                <div id="blog-pages" class="collapse {{ Route::is('admin.blog-comment') || Route::is('admin.blog-category.*') || Route::is('admin.blog.index') || Route::is('admin.blog.edit') || Route::is('admin.blog.create')  ? 'show': '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item {{ Route::is('admin.blog-category.*')?'active':'' }}" href="{{ route('admin.blog-category.index') }}">{{ $website_lang->where('lang_key','blog_category')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.blog.index') || Route::is('admin.blog.create') || Route::is('admin.blog.edit') ? 'active':'' }}" href="{{ route('admin.blog.index') }}">{{ $website_lang->where('lang_key','blog')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.blog-comment')?'active':'' }}" href="{{ route('admin.blog-comment') }}">{{ $website_lang->where('lang_key','blog_comment')->first()->custom_lang }}</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contact-2-pages"
                    aria-expanded="true" aria-controls="contact-2-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','contact')->first()->custom_lang }}</span>
                </a>
                <div id="contact-2-pages" class="collapse {{ Route::is('admin.contact.message') || Route::is('admin.contact-us.index') || Route::is('admin.contact-information.index')  ? 'show': '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">


                        <a class="collapse-item {{ Route::is('admin.contact-us.index')?'active':'' }}" href="{{ route('admin.contact-us.index') }}">{{ $website_lang->where('lang_key','topbar_contact')->first()->custom_lang }}</a>


                        <a class="collapse-item {{ Route::is('admin.contact-information.index')?'active':'' }}" href="{{ route('admin.contact-information.index') }}">Contact Information</a>
                        <a class="collapse-item {{ Route::is('admin.contact.message')?'active':'' }}" href="{{ route('admin.contact.message') }}">{{ $website_lang->where('lang_key','contact_msg')->first()->custom_lang }}</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subscriber-2-pages"
                    aria-expanded="true" aria-controls="subscriber-2-pages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $website_lang->where('lang_key','subscriber')->first()->custom_lang }}</span>
                </a>
                <div id="subscriber-2-pages" class="collapse {{ Route::is('admin.subscriber') || Route::is('admin.subscriber.content') || Route::is('admin.subscriber.email') ? 'show': '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.subscriber')?'active':'' }}" href="{{ route('admin.subscriber') }}">{{ $website_lang->where('lang_key','subscriber')->first()->custom_lang }}</a>

                        <a class="collapse-item {{ Route::is('admin.subscriber.email')?'active':'' }}" href="{{ route('admin.subscriber.email') }}">{{ $website_lang->where('lang_key','mail_for')->first()->custom_lang }}</a>


                        <a class="collapse-item {{ Route::is('admin.subscriber.content')?'active':'' }}" href="{{ route('admin.subscriber.content') }}">{{ $website_lang->where('lang_key','subscriber_content')->first()->custom_lang }}</a>


                    </div>
                </div>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fas fa-bars"></i>
                    </button>
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

                        @php
                            $orderNotify=App\Order::where('show_notification',0)->orderBy('created_at','desc')->get();
                            $messageNotify=App\ContactMessage::where('show_notification',0)->orderBy('created_at','desc')->get();
                        @endphp

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1" >
                            <a onclick="newOrderNotify()" class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter" id="newOrderNotify">{{ $orderNotify->count() > 0 ?$orderNotify->count() :''  }}</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    {{ $website_lang->where('lang_key','order_center')->first()->custom_lang }}
                                </h6>
                                @foreach ($orderNotify->take(5) as $item)
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.show.order',$item->id) }}">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">{{ $item->created_at->format('Y-m-d') }}</div>
                                        <span class="font-weight-bold">{{ $website_lang->where('lang_key','new_order_from')->first()->custom_lang }} {{ $item->user->name}}</span>
                                    </div>
                                </a>
                                @endforeach

                                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.all.order') }}">{{ $website_lang->where('lang_key','show_all_order')->first()->custom_lang }}</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a onclick="newMessageNotify()" class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter" id="newMessageNotify">{{ $messageNotify->count() > 0 ? $messageNotify->count() :'' }}</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    {{ $website_lang->where('lang_key','message_center')->first()->custom_lang }}
                                </h6>
                                @foreach ($messageNotify->take(5) as $item)
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">{{ $website_lang->where('lang_key','new_msg_from')->first()->custom_lang }} {{ $item->name }}</div>
                                        <div class="small text-gray-500">{{ $item->created_at->format('Y-m-d') }}</div>
                                    </div>
                                </a>
                                @endforeach

                                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.contact.message') }}">{{ $website_lang->where('lang_key','read_more_msg')->first()->custom_lang }}</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @php
                                    $adminInfo=Auth::guard('admin')->user();
                                    $default_profile=App\BannerImage::first();
                                @endphp
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ ucfirst($adminInfo->name) }}</span>
                                @if ($adminInfo->image)
                                    <img class="img-profile rounded-circle"
                                    src="{{ url($adminInfo->image) }}">
                                @else
                                    <img class="img-profile rounded-circle"
                                    src="{{ url($default_profile->default_profile) }}">
                                @endif

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ $website_lang->where('lang_key','profile')->first()->custom_lang }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}">
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

                   @yield('admin-content')

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
