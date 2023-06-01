@extends('layouts.master')
@section('content')


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
            <form class="mt-3" method="post" action="#">
                @csrf
                <div class="card ms-3 ps-0 mb-3">
                    <div class="card-body row pb-5">
                        <div class="row button-container m-auto text-center">
                            <div class="mb-3">
                                <label for="equipments_categories_id " class="form-label fw-bold text-primary ms-1 fs-3">Cấp số mới</label>
                                <p class="fw-bold ms-1 fs-5">Dịch vụ khách hàng lựa chọn</p>

                                <select onchange="handleChange(this.options[this.selectedIndex].value)" class="form-select w-50 m-auto mb-5" name="equipments_categories_id" id='equipments_categories_id'>
                                    <option value="0" disabled selected>Chọn dịch vụ</option>
                                    @foreach($services_cate as $item)
                                    <option value="{{ $item->services_id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('queuings.all') }}" class="btn btn-outline-primary ms-auto me-2">Hủy bỏ</a>
                            <button class="btn btn-primary me-auto ms-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">In số</button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header pb-0" style="border: none;">
                                            <button type="button" style="width:20px" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body pb-0" style="border: none;">
                                            <div class="row">
                                                <p class="fw-bold fs-3">Số thứ tự được cấp</p>
                                            </div>
                                            <div class="row">
                                                <p class="order">123456</p>
                                            </div>
                                            <div class="row">
                                                <p class="service-chosen" id='service-chosen'>DV: khám răng</p>
                                            </div>
                                            <div class="row background-primary" style="margin: 0 -18px !important">
                                                <div class="row ms-0 fw-bold mt-3 time-stamp">
                                                    <p>Thời gian cấp</p>
                                                </div>
                                                <div class="row ms-0 fw-bold time-stamp">
                                                    <p>Hạn sử dụng</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


<script>
    document.title = 'Cấp số mới'
    const obj = {};

    let selectElement = document.querySelectorAll('[name=equipments_categories_id]');

    let optionValues = [...selectElement[0].options].map(o => o.value)
    let optionNames = [...selectElement[0].options].map(o => o.text)

    optionValues.forEach((element, index) => {
        obj[element] = optionNames[index];
    });

    console.log(obj);

    function handleChange(chosen) {
        document.querySelector('#service-chosen').innerHTML = obj[chosen]
    }
</script>

@endsection