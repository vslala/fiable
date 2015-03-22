
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
        {!! Html::script('js/myjs.js') !!}
        {!! Html::script('js/jqueryCookie.js') !!}

        <!-- Bootstrap Validation Css File -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.css') !!}

        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css') !!}

        <!-- Javascript files for Bootstrap Validation Plugin -->
        {!! Html::script('http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.js') !!}

        {!! Html::script('http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js') !!}

        <!-- Jquery Magnify -->
        {!! Html::script("js/jquery.magnify.js") !!}

        {!! Html::style("css/magnify.css") !!}

        <!-- Jquery Slider -->
        <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
        <script src="http://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
        <style>
                .h3{
                font-family: tahoma, arial, helvetica, sans-serif ;

                }
                #cartItemImage{
                height: 100px;

                }
                .logo{
                height: 50px;
                width: auto;
                }
                .nav-inverse-border{
                border-radius: 5px;
                }

                #reviewBtn{
                width: 100%;
                }
                .left-panel{

                }
                .left-nav{
                text-align: right;
                }
                .image-row{
                margin-bottom: 20px;
                }
                .nav-align-right{
                text-align: right;
                }
                #modal-title{
                font-size: large;
                }
                .navbar-right{
                padding: 10px;
                /*background-color: rgb(45,23,100);*/
                border-radius: 20px;
                background-image: url("");
                }
                .address{
                margin: 0px;
                padding: 20px;
                background-color: #d0e9c6;

                }
                .home-image-tab{
                /*border: 2px solid gray;*/
                margin-bottom: 10px;
                }
                p{
                margin: 0px;
                padding: 0px;
                font-family: "Tahoma", "sans-serif";
                }
                .tahoma{
                font-family: "Tahoma", "sans-serif";
                }
                .breadcrumb{
                margin: 0px;
                padding: 0px;
                }
                .block{
                display: block;
                }
                #btn-lg{
                width: 600px;

                }
                #btn-lg-lg{
                width: 800px;
                }
                .icon-rupee{
                background-image: url("http://localhost:8000/public/img/home/rupee-symbol.png");
                }
                .panel-footer {
                	padding: 1px 15px;
                	color: #A0A0A0;
                }
                .image{
                height: 200px;
                width: 200px;
                }
                .view-review{
                    border: 1px solid black;
                }
                .style-none{
                font-style: none;
                color: #000000;

                }
                #photographer{
                                border: 1px solid gray;
                                padding: 10px;
                }
                .profile-img {
                	width: 96px;
                	height: 96px;
                	margin: 0 auto 10px;
                	display: block;
                	-moz-border-radius: 50%;
                	-webkit-border-radius: 50%;
                	border-radius: 50%;
                }
                #signUpPanel{
                padding: 10px;
                }

    .top-row{
    height: 55px;

    }
    .row-2{
    margin-top: 5%;
    }

    

    .home-image-tab{
    height: 300;
    width: 300;
    text-align: center;
    }
    .order-summary{
    border: 1px solid gray;
    background-color: gainsboro;
    }
    .amountPayable{
    margin-right: 100px;
    background-color: #d0e9c6;
    color: #080808;
    padding: 50px;
    border: 1px solid gray;
    margin-top: -20px;
    font-size: larger;
    font-family: 'Trebuchet MS', 'Geneva CE', lucida, sans-serif;
    }
        </style>
        @yield('css')
    </head>

    <body>
    <div class="container">
            <div class="row top-row">
                <div class="col-md-12">
                    <nav class="navbar">
                    <div class="navbar-header">

                            <a href="{{ route('home') }}">
                                {!! Html::image('img/home/company-logo.png', 'logo', ['class'=>'img img-responsive logo', 'id'=>'company-logo']) !!}
                            </a>

                    </div>
                    <div class="navbar-right">
                        <ul class="nav nav-pills">
                            <li class="{{ $setHomeActive or '' }}"><a href="{{ route('home') }}"> Home </a></li>
                            <li class="{{ $setBlogActive or '' }}"><a href="{{ route('blog') }}"> Blog </a></li>
                            <li class="{{ $setAboutActive or '' }}"><a href="{{ route('about') }}"> About </a></li>
                            <li class="{{ $setContactActive or '' }}"><a href="{{ route('contact') }}"> Contact </a></li>
                        </ul>
                    </div>
                    </nav>
                </div>

            </div>
            {{--<div class="clear-fix"></div>--}}

        @yield('content')
        </div>
        @yield('js')
    </body>
</html>