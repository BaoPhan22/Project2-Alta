@extends('layouts.master')
@section('content')


    <div class="col-10">
        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Dịch vụ</a></li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="{{ route('services.all') }}" class="fw-bold text-decoration-none active-breadcumb">Danh sách dịch vụ</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row my-3">
            <p class="fw-bold text-primary ms-1 fs-4">Quản lý dịch vụ</p>
        </div>

        <form method="GET" class="row col-11">
            <div class="col-4 ps-4">
                <div class="row">
                    <p class="keyword-form mb-0 ps-1">Trạng thái hoạt động</p>
                </div>
                <div class="row ps-1">
                    @include('components.selectActive')
                </div>
            </div>
            <div class="col-5"></div>
            <div class="col-3 px-5 pe-0">
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
                            <th>Mã dịch vụ</th>
                            <th>Tên dịch vụ</th>
                            <th>Mô tả</th>
                            <th>Trạng thái hoạt động</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($services) > 0)
                        @foreach($services as $item)
                        <tr>
                            <td>{{ $item->services_id_custom }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->status }}</td>
                            <td><a href="{{ route('services.detail',$item->services_id) }}">Chi tiết</a></td>
                            <td><a href="{{ route('services.edit',$item->services_id) }}">Cập nhật</a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">Bảng rỗng</td>
                        </tr>
                        @endif
                    </tbody>

                </table>
            </div>
            <div class="col-1 pe-0 ps-3 fw-bold"><a href="{{ route('services.add') }}" class="btn customize-add-button"><i class="bi bi-plus-square-fill"></i><br> Thêm dịch vụ</a></div>
        </div>
    </div>
<script>
    document.title = 'Quản lý dịch vụ'
</script>


@endsection