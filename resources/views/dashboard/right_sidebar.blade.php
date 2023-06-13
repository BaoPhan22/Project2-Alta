<div class="right-side-bar col-4 px-4" id="right-sidebar">
    @include('.components.profile')
    <div class="row">
        <p class="fw-bold" style="color: #ff7506; font-size: 24px; line-height: 36px;">Tổng quan</p>
    </div>
    <div class="row card mb-3 dashboard-card">
        <div class="card-body row">
            <div class="col-3 percentage-format">{{ ($equipments[0]->active / $equipments[0]->total) * 100 }}</div>
            <div class="col-3 fw-bold fs-4">{{ $equipments[0]->total }} <br><span class="device-color"><img
                        src="{{ asset('image_layout/monitor.svg') }}" alt="">
                    <span>Thiết bị</span>
                </span>
            </div>
            <div class="col">
                <ul>
                    <li class="dashboard-state row">
                        <span class="col-8 dashboard-state">Đang hoạt động</span>
                        <span class="dashboard-number device-color col-4">{{ $equipments[0]->active }}</span>
                    </li>
                    <li class="dashboard-state row">
                        <span class="col-8 dashboard-state">Ngưng hoạt động</span>
                        <span
                            class="dashboard-number device-color col-4">{{ $equipments[0]->total - $equipments[0]->active }}</span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="row card mb-3 dashboard-card">
        <div class="card-body row">
            <div class="col-3 percentage-format">{{ ($services[0]->active / $services[0]->total) * 100 }}</div>
            <div class="col-3 fw-bold fs-4"> {{ $services[0]->total }} <br><span class="service-color"><img
                        src="{{ asset('image_layout/Frame 332.svg') }}" alt="">
                    <span>Dịch vụ</span>
                </span>
            </div>
            <div class="col">
                <ul>
                    <li class="dashboard-state row">
                        <span class="col-8 dashboard-state">Đang hoạt động</span>
                        <span class="dashboard-number service-color col-4">{{ $services[0]->active }}</span>
                    </li>
                    <li class="dashboard-state row">
                        <span class="col-8 dashboard-state">Ngưng hoạt động</span>
                        <span
                            class="dashboard-number service-color col-4">{{ $services[0]->total - $services[0]->active }}</span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="row card mb-3 dashboard-card">
        <div class="card-body row">
            <div class="col-3 percentage-format">{{ ($queuings[0]->waiting / $queuings[0]->total) * 100 }}</div>
            <div class="col-3 fw-bold fs-4"> {{ $queuings[0]->total }} <br><span class="queuing-color"><img
                        src="{{ asset('image_layout/fi_layers.svg') }}" alt="">
                    <span>Cấp số</span>
                </span>
            </div>
            <div class="col">
                <ul>
                    <li class="dashboard-state row">
                        <span class="col-8 dashboard-state">Đã sử dụng</span>
                        <span class="dashboard-number queuing-color col-4">{{ $queuings[0]->used }}</span>
                    </li>
                    <li class="dashboard-state row">
                        <span class="col-8 dashboard-state">Đang chờ</span>
                        <span class="dashboard-number queuing-color col-4">{{ $queuings[0]->waiting }}</span>
                    </li>
                    <li class="dashboard-state row">
                        <span class="col-8 dashboard-state">Bỏ qua</span>
                        <span class="dashboard-number queuing-color col-4">{{ $queuings[0]->canceled }}</span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/percentage-format.js') }}"></script>