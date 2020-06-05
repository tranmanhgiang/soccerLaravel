@extends('front.layouts.index')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="front_asset/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bs-text">
                    <form class="form-inline d-flex justify-content-center md-form form-sm">
                        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search" id="search" >
                        <button type="button" class="btn btn-success search" style="margin-top: 0;">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- match found begin-->
<section class="club-section spad">
    
    @foreach ($clubs as $item)
        <div class="container">
            <div class="club-content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="cc-pic">
                            <img src="admin_image/{{$item->clubs->logo}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cc-text">
                            <div class="ct-title">
                                <div class="row">
                                    <div class="col-sm-10 col-xs-10 col-md-10 col-lg-10 fc">
                                        <h3 >{{$item->clubs->clubName}}</h3>
                                        <a class="caption"><i class="fa fa-user"></i> {{$item->clubs->users->firstName . ' ' . $item->clubs->users->lastName}}</a>
                                        &nbsp;
                                        <button class="message btn btn-sm btn-default" title="Click để chat với đối" onclick="chat()"><i class="fa fa-comment"></i> Nói chuyện</button>
                                    </div>
                                    <form action="front/mail/{{$item->clubs->users->id}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-send"></i> Bắt đối</button>
                                    </form>
                                    
                                </div>
                                <p>{{$item->clubs->description}} </p>
                            </div>
                            <div class="ct-widget">
                                <ul>
                                    <li>
                                        <h5>Trình độ</h5>
                                        <p>{{$item->clubs->level}}</p>
                                    </li>
                                    <li>
                                        <h5>Kèo</h5>
                                        <p>{{$item->lease}}</p>
                                    </li>
                                    <li>
                                        <h5>Sân bóng</h5>
                                        <p>{{$item->stadium}}</p>
                                    </li>
                                    <li>
                                        <h5>Ngày</h5>
                                        <p>{{$item->date}}</p>
                                    </li>
                                    <li>
                                        <h5>Giờ</h5>
                                        <p>{{$item->time}} </p>
                                    </li>
                                    <li>
                                        <h5>Địa chỉ</h5>
                                        <p>{{$item->address}} </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    @endforeach
    <div class="container">
       {{$clubs->links()}} 
    </div>
 
</section>


<!-- match found End --> 
@endsection
