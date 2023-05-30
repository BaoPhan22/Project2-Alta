@extends('layouts.master')
@section('content')

<div class="row">
    @include('dashboard.left_sidebar')
    <div class="col-10">

        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cài đặt hệ thống</a></li>
                        <li class="breadcrumb-item fw-bold" aria-current="page">Quản lý tài khoản</li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page">Thêm tài khoản</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <p class="fw-bold text-primary ms-1 fs-4">Danh sách tài khoản</p>
            </div>
        </div>
        <div class="row">
            <form class="mt-3" method="post" action="{{ route('system.user.store') }}">
                @csrf
                <div class="card ms-3 ps-0 mb-3">
                    <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin tài khoản</div>
                    <div class="card-body row pb-0">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập họ tên" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập số điện thoại" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Vai trò <span class="text-danger">*</span></label>
                                <select name="role_id" class="form-select">
                                    <option value="" disabled selected>Chọn vai trò</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->role_id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên đăng nhập <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập tên đăng nhập" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" placeholder="Nhập mật khẩu" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" placeholder="Nhập họ tên" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Tình trạng <span class="text-danger">*</span></label>
                                <select class="form-select" name="status">
                                    <option value="Hoạt động">Hoạt động</option>
                                    <option value="Ngưng hoạt động">Ngưng hoạt động</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-5"><span class="text-danger">*</span> Là trường thông tin bắt buộc</div>
                        </div>
                    </div>
                </div>
                <div class="row button-container m-auto text-center">
                    <a href="{{ route('system.user') }}" class="btn btn-outline-primary ms-auto me-2">Hủy</a>
                    <button class="btn btn-primary me-auto ms-2" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="">

        </div>
    </div>
</div>
</div>


@endsection