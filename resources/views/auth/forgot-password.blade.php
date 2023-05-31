<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>

    <!-- GG Fonts Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">
</head>

<body>
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
</body>

</html>