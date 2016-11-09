<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <!-- Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>@yield('title') &mdash; The Sunday Sim</title>

        <link rel="stylesheet" type="text/css" href="{{ theme('css/backend.css') }}">
        <!-- Bootstrap core CSS -->
        <link href="{{ theme('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ theme('css/signin.css') }}" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row vertical-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-{{ $errors->any() ? 'danger' : 'default' }}">
                        <div class="panel-heading">
                            <h2 class="panel-title">@yield('heading')</h2>
                        </div>
                        <div class="panel-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <strong>We found some errors!</strong>

                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if($status)
                                <div class="alert alert-info">
                                    {{ $status }}
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="{{ theme('js/ie-emulation-modes-warning.js') }}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{ theme('js/ie10-viewport-bug-workaround.js') }}"></script>
    </body>
</html>
