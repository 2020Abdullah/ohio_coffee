<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex align-items-center content">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
        </ul>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex">
                        <span class="user-name fw-bolder">{{ auth('web')->user()->name }}</span>
                        <span class="user-status">أدمن</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ asset($contact->logo) }}" alt="avatar" height="40" width="40">                                        
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#">
                            <i class="me-50" data-feather="settings"></i>
                            ملفك الشخصي
                        </a>

                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="me-50" data-feather="power"></i> 
                            تسجيل الخروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}    
                        </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->    