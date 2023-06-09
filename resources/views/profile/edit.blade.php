@extends('layouts.master')
@section('content')
<div class="col">
    <div class="row">
        <div class="col-8 text-primary fw-bold mt-3 ps-3">Thông tin cá nhân</div>
        <div class="col-4">@include('.components.profile')</div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <form action="" class="row">
                <div class="col text-center my-auto">
                    <img src="{{ asset('image_layout/unsplash_Fyl8sMC2j2Q.svg') }}" alt="Avatar" width="90%">
                    <p class="mt-3 fw-bold fs-5">{{ $user[0]->un }}</p>
                </div>
                <div class="col my-auto">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control" id="name" disabled value="{{ $user[0]->un }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" disabled value="{{ $user[0]->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" disabled value="{{ $user[0]->email }}">
                    </div>
                </div>
                <div class="col my-auto">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" disabled value="{{ $user[0]->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" id="password" disabled value="{{ $user[0]->password }}">
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Vai trò</label>
                        <input type="text" class="form-control" id="role_id" disabled value="{{ $user[0]->rn }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection