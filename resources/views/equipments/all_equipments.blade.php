@extends('layouts.master')
@section('content')

<div class="col-10">
    <div class="row">
        <div class="col mt-3 ps-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Thiết bị</a></li>
                    <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="{{ route('equipments.all') }}" class="fw-bold text-decoration-none active-breadcumb">Danh sách thiết bị</a></li>
                </ol>
            </nav>
        </div>
        <div class="col">
            @include('components.profile')
        </div>
    </div>
    <div class="row my-3">
        <p class="fw-bold text-primary ms-1 fs-4">Danh sách thiết bị</p>
    </div>

    <div class="row">
        <div class="col ps-4">
            <div class="row">
                <p class="keyword-form mb-0">Trạng thái hoạt động</p>
            </div>
            <div class="row">
                <select name="isActive" id="isActive" class="form-select ms-2">
                    <option value=""> Tất cả </option>
                    <option value="Hoạt động"> Hoạt động </option>
                    <option value="Ngưng hoạt động"> Ngưng hoạt động </option>
                </select>
            </div>
        </div>
        <div class="col pe-5 ms-3">
            <div class="row">
                <p class="keyword-form mb-0">Trạng thái kết nối</p>
            </div>
            <div class="row">
                <select name="isConnect" id="isConnect" class="form-select ms-2">
                    <option value=""> Tất cả </option>
                    <option value="Kết nối"> Kết nối </option>
                    <option value="Mất kết nối"> Mất kết nối </option>
                </select>
            </div>
        </div>
        <div class="col px-5">
            <div class="row">
                <p class="keyword-form mb-0">Từ khóa</p>
            </div>
            <div class="row">
                <form class="d-flex" style='position: relative'>
                    <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search">
                    <button class="search-button"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-11">
            <table class="table table-striped table-bordered custom-table ms-2" id="table-main">
                <thead>
                    <tr>
                        <th>Mã thiết bị</th>
                        <th>Tên thiết bị</th>
                        <th>Địa chỉ IP</th>
                        <th>Trạng thái hoạt động</th>
                        <th>Trạng thái kết nối</th>
                        <th>Dịch vụ sử dụng</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($equipments) > 0)
                    @foreach($equipments as $item)
                    <tr>
                        <td>{{ $item->equipments_id_custom }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->ip_address }}</td>
                        <td id="activeColumn">{{ $item->is_active }}</td>
                        <td id="connectColumn">{{ $item->is_connect }}</td>
                        <td class="displayServicesContainer">
                            @foreach($servicesOfEquipments as $servicesOfEquipmentsItem)
                            @if($item->equipments_id === $servicesOfEquipmentsItem->equipments_id )
                            @foreach($services_id as $services_id_item)
                            @if($services_id_item->services_id == $servicesOfEquipmentsItem->services_id)
                            <span class="servicesDisplay">{{ $services_id_item->name }}</span>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </td>
                        <td>Chi tiết</td>
                        <td><a href="{{ route('equipments.edit',$item->equipments_id) }}">Cập nhật</a></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">Bảng rỗng</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-1 pe-0 ps-3 fw-bold"><a href="{{ route('equipments.add') }}" class="btn customize-add-button"><i class="bi bi-plus-square-fill"></i><br> Thêm thiết bị</a></div>
    </div>
</div>

<script>
    document.title = 'Tất cả thiết bị'

    const isConnect = document.querySelector('#isConnect');
    const isActive = document.querySelector('#isActive');
    const table_main = document.querySelector('#table-main');
    const activeColumn = document.querySelectorAll('#activeColumn');
    const connectColumn = document.querySelectorAll('#connectColumn');
    let tableRows = document.querySelectorAll('tbody tr')
    let searchInput = document.querySelector('#search');


    let myArray = [];
    const displayServicesContainer = document.querySelectorAll('.displayServicesContainer');
    const servicesDisplay = document.querySelectorAll('.servicesDisplay');
    displayServicesContainer.forEach(item => myArray.push(Array.from(item.childNodes)));

    console.log(myArray);
</script>


@endsection