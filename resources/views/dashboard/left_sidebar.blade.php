<div class="p-0 left-side-bar col-2 d-flex flex-column flex-shrink-0" id="left-sidebar" style="height: 780px;">
    <div id="main-logo" class="my-4 mx-auto">
        <img src="{{ asset('image_layout/Logo alta.svg') }}" alt="Logo Alta" width="100%">
    </div>

    <div class="w-100 mb-auto">
        <ul class="nav nav-pills flex-column mb-auto">

            <li>
                <a href="#" class="nav-link link-dark rounded-0 ps-0">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link  link-dark rounded-0 ps-0">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Thiết bị
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark rounded-0 ps-0">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Dịch vụ
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark rounded-0 ps-0">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    Cấp số
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark rounded-0 ps-0">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Báo cáo
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark rounded-0 ps-0">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Cài đặt hệ thống
                </a>
            </li>
        </ul>
    </div>
    <div class="logout-button mx-auto mb-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link class="text-custom-button" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Đăng xuất') }}
            </x-dropdown-link>
        </form>
    </div>
</div>