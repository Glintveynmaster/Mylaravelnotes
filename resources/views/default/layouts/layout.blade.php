
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>{{$title}}</title>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet"  >
    <!-- Optional theme -->
    {{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">--}}
    <link rel="stylesheet" href="{{asset('css/stylus.css')}}" type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
    <style type="text/css">
        table, th, td{
            padding: 5px;
            border-radius: 10px;
            text-align: center;
        }
        td {
            min-width: 110px;
        }
        body {
            background-image: url('{{asset('images/novgod47.jpg')}}');
            min-width: 640px;
        }
        html, body, h2 {
            background-color: #fff;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            color: #222;
            margin: 0;
        }
        h2 {
            padding-bottom: 25px;
        }
        .bg-color {
            background-color: #fff;
        }
        .container-pad {
            padding-top: 25px;
        }
        .photo-del {
            position: relative;
            display: inline-block;
        }
        .photo-del a {
            text-decoration: none;
            color: inherit;
        }
        .photo-shadow {
            position: absolute;
            right: -5px;
        }
        .photo-shadow:hover {
            color: rgba(0,0,0,.5);
            cursor: pointer;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .title {
            font-size: 84px;
        }
        #notes-list .btn-change {
            display: block;
            margin-bottom: 7px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
@section('navbar')
<div class=" navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route("main_page")}}">Мои заметки</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navigation">
                <li class="active"><a href="{{route("main_page")}}">Главная</a></li>
                <li><a href="{{route('images.index')}}">Мой список</a></li>
                <li><a href="{{route('images.create')}}">Создать заметку</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Логин</a></li>
                        <li><a href="{{ url('/register') }}">Регистрация</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div><!--/.nav-collapse -->
    </div>
</div>
@show

@section('header')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>{{$title}}</h1>
        <p>{{$headtext}}</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="{{route('images.create')}}">{{$button}} &raquo;</a></p>
    </div>
</div>
@show
<div class="container bg-color container-pad">

        @section('sidebar-block')
        <div class="col-sm-0 col-md-3 side">

            <div class="sidebar-module">
                <h4>{{date('d M Y',time())}}</h4>
                @section('sidebar')
                <ol class="list-unstyled">
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                    <li><a href="#">March 2013</a></li>
                    <li><a href="#">February 2013</a></li>
                </ol>
            </div>
            @show
        </div>

@show
            @yield('content')

</div> <!-- /container -->
<div class="container bg-color">
    @section('footer')
        <hr>
        <footer>
            <p>&copy; Приложение "Мои заметки" {{date('Y')}}</p>
        </footer>
    @show

    </div>



<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>

<script>

    $(document).ready(function() {

        $('#text').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    var el = $(this);
                    sendFile(files[0],el);
                }
            }
        });
            $('.navigation li').hover(function () {
                $('.navigation li').removeClass('active');
                $(this).addClass('active');
            });
    });

    $('#text').summernote({
        lang:'ru-RU',
        height:300,
        minHeight:200,
        maxWidth:400,
//        focus:true,
        placeholder:'Ваша Заметка',
        toolbar:[
                    ['insert',['link','table']],
                    ['style',['bold','italic','underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize','fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph','style']],
                    ['height', ['height','codeview']],
        ],
        disableDragAndDrop:true,
    });

    function sendFile(file, el) {
        var  data = new FormData();
        data.append("file", file);
        var url = '{{ route('images.store') }}';
        $.ajax({
            data: data,
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function(url2) {
                el.summernote('insertImage', url2);
            }
        });
    }

</script>
</body>
</html>