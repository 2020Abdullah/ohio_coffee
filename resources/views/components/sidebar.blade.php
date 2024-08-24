<!-- BEGIN: sidebar-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mx-auto">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <div class="brand-logo">
                        <div class="logo">
                            <img src="{{ asset($contact->logo) }}" alt="logo">
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item nav-toggle bg-success">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <span>x</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span data-i18n="Apps &amp; Pages">الصفحات</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item active">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span class="menu-title text-truncate">
                       الرئيسية
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('category.list') }}">
                    <i data-feather='list'></i>
                    <span class="menu-title text-truncate">
                         التصنيفات
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('menu.list') }}">
                    <i data-feather='bell'></i>
                    <span class="menu-title text-truncate">
                         قائمة الطعام
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('contact') }}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate">
                        معلومات الإتصال
                    </span>
                </a>
            </li>
            
        </ul>
    </div>
</div>
<!-- END: sidebar --> 