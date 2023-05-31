@extends('layouts.auth-master')
@section('auth-content')

<div class="row">
    <div class="col-left">
        <div id="logo-container" class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('image_layout/Logo alta.svg') }}" alt="Alta Logo">
        </div>
        <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-fields m-auto">

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập *</label>
                <input type="text" class="form-control inputs" id="username" name="username" required>                
            </div>


            <!-- Password -->
            <div class="mb-3 m-auto p-relative">
                <label for="password" class="form-label ">Mật khẩu *</label>
                <input type="password" class="form-control inputs" id="password" name="password" required>
                <span class="p-absolute visible-password bi bi-eye-slash" id="togglePassword"></span>

            </div>

            <a href="{{ route('password.request') }}" class="text-danger text-decoration-none">Quên mật khẩu?</a> <br>
        </div>

        <div id="button-pri" class="mt-3 m-auto">
            <button type="submit" id="button-pri">Đăng nhập</button>
        </div>
        </form>
    </div>
    <div class="col-right p-relative">
        <div class="image-svg">
            <img src="{{ asset('image_layout/Group 341.svg') }}" alt="">
        </div>
        <p id="system" class="p-absolute">Hệ thống</p>
        <p id="manage-queue" class="p-absolute">Quản lý xếp hàng</p>
    </div>
</div>
</div>

<script>

    document.title = 'Đăng nhập'
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');


    togglePassword.addEventListener("click", function() {

        const eyeClass = document.querySelector('.bi').classList;

        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        if (eyeClass.contains('bi-eye')) {
            eyeClass.remove('bi-eye');
            eyeClass.add('bi-eye-slash');
        } else {
            eyeClass.remove('bi-eye-slash');
            eyeClass.add('bi-eye');
        }

    });
</script>
@endsection