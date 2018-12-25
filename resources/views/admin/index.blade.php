<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INSPINIA | Dashboard</title>
    @routes()
    
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
    
    @yield('js')

    @include('sweetalert::alert')
    
</body>
</html>
