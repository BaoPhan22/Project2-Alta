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
        <a href="{{ route('queuings.all', 'used') }}" class="col dashboard-card-container">
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
        </a>
        <a href="{{ route('queuings.all', 'waiting') }}" class="col dashboard-card-container">
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
        </a>
        <a href="{{ route('queuings.all', 'canceled') }}" class="col dashboard-card-container">
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
        </a>
    </div>
    <div class="row dashboard-row">
        <div class="card dashboard-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <p>Bảng thống kê theo ngày</p>
                        <p>Tháng 06/2023</p>
                        <canvas id="myChart"></canvas>

                    </div>
                    <div class="col-3">
                        Xem thêm
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Số phiếu theo ngày',
                    data: [0, 10, 5, 2, 20, 30, 45],
                    borderColor: 'rgb(54, 162, 235)',
                    tension: 0.1,
                    pointRadius: 3,
                    fill: false
                }]
            },
            options: {}
    });
</script>
<script>
    document.title = 'Dashboard';
</script>
