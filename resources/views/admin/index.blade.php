<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INSPINIA | Dashboard</title>
    <base href="{{ asset('') }}">
   @include('admin.layout.css')
</head>
<body>
    <div id="wrapper">
        <!-- Nav-Left -->
        @include ('admin.layout.nav-left')
        <!-- End Nav-Left -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <!-- Header -->
            @include ('admin.layout.header')
            <!-- End Header -->
            <!-- CONTENT -->
            @yield( 'content' )
            <!-- CONTENT -->

            <!-- Footer -->
            @include('admin.layout.footer')
              <!-- End Footer -->
        </div>
        <!-- Mainly scripts -->
    </div>
    @include('admin.layout.js')
</body>
</html>
