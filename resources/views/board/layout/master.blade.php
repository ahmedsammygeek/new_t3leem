<!doctype html>

<html lang="en" dir="rtl" >
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title> لوحه تحكم تطبيق تعليم | @yield('title') </title>
  <link href="{{ asset('board_assets/dist/css/tabler.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-flags.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-payments.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-vendors.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/demo.rtl.min.css') }}" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <link href="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.css') }}" rel="stylesheet"/>
  @stack('styles')
  @livewireStyles

  <style>
    body ,  div , a , h1 , h2 , h3 , h4 , h5 , h6 , p , span , li , ul , table , legend , thead , tbody , tr , td , th  , .dropdown-item {
      font-family: "Cairo", sans-serif !important;
      font-weight: bold;
    }
  </style>
</head>
<body class=' layout-fluid' >
  <script src="{{ asset('board_assets/dist/js/demo-theme.min.js') }}"></script>
  <div class="page">
    <!-- Sidebar -->
    @include('board.layout.sidebar')
    <!-- Navbar -->
    @include('board.layout.header')
    <div class="page-wrapper">
      <!-- Page header -->
      @yield('content')
      @include('board.layout.footer')
    </div>
  </div>


  <script src="{{ asset('board_assets/dist/js/tabler.min.js') }}" defer></script>
  <script src="{{ asset('board_assets/dist/js/demo.min.js') }}" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.js') }}" defer></script>
  @include('board.layout.messages')
  @stack('scripts')

  @livewireScripts
</body>
</html>