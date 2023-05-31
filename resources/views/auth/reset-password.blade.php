@extends('layouts.auth-master')
@section('auth-content')
<div class="row">
    <div class="col-left">
        <div id="logo-container" class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('image_layout/Logo alta.svg') }}" alt="Alta Logo">
        </div>
        <div class="text-center" style="font-weight: 700; font-size: 22px; margin-bottom: 16px">Đặt lại mật khẩu mới</div>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div style="display: none;">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="input-fields m-auto">
                <!-- Password -->
                <div class="mb-3 m-auto p-relative">

                    <label for="password" class="form-label ">Mật khẩu *</label>
                    <input type="password" class="form-control inputs" id="password" name="password" required>
                    <span class="p-absolute visible-password bi bi-eye-slash" id="togglePassword"></span>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3 m-auto p-relative">
                    <label for="password_confirmation" class="form-label ">Nhập lại mật khẩu *</label>
                    <input type="password" class="form-control inputs" id="password_confirmation" name="password_confirmation" required>
                    <span class="p-absolute visible-password-confirm bi bi-eye-slash" id="togglePassword"></span>
                </div>
            </div>

            <div id="button-pri" class="mt-3 m-auto">
                <button type="submit" id="button-pri">Xác nhận</button>
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
    document.title = 'Tạo lại mật khẩu'
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
</script>
@endsection