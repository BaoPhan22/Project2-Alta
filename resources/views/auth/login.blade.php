<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

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
</head>

<body>
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
                        <input type="text" class="form-control inputs" id="username" name="username">

                    </div>


                    <!-- Password -->
                    <div class="mb-3 m-auto p-relative">
                        <label for="password" class="form-label ">Mật khẩu *</label>
                        <input type="password" class="form-control inputs border border-danger border-2" id="password" name="password">
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
    
    <script>
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
</body>

</html>