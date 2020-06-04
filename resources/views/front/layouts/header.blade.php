<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Specer Template">
    <meta name="keywords" content="Specer, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./public/img/title_icon/title.jpg" type="image/x-icon">
    <title>Tìm đối bóng đá giao lưu</title>
    <base href="{{asset('')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="front_asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/style.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/log-res.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/profile.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/matchFound.css" type="text/css">
    <link rel="stylesheet" href="front_asset/css/clubsList.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="search-btn search-switch">
            <i class="fa fa-search"></i>
        </div>
        
        <ul class="main-menu mobile-menu">
            <li class="active"><a href="./index.html">Trang chủ</a></li>
            <li><a>Tìm đối</a>
                <ul class="dropdown">
                    <li><a href="front/clubs/waiting">Đối đang chờ</a></li> <hr/>
                    <li><a href="front/clubs/clubslist">Danh sách đội bóng</a></li> <hr/>
                    <li><a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Đăng tìm đối</a></li>
                </ul>
            </li>
            @if(Auth::check())
                @if(isset(Auth::user()->clubs->id))
                    <li class="{{ (request()->is('front/myclub/info/*') || request()->is('front/myclub/edit/*')) ? 'active' : '' }}"><a href="front/myclub/info/{{Auth::user()->clubs->id}}" >Quản lý đội</a></li>
                @else
                    <li class="{{ (request()->is('front/myclub/create')) ? 'active' : '' }}"><a href="front/myclub/create" >Quản lý đội</a></li>
                @endif
                <li><a href="front/user/profile/{{Auth::user()->id}}" >Thông tin cá nhân</a></li>
                <li><a href="front/user/profile/{{Auth::user()->id}}">Thông tin</a>
                    <ul class="dropdown">
                        <li><a href="front/user/profile/{{Auth::user()->id}}">Thông tin cá nhân</a></li> <hr/>
                        <li><a href="front/clubs/clubslist">Đổi mật khẩu</a></li> <hr/>
                        <li><a href="front/logout">Đăng xuất</a></li>
                    </ul>
                </li>
            @else
                <li><a href="front/regist">Đăng ký</a></li>
                <li><a href="front/login">Đăng nhập</a></li>
            @endif
        </ul>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section conatiner-fluid">
        
        <div class="header__nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="front"><img src="front_asset/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <ul class="main-menu">
                                <li class="{{ (request()->is('front')) ? 'active' : '' }}"><a href="front">Trang chủ</a></li>
                                <li class="{{ (request()->is('front/clubs/waiting') || (request()->is('front/clubs/clubslist'))) ? 'active' : '' }}"><a href="front">Tìm đối</a>
                                    <ul class="dropdown">
                                        <li><a href="front/clubs/waiting">Đối đang chờ</a></li> <hr/>
                                        <li><a href="front/clubs/clubslist">Danh sách đội bóng</a></li> <hr/>
                                        <li><a href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Đăng tìm đối</a></li>
                                    </ul>
                                </li>

                                @if(Auth::check())
                                    @if(isset(Auth::user()->clubs->id))
                                        <li class="{{ (request()->is('front/myclub/info/*') || request()->is('front/myclub/edit/*')) ? 'active' : '' }}"><a href="front/myclub/info/{{Auth::user()->clubs->id}}" >Quản lý đội</a></li>
                                    @else
                                        <li class="{{ request()->is('front/myclub/create') ? 'active' : '' }}"><a href="front/myclub/create" >Quản lý đội</a></li>
                                    @endif
                                    <li>
                                        <a>
                                            <img class="img-profile rounded-circle" src="admin_image/{{Auth::user()->thunbar}}" style = "width:35px; height:35px" alt = "avatar" />
                                        </a>
                                        
                                        <ul class="dropdown">
                                            <li>
                                                <a href="front/user/profile/{{Auth::user()->id}}" >Thông tin cá nhân</a>
                                            </li>
                                            <hr/>
                                            <li>
                                                <a href="">Đổi mật khẩu</a>
                                            </li>    
                                            <hr />
                                            <li>
                                                <a href="front/logout">Đăng xuất</a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="{{ (request()->is('front/regist')) ? 'active' : '' }}"><a href="front/regist">Đăng ký</a></li>
                                    <li class="{{ (request()->is('front/login')) ? 'active' : '' }}"><a href="front/login">Đăng nhập</a></li>
                                @endif
                            </ul>
                            <div class="nm-right search-switch">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas-open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
