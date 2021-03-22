<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>
  <meta name="csrf-token" data-token="{{ csrf_token() }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/public_file/node_modules/bootstrap/css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" href="/public_file/node_modules/fontawesome/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/public_file/node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="/public_file/assets/css/style.css">
  <link rel="stylesheet" href="/public_file/assets/css/components.css">
</head>


@yield('main')


<!-- General JS Scripts -->
<!-- General JS Scripts -->
<script src="/public_file/node_modules/jquery/jquery-3.3.1.min.js"></script>
<script src="/public_file/node_modules/popper/popper.min.js" ></script>
<script src="/public_file/node_modules/bootstrap/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<script src="/public_file/node_modules/jquery-nicescroll/jquery-nicescroll.min.js"></script>
<script src="/public_file/node_modules/moment/moment.js"></script>
<script src="/public_file/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="/public_file/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="/public_file/node_modules/selectric/public/jquery.selectric.min.js"></script>

<!-- Template JS File -->
<script src="/public_file/assets/js/scripts.js"></script>
<script src="/public_file/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="/public_file/assets/js/page/auth-register.js"></script>

{{-- !NOTE Internal JS File --}}
<script src="/private_file/assets/js/{{Request::segment(1)}}/{{Request::segment(2)}}.js"></script>
<script src="/private_file/assets/js/function/script.js"></script>
<script src="/private_file/assets/js/variable/script.js"></script>

</body>
</html>

