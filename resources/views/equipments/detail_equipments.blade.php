@extends('layouts.master')
@section('content')


<div class="col-10">

    <div class="row">
        <div class="col mt-3 ps-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Thiết bị</a></li>
                    <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('equipments.all') }}" class="fw-bold text-decoration-none link-dark">Danh sách thiết bị</a></li>
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
            <p class="fw-bold text-primary ms-1 fs-4">Quản lý thiết bị</p>
        </div>
    </div>
    <div class="row">
        <div class="col-11">
            <div class="card">
                <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin thiết bị</div>
                <div class="card-body row">
                    <div class="col">
                        <div class="row mb-3">
                            <strong class="col-4">Mã thiết bị: </strong>
                            <span class="col-8">
                                {{ $equip->equipments_id_custom }}
                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Tên thiết bị: </strong> <span class="col-8">
                                {{ $equip->name }}

                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Địa chỉ IP: </strong> <span class="col-8">
                                {{ $equip->ip_address }}

                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row mb-3">
                            <strong class="col-4">Loại thiết bị: </strong> <span class="col-8">

                                @foreach($equip_cate as $item)
                                @if($item->equipments_categories_id == $equip->equipments_categories_id)
                                {{ $item->name }}
                                @endif
                                @endforeach

                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Tên đăng nhập: </strong>
                            <span class="col-8">
                                {{ $equip->username }}

                            </span>
                        </div>
                        <div class="row mb-3">
                            <strong class="col-4">Mật khẩu: </strong> <span class="col-8">
                                {{ $equip->password }}

                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <strong class="col-2">Dịch vụ sử dụng: </strong> <span class="col">

                            @foreach($servicesOfEquipments as $servicesOfEquipmentsItem)
                            @if($equip->equipments_id === $servicesOfEquipmentsItem->equipments_id )
                            @foreach($services_id as $services_id_item)
                            @if($services_id_item->services_id == $servicesOfEquipmentsItem->services_id)
                            <span class="servicesDisplay">{{ $services_id_item->name }},</span>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </span>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-1 pe-0 ps-3 fw-bold">
            <a href="{{ route('equipments.edit',$equip->equipments_id) }}" class="btn customize-add-button"><i class="bi bi-pen-fill"></i><br> Cập nhật thiết bị</a>
        </div>
    </div>
</div>


<script>
    document.title = 'Chi tiết dịch vụ'
</script>

@endsection