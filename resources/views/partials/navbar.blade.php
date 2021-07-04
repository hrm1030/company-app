<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                <i class="bi bi-list fs-1"></i>
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ url('/') }}" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo-compact.svg') }}" class="h-15px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->

                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="topbar d-flex align-items-stretch flex-shrink-0">
                    <!--begin::User-->
                    <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            @if(isset(Auth::user()->photo))
                            <img src="{{ asset(Auth::user()->photo) }}" alt="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" />
                            @else
                            @php
                                $color_array = array('success', 'danger', 'warning', 'dark', 'primary', 'info');
                                $color = array_rand($color_array, 1);
                            @endphp
                            <div class="symbol symbol-50px overflow-hidden me-3">
                                <a href="apps/user-management/users/view.html">
                                    <div class="symbol-label fs-3 bg-light-{{ $color_array[$color] }} text-{{ $color_array[$color] }}">{{ Auth::user()->firstname[0] }}</div>
                                </a>
                            </div>
                            @endif
                        </div>

                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        @if(isset(Auth::user()->photo))
                                        <img src="{{ asset(Auth::user()->photo) }}" alt="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" />
                                        @else
                                        @php
                                            $color_array = array('success', 'danger', 'warning', 'dark', 'primary', 'info');
                                            $color = array_rand($color_array, 1);
                                        @endphp
                                        <div class="symbol symbol-50px overflow-hidden me-3">
                                            <a href="apps/user-management/users/view.html">
                                                <div class="symbol-label fs-3 bg-light-{{ $color_array[$color] }} text-{{ $color_array[$color] }}">{{ Auth::user()->firstname[0] }}</div>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
                                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="#" class="menu-link px-5"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a>
                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
