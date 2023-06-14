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
                    <div class="col-7">
                        <p class="fw-bold">Bảng thống kê theo Ngày</p>
                        <p style="font-size: 14px; color: #A9A9B0; font-weight: 400">Tháng 06/2023</p>
                    </div>
                    <div class="col-5 row">
                        <p class="col mb-0">Xem theo</p>
                        <ul class="nav nav-tabs col">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle pt-0" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false"
                                    ">Ngày</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Ngày</a></li>
                                    <li><a class="dropdown-item" href="#">Tuần</a></li>
                                    <li><a class="dropdown-item" href="#">Tháng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ $dataToChart }}" id="dataToChart">
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dataToChart = document.getElementById('dataToChart');
    let a = JSON.parse(dataToChart.value);
    // let a = dataToChart.value
    let labels = [];
    let data = [];

    for (var key in a) {
        labels.push(parseInt(key));
        var value = a[key];
        data.push(value);
    }
    // labels = labels.sort((a, b) => a - b);





    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Số phiếu theo ngày',
                data: data,
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
