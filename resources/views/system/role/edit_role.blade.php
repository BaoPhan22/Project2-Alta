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
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page">Cập nhật vai trò</li>
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
            <form class="mt-3" method="post" action="{{ route('system.role.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $role_id->role_id }}">
                <div class="card ms-3 ps-0 mb-3">
                    <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin vai trò</div>
                    <div class="card-body row pb-0">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên vai trò: <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập tên vai trò" class="form-control" id="name" name="name" value="{{ $role_id->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả:</label>
                                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Nhập mô tả">{{ $role_id->description }}</textarea>
                            </div>
                            <div class="mb-3"><span class="text-danger">*</span> Là trường thông tin bắt buộc</div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="description" class="form-label">Phân quyền chức năng <span class="text-danger">*</span></label>
                                <div class="rounded-2">
                                    <div class="row ps-4 checkbox-container pt-3">
                                        <div class="row text-primary fw-bold fs-5">Nhóm chức năng A</div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Tất cả
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Chức năng X
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Chức năng Y
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Chức năng Z
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row ps-4 checkbox-container py-3">
                                        <div class="row text-primary fw-bold fs-5">Nhóm chức năng B</div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Tất cả
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Chức năng X
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Chức năng Y
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Chức năng Z
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row button-container m-auto text-center">
                <a href="{{ route('system.role') }}" class="btn btn-outline-primary ms-auto me-2">Hủy</a>
                    <button class="btn btn-primary me-auto ms-2" type="submit">Cập nhật</button>
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