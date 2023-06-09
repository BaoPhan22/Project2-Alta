@extends('layouts.master')
@section('content')


<div class="col-10">

    <div class="row">
        <div class="col mt-3 ps-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cấp số</a></li>
                    <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('queuings.all') }}" class="fw-bold text-decoration-none link-dark">Danh sách cấp số</a></li>
                    <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="#" class="fw-bold text-decoration-none active-breadcumb">Chi tiết</a></li>
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
        <div class="col-11">
            <div class="card">
                <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin cấp số</div>
                <div class="card-body row">
                    <div class="col">
                        <div class="row mb-3">
                            <strong class="col-4">Tên dịch vụ: </strong> <span class="col-8">
                                @foreach($services_cate as $item)
                                @if ($item->services_id == $queuings_detail->services_id)
                                {{ $item->name }}
                                @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Số thứ tự: </strong> <span class="col-8">
                                @foreach($services_cate as $item)
                                @if ($item->services_id == $queuings_detail->services_id)
                                @if ($item->rule == 1)
                                @php
                                echo $item->services_id_custom;
                                echo str_pad($queuings_detail->order,4,'0',STR_PAD_LEFT);
                                @endphp
                                @else
                                @php
                                echo str_pad($queuings_detail->order,4,'0',STR_PAD_LEFT);
                                echo $item->services_id_custom;
                                @endphp
                                @endif
                                @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Thời gian cấp: </strong> <span class="col-8">{{ $queuings_detail->start_date }}</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row mb-3">
                            <strong class="col-4">Nguồn cấp: </strong> <span class="col-8">
                                @foreach($equip_cate as $e_item)
                                @if($e_item->equipments_id == $queuings_detail->equipments_id)
                                @php
                                echo $e_item->name;
                                @endphp
                                @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Trạng thái: </strong>
                            <span class="col-8">
                            @if($queuings_detail->status == 'Đang chờ')
                            <i class="bi bi-circle-fill text-info"></i>
                            {{$queuings_detail->status}}
                            @elseif($queuings_detail->status == 'Đã sử dụng')
                            <i class="bi bi-circle-fill text-secondary"></i>
                            {{$queuings_detail->status}}
                            @else
                            <i class="bi bi-circle-fill text-danger"></i>
                            {{$queuings_detail->status}}
                            {{$queuings_detail->status}}
                            @endif
                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Hạn sử dụng: </strong> <span class="col-8">{{ $queuings_detail->end_date }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-1 pe-0 ps-3 fw-bold">
            <a href="{{ route('queuings.all') }}" class="btn customize-add-button"><i class="bi bi-arrow-left-circle-fill"></i><br> Quay lại</a>
        </div>
    </div>
</div>


<script>
    document.title = 'Chi tiết dịch vụ'
</script>

@endsection