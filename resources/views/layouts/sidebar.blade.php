<nav id="sidebar" class="sidebar bg-white text-dark border-end">

    <!-- ==========================================
         ১. সাইডবার ফিক্স করার জন্য কাস্টম CSS 
         ========================================== -->
    <style>
    /* ডিফল্ট মেনু লিংক স্টাইল এবং সুন্দর হোভার */
    #sidebar .nav-link {
        transition: all 0.2s ease !important;
        padding: 10px 15px !important;
        border-radius: 4px !important;
        margin: 2px 8px !important;
        white-space: nowrap !important;
    }

    #sidebar .nav-link:hover {
        background-color: #eaf2ff !important;
        /* হালকা নীল ব্যাকগ্রাউন্ড */
        color: #0d6efd !important;
        /* স্পষ্ট ব্লু টেক্সট */
    }

    /* সাইডবার ছোট বা মিনিমাইজড থাকা অবস্থায় পপআপ সাবমেনু বক্স ফিক্স */
    #sidebar .collapse,
    #sidebar [class*="collapse"] {
        background-color: #ffffff !important;
        /* ড্রপডাউন বক্সের ব্যাকগ্রাউন্ড সবসময় সাদা হবে */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
        /* সুন্দর একটি শ্যাডো */
        border-radius: 6px !important;
        border: 1px solid #e2e8f0 !important;
    }

    /* ছোট সাইডবারের ভেতরের সাবমেনুর লিংকগুলোর টেক্সট কালার */
    #sidebar .collapse .nav-link,
    #sidebar [class*="collapse"] .nav-link {
        color: #334155 !important;
        /* লেখাগুলো ডার্ক ছাই/কালো হবে যাতে সাদা ব্যাকগ্রাউন্ডে স্পষ্ট দেখা যায় */
        background-color: transparent !important;
        padding: 8px 15px !important;
        display: block !important;
        width: 100% !important;
        text-align: left !important;
    }

    /* সাবমেনুর আইটেমে মাউস নিলে (Hover) স্টাইল */
    #sidebar .collapse .nav-link:hover,
    #sidebar [class*="collapse"] .nav-link:hover {
        background-color: #f1f5f9 !important;
        /* হালকা ছাই কালার হোভার ব্যাকগ্রাউন্ড */
        color: #0d6efd !important;
        /* হোভার করলে লেখা নীল হবে */
    }

    /* যদি আপনার থিম ছোট অবস্থায় সাব-মেনুর ওপর বেগুনি বা নীল কোনো ওভারলে কালার জোর করে বসায়, তা রিমুভ করার জন্য */
    #sidebar ul.nav.flex-column div.collapse ul {
        background: #ffffff !important;
        padding: 5px 0 !important;
    }
    </style>

    <!-- ==========================================
         ২. সাইডবার মেনু HTML কন্টেন্ট 
         ========================================== -->
    <ul class="nav flex-column">

        <!-- PROFILE -->
        <li class="nav-item text-center py-3 border-bottom bg-light profile-section">
            <div class="fw-bold text-dark menu-text">{{ auth()->user()->name }}</div>
        </li>

        <!-- DASHBOARD -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active bg-primary text-white' : 'text-dark' }}"
                href="{{ route('dashboard') }}">
                <i class="fa fa-home me-2"></i> <span class="menu-text">Dashboard</span>
            </a>
        </li>

        @if(Auth::user()->can('location.menu'))
        <!-- ========== LOCATION MENU ========== -->
        @php
        $locationRoutes = ['superadmin.all.division', 'superadmin.all.district', 'superadmin.all.upazila',
        'superadmin.all.union'];
        $isLocationActive = request()->routeIs($locationRoutes);
        @endphp
        <li class="nav-item">
            <a class="nav-link text-dark d-flex align-items-center justify-content-between {{ $isLocationActive ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" href="#locationMenu">
                <span><i class="fas fa-map me-2"></i> <span class="menu-text">Location Management</span></span>
                <i class="fas fa-chevron-down arrow-icon"></i>
            </a>
            <div class="collapse {{ $isLocationActive ? 'show' : '' }}" id="locationMenu">
                <ul class="nav flex-column ms-3 border-start ps-2">
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.division') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.division') }}"><span class="menu-text">All
                                Division</span></a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.district') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.district') }}"><span class="menu-text">All
                                Districts</span></a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.upazila') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.upazila') }}"><span class="menu-text">All Upazila</span></a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.union') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.union') }}"><span class="menu-text">All Union</span></a></li>
                </ul>
            </div>
        </li>
        @endif

        @if(Auth::user()->can('user.menu'))
        <!-- ========== USER CREATE MENU ========== -->
        @php
        $userRoutes = ['superadmin.user.create', 'superadmin.user.list', 'superadmin.user.edit'];
        $isUserActive = request()->routeIs($userRoutes);
        @endphp
        <li class="nav-item">
            <a class="nav-link text-dark d-flex align-items-center justify-content-between {{ $isUserActive ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" href="#userMenu">
                <span><i class="fas fa-user-plus me-2"></i> <span class="menu-text">User Create</span></span>
                <i class="fas fa-chevron-down arrow-icon"></i>
            </a>
            <div class="collapse {{ $isUserActive ? 'show' : '' }}" id="userMenu">
                <ul class="nav flex-column ms-3 border-start ps-2">
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.user.create') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.user.create') }}"><span class="menu-text">User Create</span></a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.user.list','superadmin.user.edit') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.user.list') }}"><span class="menu-text">User List</span></a></li>
                </ul>
            </div>
        </li>
        @endif

        @if(Auth::user()->can('case.menu'))
        <!-- ========== DATA ENTRY MENU ========== -->
        @php
        $dataRoutes = ['superadmin.case.create', 'superadmin.case.list',
        'superadmin.view.case','superadmin.question.summary'];
        $isDataActive = request()->routeIs($dataRoutes);
        @endphp
        <li class="nav-item">
            <a class="nav-link text-dark d-flex align-items-center justify-content-between {{ $isDataActive ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" href="#dataMenu">
                <span><i class="fas fa-database me-2"></i> <span class="menu-text">Data Entry</span></span>
                <i class="fas fa-chevron-down arrow-icon"></i>
            </a>
            <div class="collapse {{ $isDataActive ? 'show' : '' }}" id="dataMenu">
                <ul class="nav flex-column ms-3 border-start ps-2">
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.case.create') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.case.create') }}"><span class="menu-text">Create Data</span></a>
                    </li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.case.list','superadmin.view.case') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.case.list') }}"><span class="menu-text">View Data</span></a></li>
                </ul>
            </div>
        </li>
        @endif

        @if(Auth::user()->can('role.menu'))
        <!-- ========== ROLE & PERMISSION ========== -->
        @php
        $roleRoutes = ['superadmin.all.permission', 'superadmin.all.role', 'superadmin.all.role.permission',
        'superadmin.all.question'];
        $isRoleActive = request()->routeIs($roleRoutes);
        @endphp
        <li class="nav-item">
            <a class="nav-link text-dark d-flex align-items-center justify-content-between {{ $isRoleActive ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" href="#roleMenu">
                <span><i class="fas fa-key me-2"></i> <span class="menu-text">Role & Permission</span></span>
                <i class="fas fa-chevron-down arrow-icon"></i>
            </a>
            <div class="collapse {{ $isRoleActive ? 'show' : '' }}" id="roleMenu">
                <ul class="nav flex-column ms-3 border-start ps-2">
                    @if(Auth::user()->can('all.permission'))
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.permission') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.permission') }}"><span class="menu-text">All
                                Permissions</span></a></li>
                    @endif
                    @if(Auth::user()->can('all.role'))
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.role') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.role') }}"><span class="menu-text">All Roles</span></a></li>
                    @endif
                    @if(Auth::user()->can('allrole.permission'))
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.role.permission') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.role.permission') }}"><span class="menu-text">Role &
                                Permission</span></a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('superadmin.all.question') ? 'active bg-primary text-white' : 'text-dark' }}"
                            href="{{ route('superadmin.all.question') }}"><span class="menu-text">58 Question</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        <!-- BANNER & OTHERS -->
        @if(auth()->user()->user_type == "Super Admin" || auth()->user()->user_type == "MoHa")
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('superadmin.banners') ? 'active bg-primary text-white' : '' }}"
                href="{{ route('superadmin.banners') }}">
                <i class="fas fa-image me-2"></i> <span class="menu-text">Banner</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('listed.ministry.agency') ? 'active bg-primary text-white' : '' }}"
                href="{{ route('listed.ministry.agency') }}">
                <i class="fas fa-building me-2"></i> <span class="menu-text">List Ministry & Agency</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('superadmin.all.faq') ? 'active bg-primary text-white' : '' }}"
                href="{{ route('superadmin.all.faq') }}">
                <i class="fas fa-question-circle me-2"></i> <span class="menu-text">Question & Answers</span>
            </a>
        </li>
        @endif

        <!-- LOGOUT -->
        <li class="nav-item border-top mt-2">
            <a class="nav-link text-danger" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt me-2"></i> <span class="menu-text">Logout</span>
            </a>
        </li>

    </ul>
</nav>