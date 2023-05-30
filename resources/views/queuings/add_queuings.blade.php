@extends('layouts.master')
@section('content')

<div class="row">
    @include('dashboard.left_sidebar')
    <div class="col-10">

        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cấp số</a></li>

                        <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('queuings.all') }}" class="fw-bold text-decoration-none link-dark">Danh sách cấp số</a></li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="{{ route('queuings.add') }}" class="fw-bold text-decoration-none active-breadcumb">Cấp số mới</a></li>
                        
                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <p class="fw-bold text-primary ms-1 fs-4">Quản lý cấp số</p>
            </div>
        </div>
        <div class="row">
            <form class="mt-3" method="post" action="{{ route('system.user.store') }}">
                @csrf
                <div class="card ms-3 ps-0 mb-3">
                    <div class="card-body row pb-5">
                        <div class="row button-container m-auto text-center">
                            <div class="mb-3">
                                <label for="equipments_categories_id " class="form-label fw-bold text-primary ms-1 fs-3">Cấp số mới</label>
                                <p class="fw-bold ms-1 fs-5">Dịch vụ khách hàng lựa chọn</p>

                                <select class="form-select w-50 m-auto mb-5" name="equipments_categories_id ">
                                    <option value="0" disabled checked>Chọn dịch vụ</option>
                                    @foreach($services_cate as $item)
                                    <option value="{{ $item->services_cate_id }}">{{ $services_cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('queuings.all') }}" class="btn btn-outline-primary ms-auto me-2">Hủy bỏ</a>
                            <button class="btn btn-primary me-auto ms-2" type="submit">In số</button>
                        </div>
                    </div>
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