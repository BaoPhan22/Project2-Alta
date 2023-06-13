@extends('layouts.master')
@section('content')

    <div class="col-10">
        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Báo
                                cáo</a></li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="#"
                                class="fw-bold text-decoration-none active-breadcumb">Lập báo cáo</a></li>

                    </ol>
                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>


        <div class="row">
            <p class="row ms-1">Chọn thời gian</p>
            <div class="row ps-3">
                <div class="col-3">
                    <input type="date" name="sd" id="sd" class="form-control col" value="{{ $sdate }}">
                </div>
                <div class="col-3">
                    <input type="date" name="ed" id="ed" class="form-control col" value="{{ $edate }}">
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
                            <th>Trạng thái</th>
                            <th>Nguồn cấp</th>
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

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Bảng rỗng</td>
                            </tr>
                        @endif
                    </tbody>

                </table>
                @if ($paginate == true)
                    <div class="row" id="paginator"> {{ $queuings->links() }} </div>
                @endif
            </div>
            <div class="col-1 pe-0 ps-3 fw-bold"><a href="{{ route('export') }}" class="btn customize-add-button"><i
                        class="bi bi-file-earmark-arrow-down-fill"></i><br>Tải về</a></div>
        </div>
    </div>

    <script>
        document.title = 'Danh sách cấp số';
    </script>
    <script src="{{asset('js/changeDate.js')}}"></script>
@endsection
