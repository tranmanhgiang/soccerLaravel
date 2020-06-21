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
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="cc-pic">
                        <img src="admin_image/{{$myclub->logo}}" alt="">
                        <h3>{{$myclub->clubName}}</h3>
                        <button type="button" class="btn btn-danger update-myclub"><a href="front/myclub/edit/{{$myclub->id}}">Cập nhật thông tin</a></button>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
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
<hr class="container"/>
<div class="container">
    <h3 class="col-md-4 alert-info p-2">Đối đang bắt : {{$count}}</h3>
</div>

<div class="container">
    
        <table class="table table-borderless table-condensed table-hover container">
            
            <tbody>
                @foreach ($mycomp as $item)
                    <tr>
                        <td class="left-team text-center">
                            <img src="admin_image/{{$item->clubs->logo}}" width="70px" height="70px" class="logo" />
                            <h4>{{$item->clubs->clubName}}</h4>
                        </td>
                        <td class="oppsing text-center">
                            <h3>{{$item->find_amatch->stadium}}</h3>
                            <h4>VS</h4>
                            <div>{{$item->find_amatch->date}}</div>
                            @if($item->find_amatch->date < date("Y-m-d"))
                                <div style="color:red;"><i class="fa fa-times"></i> Đã quá hạn</div>
                            @else
                                <button type="button" class="btn btn-danger">Hủy kèo</button>
                            @endif
                        </td>
                        <td class="right-team text-center">
                            <img src="admin_image/{{$item->find_amatch->clubs->logo}}" width="70px" height="70px" class="logo" />
                            <h4>{{$item->find_amatch->clubs->clubName}}</h4>
                        </td>
                    </tr>
                    <br/>
                @endforeach
              
            </tbody>
        </table>
</div>

<br/>
<hr class="container"/>
<div class="container">
    <h3 class="col-md-4 alert-info p-2">Danh sách bài đăng : {{$countPost}}</h3>
</div>
<br/>
<div class="container">
    <div class="row">
        <div class="alert alert-success"></div>&nbsp; Da duoc duyet 
    </div>
    <div class="row">
        <div class="alert alert-secondary"></div>&nbsp; Da duoc duyet
    </div>
</div>
<br/>
<div class="container allPost">
    @foreach ($postslist as $item)
        <div class="row item alert alert-{{$item->allow === 1 ? 'success' : 'secondary'}}">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                <small>Đã đăng lúc : {{$item->created_at}}</small>
                <div>Ngày : {{$item->date}}</div>
                <div>Giờ : {{$item->time}}</div>
                <div>Sân : {{$item->stadium}}</div>
                <div>Kèo : {{$item->lease}}</div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2" >
                @if($item->status === 1)
                    <div class="text-success">Đã có đối</div>
                @else
                    <div class="text-warning">Chưa có đối</div>
                @endif
            </div>
            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1"><a href="" class="edit" title="Chỉnh sửa bài đăng"><i class="fa fa-edit"></i></a> <a href="" class="delete" title="Xóa bài đăng"><i class="fa fa-minus-circle"></i></a></div>
        </div>
    @endforeach
</div>

<br/>
<hr class="container"/>

@endsection