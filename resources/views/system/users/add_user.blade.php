@extends('layouts.master')
@section('content')
{{-- <link rel="stylesheet" href="{{ asset("css/forgot-password.css") }}"> --}}
    <div class="col-10">

        <div class="row">
            <div class="col mt-3 ps-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold text-decoration-none link-dark">Cài đặt hệ
                                thống</a></li>
                        <li class="breadcrumb-item fw-bold" aria-current="page"><a href="{{ route('system.user') }}"
                                class="fw-bold text-decoration-none link-dark">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active-breadcumb fw-bold" aria-current="page"><a href="#"
                                class="fw-bold text-decoration-none active-breadcumb">Thêm tài khoản</a></li>

                    </ol>

                </nav>
            </div>
            <div class="col">
                @include('components.profile')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <p class="fw-bold text-primary ms-1 fs-4">Danh sách tài khoản</p>
            </div>
        </div>
        <div class="row">
            <form class="mt-3" method="post" action="{{ route('system.user.store') }}">
                @csrf
                <div class="card ms-3 ps-0 mb-3">
                    <div class="row text-primary fw-bold fs-5 mt-3 ms-3">Thông tin tài khoản</div>
                    <div class="card-body row pb-0">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ tên <span class="text-danger">*</span></label>
                                <input type="text" required placeholder="Nhập họ tên" class="form-control" id="name"
                                    name="name"
                                    title="Họ tên chỉ có ký tự và khoảng trắng, không có số và ký tự đặc biệt"
                                    pattern="^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại <span
                                        class="text-danger">*</span></label>
                                <input type="text" required placeholder="Nhập số điện thoại" class="form-control"
                                    id="phone" pattern="[0]{1}[0-9]{9}" title="Số điện thoại gồm 10 số" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" required placeholder="Nhập email" class="form-control" id="email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Vai trò <span class="text-danger">*</span></label>
                                <select name="role_id" class="form-select" required>
                                    <option value="" disabled selected>Chọn vai trò</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên đăng nhập<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Nhập tên đăng nhập" class="form-control" id="username"
                                    name="username" required>
                            </div>
                            <div class="mb-3 p-relative">
                                <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" placeholder="Nhập mật khẩu" class="form-control" id="password"
                                    name="password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}"
                                    title="Mật khẩu có tối thiểu 6 ký tự gồm 1 chữ Hoa, 1 số và ký tự thường" required>
                                <span class="p-absolute visible-password bi bi-eye-slash" id="togglePassword"></span>
                            </div>
                            <div class="mb-3 p-relative">
                                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu <span
                                        class="text-danger">*</span></label>
                                <input type="password" placeholder="Nhập họ tên" class="form-control"
                                    id="password_confirmation" name="password_confirmation" required>
                                <span class="p-absolute visible-password-confirm bi bi-eye-slash"
                                    id="togglePassword"></span>

                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Tình trạng <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="status">
                                    <option value="Hoạt động">Hoạt động</option>
                                    <option value="Ngưng hoạt động">Ngưng hoạt động</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-5"><span class="text-danger">*</span> Là trường thông tin bắt buộc</div>
                        </div>
                    </div>
                </div>
                <div class="row button-container m-auto text-center">
                    <a href="{{ route('system.user') }}" class="btn btn-outline-primary ms-auto me-2">Hủy</a>
                    <button class="btn btn-primary me-auto ms-2" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="">

        </div>
    </div>


    <script>
        document.title = 'Thêm tài khoản'

        const togglePassword = document.querySelectorAll('#togglePassword');
        const password = document.querySelector('#password');
        const password_confirmation = document.querySelector('#password_confirmation');
        const eyes = document.querySelectorAll('.bi');

        const getFieldPassword = (typeField) => {
            const type = typeField.getAttribute("type") === "password" ? "text" : "password";
            typeField.setAttribute("type", type);
        }

        const toggleEye = (cur, toChange, index) => {
            eyesClass = eyes[index].classList;
            if (eyesClass.contains(cur)) {
                eyesClass.remove(cur);
                eyesClass.add(toChange);
            } else {
                eyesClass.remove(toChange);
                eyesClass.add(cur);
            }
        }

        togglePassword.forEach(item => item.addEventListener('click', (e) => {
            if (e.target.classList.contains('visible-password')) {
                toggleEye('bi-eye', 'bi-eye-slash', 0)
                getFieldPassword(password)
            } else {
                toggleEye('bi-eye-slash', 'bi-eye', 1)
                getFieldPassword(password_confirmation)
            }
        }));


        function validatePassword() {
            if (password.value != password_confirmation.value) {
                password_confirmation.setCustomValidity("Chưa trùng khớp");
            } else {
                password_confirmation.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        password_confirmation.onkeyup = validatePassword;
    </script>
@endsection
