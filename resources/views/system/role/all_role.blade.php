@extends('layouts.master')
@section('content')


    <div class="col-10">

        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cài đặt hệ thống</a></li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page">Quản lý vai trò</li>
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
                <div class="row col-11 mx-0 w-100 pe-2">
                    <form class="d-flex ps-1 pe-0" style='position: relative' method="GET">
                        @include('components.searchbar')
                    </form>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-11">
                <table class="table table-striped table-bordered custom-table ms-2">
                    <thead>
                        <tr>
                            <th>Tên vai trò</th>
                            <th>Số người dùng</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->description }}</td>
                            <td><a href="{{ route('system.role.edit',$item->role_id) }}">Cập nhật</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-1 pe-0 ps-3 fw-bold"><a href="{{ route('system.role.add') }}" class="btn customize-add-button"><i class="bi bi-plus-square-fill"></i><br> Thêm vai trò</a></div>
        </div>
    </div>

<script>document.title='Quản lý vai trò'</script>
@endsection