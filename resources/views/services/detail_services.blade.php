@extends('layouts.master')
@section('content')


<div class="col-10">

    <div class="row">
        <div class="col mt-3 ps-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Dịch vụ</a></li>
                    <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('services.all') }}" class="fw-bold text-decoration-none link-dark">Danh sách dịch vụ</a></li>
                    <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="{{ route('services.add') }}" class="fw-bold text-decoration-none active-breadcumb">Chi tiết</a></li>
                </ol>
            </nav>
        </div>
        <div class="col">
            @include('components.profile')
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <p class="fw-bold text-primary ms-1 fs-4">Quản lý dịch vụ</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin dịch vụ</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <strong class="col-4">Mã dịch vụ: </strong> <span class="col-8">{{ $services_id->services_id_custom }}</span>
                    </div>
                    <div class="row mb-3">
                        <strong class="col-4">Tên dịch vụ: </strong> <span class="col-8">{{ $services_id->name }}</span>
                    </div>
                    <div class="row">
                        <strong class="col-4">Mô tả: </strong> <span class="col-8">{{ $services_id->description }}</span>
                    </div>
                </div>

                <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Quy tắc cấp số</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <span>
                            <strong>Tăng tự động:</strong>
                            <input type="text" value="0001" style="width: 70px;" class="mx-2 p-2 rounded-3 text-center">
                            <strong>đến:</strong>
                            <input type="text" value="9999" style="width: 70px;" class="mx-2 p-2 rounded-3 text-center"></span>
                    </div>
                    <div class="row mb-3">
                        <span>
                            <strong>Prefix:</strong>
                            <input type="text" value="0001" style="width: 70px; margin-left: 70px" class="p-2 rounded-3 text-center">
                        </span>
                    </div>
                    <div class="row">
                        <strong>Reset mỗi ngày </strong> <span class="col-8">Ví dụ: 201-2001</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7"></div>
        <div class="col-1 pe-0 ps-3 fw-bold">
            <a href="{{ route('services.add') }}" class="btn customize-add-button mb-1"><i class="bi bi-plus-square-fill"></i><br> Cập nhật danh sách</a>

            <a href="{{ route('services.all') }}" class="btn customize-add-button"><i class="bi bi-plus-square-fill"></i><br> Quay lại</a>
        </div>
    </div>
</div>


<script>
    document.title = 'Chi tiết dịch vụ'
</script>

@endsection