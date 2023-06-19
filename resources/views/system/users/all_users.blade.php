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
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page">Quản lý tài khoản</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row my-3">
            <p class="fw-bold text-primary ms-1 fs-4">Danh sách tài khoản</p>
        </div>
        <form class="row mb-3 col-11" method="GET">
            <div class="col ps-3">
                <div class="row">
                    <p class="keyword-form mb-0">Trạng thái</p>
                </div>
                <div class="row ps-1">
                    @include('components.selectActive')
                </div>
            </div>
            <div class="col"></div>
            <div class="col pe-0">
                <div class="row">
                    <p class="keyword-form mb-0">Từ khóa</p>
                </div>
                <div class="row">
                    <div class="d-flex pe-0" style='position: relative' method="GET">
                        @include('components.searchbar')
                    </div>
                </div>
            </div>
        </form>
        <div class="col-1"></div>
        <div class="row">
            <div class="col-11">
                <table class="table table-striped table-bordered custom-table ms-2">
                    <thead>
                        <tr>
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Trạng thái hoạt động</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->un }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->rn }}</td>
                                <td>{{ $item->status }}</td>
                                <td><a href="{{ route('system.user.edit', $item->id) }}">Cập nhật</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row" id="paginator">{{ $users->links() }}</div>
            </div>
            <div class="col-1 pe-0 ps-3 fw-bold"><a href="{{ route('system.user.add') }}"
                    class="btn customize-add-button"><i class="bi bi-plus-square-fill"></i><br> Thêm tài khoản</a></div>
        </div>
    </div>

    <script>
        document.title = 'Quản lý tài khoản'
    </script>
@endsection
