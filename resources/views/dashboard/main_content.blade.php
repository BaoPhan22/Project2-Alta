<div class="main-content col-6">
    <div class="row">
        <p class="text-primary fw-bold fs-5">Dashboard</p>
    </div>
    <div class="row">
        <p class="text-primary fw-bold fs-4">Biểu đồ cấp số</p>
    </div>
    <div class="row dashboard-row mb-3">
        <a href="{{ route('queuings.all') }}" class="col dashboard-card-container">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-5"><img src="{{ asset('image_layout/Frame 624758.svg') }}" alt="">
                        </div>
                        <div class="col-7 dashboard-card-title">Số thứ tự đã cấp</div>
                    </div>
                    <div class="row">
                        <div class="col-8 fw-bold fs-4">{{ $queuings[0]->total }}</div>
                        <div class="col-4"><span class="badge bg-danger">Danger</span></div>
                    </div>
                </div>
            </div>
        </a>
        <div class="col dashboard-card-container">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-5"><img src="{{ asset('image_layout/Frame 624759.svg') }}" alt="">
                        </div>
                        <div class="col-7 dashboard-card-title">Số thứ tự đã sử dụng</div>
                    </div>
                    <div class="row">
                        <div class="col-8 fw-bold fs-4">{{ $queuings[0]->used }}</div>
                        <div class="col-4"><span class="badge bg-danger">Danger</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col dashboard-card-container">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-5"><img src="{{ asset('image_layout/Frame 624759 (1).svg') }}" alt="">
                        </div>
                        <div class="col-7 dashboard-card-title">Số thứ tự đang chờ</div>
                    </div>
                    <div class="row">
                        <div class="col-8 fw-bold fs-4">{{ $queuings[0]->waiting }}</div>
                        <div class="col-4"><span class="badge bg-danger">Danger</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col dashboard-card-container">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-5"><img src="{{ asset('image_layout/Frame 624759 (2).svg') }}" alt="">
                        </div>
                        <div class="col-7 dashboard-card-title">Số thứ tự đã bỏ qua</div>
                    </div>
                    <div class="row">
                        <div class="col-8 fw-bold fs-4">{{ $queuings[0]->canceled }}</div>
                        <div class="col-4"><span class="badge bg-danger">Danger</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row dashboard-row">
        <div class="card dashboard-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <p>Bảng thống kê theo ngày</p>
                        <p>Tháng 11/2021</p>
                    </div>
                    <div class="col-3">
                        Xem thêm
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.title = 'Dashboard';
</script>
