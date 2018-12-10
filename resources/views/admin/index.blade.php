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
            
            <!-- Header - Dashboard -->
           @include('admin.layout.header-dashboard')
            <!-- End Header - Dashboard -->
        <div class="row">
            <div class="col-lg-12">

                <!-- CONTENT -->
                @yield( 'content' )
                <!-- CONTENT -->

                <!-- Footer -->
                @include('admin.layout.footer')
                  <!-- End Footer -->
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->

    @include('admin.layout.js')
</body>
</html>
