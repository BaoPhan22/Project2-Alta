@extends('layouts.master')
@section('content')

<div class="row">
    @include('dashboard.left_sidebar')
    <div class="col-10">

        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><p class="fw-bold text-decoration-none link-dark">Thiết bị</p></li>
                        <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('equipments.all') }}" class="fw-bold text-decoration-none link-dark">Danh sách thiết bị</a></li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="{{ route('equipments.add') }}" class="fw-bold text-decoration-none active-breadcumb">Thêm thiết bị</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <p class="fw-bold text-primary ms-1 fs-4">Quản lý thiết bị</p>
            </div>
        </div>
        <div class="row">
            <form class="mt-3" method="post" action="{{ route('system.user.store') }}">
                @csrf
                <div class="card ms-3 ps-0 mb-3">
                    <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin thiết bị</div>
                    <div class="card-body row pb-0">
                        <div class="col">
                            <div class="mb-3">
                                <label for="equipments_id_custom" class="form-label">Mã thiết bị <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập mã thiết bị" class="form-control" id="equipments_id_custom" name="equipments_id_custom">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên thiết bị <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập tên thiết bị" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="ip_address" class="form-label">Địa chỉ IP <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập địa chỉ IP" class="form-control" id="ip_address" name="ip_address">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="equipments_categories_id " class="form-label">Loại thiết bị <span class="text-danger">*</span></label>
                                <select class="form-select" name="equipments_categories_id ">
                                    @foreach($equipments_cate as $item)
                                    <option value="{{ $item->equipments_categories_id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên đăng nhập <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập tên đăng nhập" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập mật khẩu" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="services" class="form-label">Dịch vụ sử dụng <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập dịch vụ sử dụng" class="form-control w-100" id="services" name="services">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-5"><span class="text-danger">*</span> Là trường thông tin bắt buộc</div>
                        </div>
                    </div>
                </div>
                <div class="row button-container m-auto text-center">
                    <a href="{{ route('equipments.all') }}" class="btn btn-outline-primary ms-auto me-2">Hủy</a>
                    <button class="btn btn-primary me-auto ms-2" type="submit">Thêm thiết bị</button>
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