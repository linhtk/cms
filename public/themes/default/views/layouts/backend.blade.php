<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <!-- Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

        <title>@yield('title') &mdash; Administrator</title>

        <link rel="stylesheet" href="{{ theme('css/backend.css') }}">
        <script src="{{ theme('js/all.js') }}"></script>

        <!-- Bootstrap core CSS -->
        <link href="{{ theme('css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ theme('css/font-awesome.min.css') }}">
        <!-- Custom styles for this template -->
        <link href="{{ theme('css/dashboard.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ theme('css/jquery.mCustomScrollbar.css') }}" />
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="{{ theme('js/ie-emulation-modes-warning.js') }}"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><i class="fa fa-paper-plane-o fa-lg"></i> Administrator</a>
                    <ul class="nav navbar-nav hidden-xs">
                        <li class="anhnm"><a href="#"><i class="fa fa-dedent fa-lg"></i></a></li>
                    </ul>

                    <p class="navbar-text hidden-xs">Hệ thống quản lý kho hàng</p>

                </div>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li class="dropdown notify-row">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-envelope-o fa-lg"></i> <span class="badge bg-danger pull-right">4</span></a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">Bạn có 4 tin nhắn</p>
                            </li>
                            <li> <a href="#"> <span class="subject"> <span class="from">Trương Kiều Linh</span> <span class="time">24/03/2015</span> </span> <span class="message"> Tôi muốn mua sản phẩm... </span> </a> </li>
                            <li> <a href="#"> <span class="subject"> <span class="from">Nguyễn Mạnh Anh</span> <span class="time">14/02/2015</span> </span> <span class="message"> Tôi đã thanh toán... </span> </a> </li>
                            <li> <a href="#"> <span class="subject"> <span class="from">Nguyễn Minh Anh</span> <span class="time">21/01/2015</span> </span> <span class="message"> Bạn ơi cho mình hỏi chút... </span> </a> </li>
                            <li> <a href="#"> <span class="subject"> <span class="from">Nguyễn Hải Phong</span> <span class="time">20/01/2015</span> </span> <span class="message"> Bên bạn có bán online?... </span> </a> </li>
                            <li class="external"> <a href="#">Xem tất cả các tin nhắn</a> </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user fa-lg"></i> <span class="hidden-xs">Tài khoản</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile.html"><i class="fa fa-user"></i> Thông tin cá nhân</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid main-content">
            <div class="row">

                <div class="sidebar mCustomScrollbar light" data-mcs-theme="minimal-dark">

                    <div  class="collapse navbar-collapse" id="navbar-collapse">
                        <h5 class="sidebartitle">Sản phẩm</h5>
                        <ul class="nav nav-sidebar">
                            <!--<li class="active"><a href="#"><i class="fa fa-home fa-lg"></i> <span>Trang chủ</span></a></li>-->
                            <li><a href="{{ route('backend.categories.index') }}"><i class="fa fa-folder-open-o fa-lg"></i> <span>Quản lý danh mục</span></a></li>
                            <li><a href="{{ route('backend.product.index') }}"><i class="fa fa-shopping-cart fa-lg"></i> <span>Quản lý Sản phẩm</span> <span class="badge bg-danger pull-right">42</span></a></li>
                            <li><a href="#"><i class="fa fa-flag-o fa-lg"></i> <span>Quản lý thương hiệu</span></a></li>
                            <li><a href="#"><i class="fa fa-file-excel-o fa-lg"></i> <span>Quản lý Báo giá</span></a></li>

                        </ul>
                        <h5 class="sidebartitle">Quản lý chung</h5>
                        <ul class="nav nav-sidebar">
                            <li><a href="#"><i class="fa fa-picture-o fa-lg"></i> <span>Quản lý Quảng cáo</span></a></li>
                            <li><a href="#"><i class="fa fa-support fa-lg"></i> <span>Quản lý Hỗ trợ</span></a></li>
                            <li><a href="{{ route('backend.pages.index') }}"><i class="fa fa-files-o fa-lg"></i> <span>Quản lý Trang tĩnh</span></a></li>
                            <li><a href="{{ route('backend.blog.index') }}"><i class="fa fa-newspaper-o fa-lg"></i> <span>Quản lý Tin tức</span></a></li>
                            <li><a href="#"><i class="fa fa-users fa-lg"></i> <span>Quản lý tài khoản</span></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o fa-lg"></i> <span>Email</span> <span class="badge bg-danger pull-right">42</span></a></li>
                            <li class="visible-xs"><a href="#"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="main">
                    <div class="row">
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
                    <div class="copyright">
                        <p>© 2015 Hệ thống quản lý sản phẩm - By @<a href="mailto:anhnm.2610@gmail.com">LinhAnh</a></p>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
