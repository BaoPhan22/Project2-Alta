@extends('layouts.master')
@section('content')

    <div class="col-10">
        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cấp số</a>
                        </li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a
                                href="{{ route('queuings.all') }}"
                                class="fw-bold text-decoration-none active-breadcumb">Danh sách cấp số</a></li>

                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row my-3">
            <p class="fw-bold text-primary ms-1 fs-4">Quản lý cấp số</p>
        </div>

        <form method="GET" class="row col-11">
            <div class="col ps-4">
                <div class="row">
                    <p class="keyword-form mb-0 ps-1">Tên dịch vụ</p>
                </div>
                <div class="row">
                    <select name="services_name" class="form-select ms-1">
                        <option value=""> Tất cả </option>
                        @foreach ($services_to_filter as $item)
                        <option value="{{ $item->services_id }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col ps-4">
                <div class="row">
                    <p class="keyword-form mb-0 ps-2">Tình Trạng</p>
                </div>
                <div class="row">
                    <select name="status" class="form-select ms-2">
                        <option value=""> Tất cả </option>
                        <option value="Đang chờ"> Đang chờ </option>
                        <option value="Đã sử dụng"> Đã sử dụng </option>
                        <option value="Đã bỏ qua"> Đã bỏ qua </option>
                    </select>
                </div>
            </div>
            <div class="col ps-4">
                <div class="row">
                    <p class="keyword-form mb-0 ps-2">Nguồn cấp</p>
                </div>
                <div class="row">
                    <select name="from_equipments" class="form-select ms-2">
                        <option value=""> Tất cả </option>
                        @foreach ($equip_to_filter as $item)
                        <option value="{{ $item->equipments_id }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row col-4 ms-2 me-0 px-0">
                <div class="row">
                    <p class="keyword-form mb-0">Chọn thời gian</p>
                </div>
                <div class="row px-0 mx-0">
                    <div class="col-6 pe-2">
                        <input type="date" name="sd" id="sd" class="form-control w-100">
                    </div>
                    <div class="col-6 ps-2">
                        <input type="date" name="ed" id="ed" class="form-control w-100">
                    </div>
                </div>
            </div>
            <div class="col px-0">
                <div class="row">
                    <p class="keyword-form mb-0">Từ khóa</p>
                </div>
                <div class="row">
                    <div class="d-flex pe-0" style='position: relative'>
                        @include('components.searchbar')
                    </div>
                </div>
            </div>
        </form>

        <div class="row my-3">
            <div class="col-11">
                <table class="table table-striped table-bordered custom-table ms-2">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên dịch vụ</th>
                            <th>Thời gian cấp</th>
                            <th>Hạn sử dụng</th>
                            <th>Trạng thái</th>
                            <th>Nguồn cấp</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($queuings) > 0)
                            @foreach ($queuings as $item)
                                <tr>
                                    <td>
                                        @if ($item->rule == 1)
                                            @php
                                                echo $item->services_id_custom;
                                                echo str_pad($item->order, 4, '0', STR_PAD_LEFT);
                                            @endphp
                                        @else
                                            @php
                                                echo str_pad($item->order, 4, '0', STR_PAD_LEFT);
                                                echo $item->services_id_custom;
                                            @endphp
                                        @endif
                                    </td>
                                    <td>{{ $item->sn }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>
                                        @if ($item->status == 'Đang chờ')
                                            <i class="bi bi-circle-fill text-info"></i>
                                            {{ $item->status }}
                                        @elseif($item->status == 'Đã sử dụng')
                                            <i class="bi bi-circle-fill text-secondary"></i>
                                            {{ $item->status }}
                                        @else
                                            <i class="bi bi-circle-fill text-danger"></i>
                                            {{ $item->status }}
                                        @endif
                                    </td>
                                    <td>{{ $item->en }}</td>
                                    <td><a href="{{ route('queuings.detail', $item->queuing_id) }}">Chi tiết</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Bảng rỗng</td>
                            </tr>
                        @endif
                    </tbody>

                </table>
                <div class="row" id="paginator">{{ $queuings->links() }}</div>
            </div>
            <div class="col-1 pe-0 ps-3 fw-bold"><a href="{{ route('queuings.add') }}" class="btn customize-add-button"><i
                        class="bi bi-plus-square-fill"></i><br> Cấp số mới</a></div>
        </div>
    </div>

    <script>
        document.title = 'Danh sách cấp số'
    </script>

@endsection
