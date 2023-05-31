@extends('layouts.auth-master')
@section('auth-content')
        <div class="row">
            <div class="col-left">
                <div id="logo-container" class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('image_layout/Logo alta.svg') }}" alt="Alta Logo">
                </div>
                <div class="text-center" style="font-weight: 700; font-size: 22px; margin-bottom: 16px">Đặt lại mật khẩu</div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-fields m-auto">
                        <!-- Password -->
                        <div class="mb-3 m-auto p-relative">
                            <label for="password" class="form-label ">Vui lòng nhập email để đặt lại mật khẩu của bạn *</label>
                            <input type="email" class="form-control inputs" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="buttons-container text-center mt-5">
                        <div class="button-inline me-3">
                            <a href="{{ route('login') }}" class="btn btn-outline">Hủy</a>
                        </div>
                        <div class="button-inline">
                            <button type="submit" class="btn btn-fill">Tiếp tục</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-right p-relative">
                <div class="image-svg">
                    <img src="{{ asset('image_layout/Frame.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <script>
        document.title='Quên mật khẩu'
    </script>
@endsection