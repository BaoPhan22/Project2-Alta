@extends('layouts.master')
@section('content')
    <div class="col-10">

        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cài đặt hệ
                                thống</a></li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page">Nhật ký hoạt động</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <form class="row my-3 col-11" method="GET">
            <div class="col-8">
                <p class="row ms-1 keyword-form mb-0">Chọn thời gian</p>
                <div class="row ps-1">
                    <div class="col-3">
                        <input type="date" name="sd" id="sd" class="form-control col">
                    </div>
                    <div class="col-3">
                        <input type="date" name="ed" id="ed" class="form-control col">
                    </div>
                </div>
            </div>
            <div class="col-4 pe-0">
                <div class="row">
                    <p class="keyword-form mb-0">Từ khóa</p>
                </div>
                <div class="row">
                    <div class="d-flex pe-0" style='position: relative'>
                        <input class="form-control me-0" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="search-button"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-11">
                <table class="table table-striped table-bordered custom-table ms-2">
                    <thead>
                        <tr>
                            <th>Tên đăng nhập</th>
                            <th>Thời gian tác động</th>
                            <th>IP thực hiện</th>
                            <th>Thao tác thực hiện</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diary as $item)
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->ip_address }}</td>
                                <td>{{ $item->action }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-1 pe-0 ps-3 fw-bold"></div>
        </div>
    </div>

    <script>
        document.title = 'Nhật ký hoạt động'
    </script>
    {{-- <script src="{{ asset('js/changeDate.js') }}"></script> --}}
@endsection
