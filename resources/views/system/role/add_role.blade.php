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
                        <li class="breadcrumb-item fw-bold" aria-current="page">Quản lý vai trò</li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page">Thêm vai trò</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row my-3">
            <div class="col-8">
                <p class="fw-bold text-primary ms-1 fs-4">Danh sách vai trò</p>
            </div>
            <div class="col-3 pe-0">
                <div class="row">
                    <p class="keyword-form mb-0">Từ khóa</p>
                </div>
                <div class="row">
                    <form class="d-flex" style='position: relative'>
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="search-button"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="card ms-3">
                <div class="card-body">
                    <div class="row">Thông tin vai trò</div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="">

            </div>
        </div>
    </div>
</div>


@endsection