<!doctype html>
<html lang="ar"  dir="rtl" >
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title> لوحه تحكم تطبيق تعليم | تسجيل الدخول </title>

  <link href="{{ asset('board_assets/dist/css/tabler.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-flags.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-payments.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-vendors.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/demo.rtl.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.css') }}" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <style>
    body ,  div , a , h1 , h2 , h3 , h4 , h5 , h6 , p , span , li , ul , table , thead , tbody , tr , td , th  , .dropdown-item {
      font-family: "Cairo", sans-serif !important;
      font-weight: bold;
    }
  </style>

</head>
<body  class=" d-flex flex-column bg-white">
  <script src="{{ asset('board_assets/dist/js/demo-theme.min.js') }}"></script>
  <div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
      <div class="container container-tight my-5 px-lg-5">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <h2 class="h3 text-center mb-3">
          تسجيل الدخول الى لوحه التحكم
        </h2>

        
        <form action="{{ route('login') }}" method="POST" autocomplete="off" >

          @csrf
          <div class="mb-3">
            <label class="form-label"> رقم الموبيل </label>
            <input type="text" name='mobile' class="form-control @error('mobile') is-invalid @enderror " placeholder="01012345678" autocomplete="off">
            @error('mobile')
            <p class='invalid-feedback' > {{ $message }} </p>
            @enderror
          </div>
          <div class="mb-2">
            <label class="form-label">
              كلمه المرور
              <span class="form-label-description">
                <a href="./forgot-password.html"> هل نسيت كلمه المرور </a>
              </span>
            </label>
            <div class="input-group input-group-flat">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "  placeholder="كلمه المرور"  autocomplete="off">
              
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="عرض كلمه المرور" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </a>
              </span>

              @error('password')
              <p class='invalid-feedback' > {{ $message }} </p>
              @enderror

            </div>

          </div>
          <div class="mb-2">
            <label class="form-check">
              <input type="checkbox" class="form-check-input"/>
              <span class="form-check-label"> تذكر دخول </span>
            </label>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100"> تسجيل الدخول </button>
          </div>
        </form>

      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
      <!-- Photo -->
      <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('board_assets/dist/img/How-Online-Education-is-Better-Than-Classroom-Education.jpg') }})"></div>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="{{ asset('board_assets/dist/js/tabler.min.js') }}" defer></script>
  <script src="{{ asset('board_assets/dist/js/demo.min.js') }}" defer></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.js') }}" defer></script>
  @include('board.layout.messages')
</body>
</html>