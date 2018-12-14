<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA | Login 2</title>
    <link href="{{ asset('bower_components/lb-template/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lb-template/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('bower_components/lb-template/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/lb-template/css/style.css') }}" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Welcome to IN+</h2>
                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>
                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'url' => route('login'), 'files' => true, 'class' => 'm-t']) !!}
                        @if (Session::has('danger'))
                            <p class="alert alert-danger">{{ Session::get('danger') }}</p>
                        @endif
                        <div class="form-group">
                            {!!  Form::email( 'email','',[ 'class'=>'form-control','placeholder'=>'email','required'=>'' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password( 'password', [ 'class' => 'form-control','placeholder'=>'Password','required'=>'' ])!!}
                        </div>
                        {!! Form::button('Login',['type' => 'submit', 'class'=>'btn btn-primary block full-width m-b' ])!!}
                        <a href="#">
                            <small>Forgot password?</small>
                        </a>
                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                    {!! Form::close() !!}
                    <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
    </div>
</body>
</html>
