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

        <div class="row">
            <div class="col ps-4">
                <div class="row">
                    <p class="keyword-form mb-0">Trạng thái hoạt động</p>
                </div>
                <div class="row">
                    <select name="role_id" class="form-select ms-2">
                        <option value="Tất cả"> Tất cả </option>
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
                    <select name="role_id" class="form-select ms-2">
                        <option value="Tất cả"> Tất cả </option>
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
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="search-button"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

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
