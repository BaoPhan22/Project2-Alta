@extends('layouts.master')
@section('content')


<div class="col-10">

    <div class="row">
        <div class="col mt-3 ps-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Dịch vụ</a></li>
                    <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('services.all') }}" class="fw-bold text-decoration-none link-dark">Danh sách dịch vụ</a></li>
                    <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="{{ route('services.add') }}" class="fw-bold text-decoration-none active-breadcumb">Thêm dịch vụ</a></li>

                </ol>
            </nav>
        </div>
        <div class="col">
            @include('components.profile')
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <p class="fw-bold text-primary ms-1 fs-4">Quản lý dịch vụ</p>
        </div>
    </div>
    <div class="row">
        <form class="mt-3" method="post" action="{{ route('services.store') }}">
            @csrf
            <div class="card ms-3 ps-0 mb-3">
                <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin dịch vụ</div>
                <div class="card-body row pb-0">
                    <div class="col">
                        <div class="mb-4">
                            <label for="services_id_custom" class="form-label">Mã dịch vụ <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Nhập mã dịch vụ" class="form-control" id="services_id_custom" name="services_id_custom" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên dịch vụ <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Nhập tên dịch vụ" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả:</label>
                            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Mô tả dịch vụ"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row ps-4 py-3">
                            <div class="row text-primary fw-bold fs-5">Quy tắc cấp số</div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input my-auto me-2" type="checkbox" value="" id="autoIncreasing">
                                <label class="form-check-label" for="autoIncreasing">
                                    Tăng tự động từ:
                                    <input type="text" value="0001" style="width: 70px;" class="mx-2 p-2 rounded-3 text-center">
                                    đến:
                                    <input type="text" value="9999" style="width: 70px;" class="mx-2 p-2 rounded-3 text-center">
                                </label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input my-auto me-2" type="checkbox" value="" id="prefix" onclick="onlyOne(this)" name="rule">
                                <label class="form-check-label" for="prefix">
                                    Prefix:
                                </label><input type="text" value="0001" style="width: 70px; margin-left: 96px" class="p-2 rounded-3 text-center">
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input  my-auto me-2" type="checkbox" value="" id="surfix" onclick="onlyOne(this)" name="rule">
                                <label class="form-check-label" for="surfix">
                                    Surfix:
                                </label><input type="text" value="0001" style="width: 70px; margin-left: 95.025px" class="p-2 rounded-3 text-center">
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input my-auto me-2" type="checkbox" value="" id="resetByDay">
                                <label class="form-check-label" for="resetByDay">
                                    Reset mỗi ngày
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-2"><span class="text-danger">*</span> Là trường thông tin bắt buộc</div>
                    </div>
                </div>
            </div>
            <div class="row button-container m-auto text-center">
                <a href="{{ route('services.all') }}" class="btn btn-outline-primary ms-auto me-2">Hủy</a>
                <button class="btn btn-primary me-auto ms-2" type="submit">Thêm dịch vụ</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.title = 'Thêm dịch vụ'

    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('rule')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>

@endsection