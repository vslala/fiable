
<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title or '' }}</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <style>
            .logo{
                height: 50px;
                width: auto;
                }
        </style>
        @yield('css')
    </head>

    <body>
    @if(isset($_SESSION['admin']))
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar">
                    <div class="navbar-header">

                            <a href="{{ route('home') }}">
                                {!! Html::image('img/home/2.png', 'logo', ['class'=>'img img-responsive logo']) !!}
                            </a>

                    </div>
                    <div class="navbar-right">
                        <ul class="nav nav-tabs">
                            <li><a href="{{ route('adminHome') }}"> Home </a></li>
                            <li><a href="{{ route('adminBlog') }}"> Blog </a></li>
                            <li><a href="{{ route('adminProduct') }}"> Product </a></li>
                            <li><a href="{{ route('adminCategory') }}"> Category </a></li>
                            <li><a href="{{ route('adminLogout') }}"> Logout </a></li>
                        </ul>
                    </div>
                    </nav>
                </div>

            </div>
            @endif
        @yield('content')
        </div>
        @yield('js')
    </body>
</html>