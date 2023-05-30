<div class="p-0 left-side-bar col-2 d-flex flex-column flex-shrink-0" id="left-sidebar" style="height: 780px;">
    <div id="main-logo" class="my-4 mx-auto">
        <img src="{{ asset('image_layout/Logo alta.svg') }}" alt="Logo Alta" width="100%">
    </div>

    <div class="w-100 mb-auto">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active link-dark rounded-0 ps-0">
                    <i class="bi bi-motherboard ms-3"></i>&nbsp;
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('equipments.all') }}" class="nav-link  link-dark rounded-0 ps-0">
                    <i class="bi bi-pc-display-horizontal ms-3"></i>&nbsp;
                    Thiết bị
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('services.all') }}" class="nav-link link-dark rounded-0 ps-0">
                    <i class="bi bi-wechat ms-3"></i>&nbsp;
                    Dịch vụ
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('queuings.all') }}" class="nav-link link-dark rounded-0 ps-0">
                    <i class="bi bi-stack ms-3"></i>&nbsp;
                    Cấp số
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link-dark rounded-0 ps-0">
                    <i class="bi bi-file-earmark-bar-graph ms-3"></i>&nbsp;
                    Báo cáo
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link link-dark rounded-0 px-0">
                    <i class="bi bi-gear ms-3"></i>&nbsp;
                    Cài đặt hệ thống &nbsp; &nbsp; &nbsp;
                    <i class="bi bi-three-dots-vertical"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="logout-button mx-auto mb-3">
        <form method="POST" action="{{ route('logout') }}" style="width:200px;">
            @csrf
            <x-dropdown-link class="text-custom-button" style="padding-left: 10px !important" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                <i class="bi bi-box-arrow-right"></i> &nbsp; {{ __('Đăng xuất') }}
            </x-dropdown-link>
        </form>
    </div>
</div>