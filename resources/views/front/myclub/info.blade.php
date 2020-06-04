@extends('front.layouts.index')
@section('content')

<section class="breadcrumb-section set-bg" data-setbg="front_asset/img/breadcrumb-bg.jpg">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bs-text">
                    <h2>Quản lý đội bóng</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<br/>

<div class="container myclub">
    {{-- @foreach ($myclub as $myclub) --}}
        <div class="club-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cc-pic">
                        <img src="admin_image/{{$myclub->logo}}" alt="">
                        <h3>{{$myclub->clubName}}</h3>
                        <button type="button" class="btn btn-danger update-myclub"><a href="front/myclub/edit/{{$myclub->id}}">Cập nhật thông tin</a></button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cc-text">
                        <div class="ct-title">
                            <ul>
                            <li>
                                <h5>Giới thiệu</h5>
                                <p>
                                    {{$myclub->description}}
                                </p>
                            </li>
                            <li>
                                <h5>Trình độ</h5>
                                <p>{{$myclub->level}}</p>
                            </li>
                            <li>
                                <h5>Độ tuổi</h5>
                                <p>{{$myclub->youngest . ' - ' .$myclub->oldest}} tuổi</p>
                            </li>
                            <li>
                                <h5>Thời gian thường giao lưu</h5>
                                <p>{{$myclub->timeOften}}</p>
                            </li>
                            <li>
                                <h5>Sân nhà</h5>
                                <p>{{$myclub->homeStadium}}</p>
                            </li>
                            <li>
                                <h5>Địa chỉ</h5>
                                <p>{{$myclub->address}}</p>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endforeach --}}
    
</div>

<br/>

@endsection