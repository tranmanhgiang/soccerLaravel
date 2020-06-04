@extends('admin.layouts.index')
@section('content')
<div class="container-fluid">
    <div>
        <h1 class = "App">Chào mừng bạn đến với trang quản trị</h1>
        <br/>
        <div class = "row">
            <a href="admin/users/list" class = "mr-10 text-center card-box">
                <div class="info"><i class="fas fa-users"></i></div>
                <div class="info">Người dùng</div>
                <div class="info">{{$users}}</div>
            </a>
            <a href="" class = "mr-10 text-center card-box">
                <div class="info"><i class="fas fa-fw fa-calendar-alt"></i></div>
                <div class="info">Kèo đấu</div>
                <div class="info">10</div>
            </a>
            <a href="admin/clubs/list" class = "mr-10 text-center card-box">
                <div class="info"><i class="far fa-futbol"></i></div>
                <div class="info">Đội bóng</div>
                <div class="info">{{$clubs}}</div>
            </a>
            <a href="admin/findamatch/pending" class = "mr-10 text-center card-box">
                <div class="info"><i class="fas fa-paper-plane"></i></div>
                <div class="info">Đang chờ xét duyệt</div>
                <div class="info">{{$find}}</div>
            </a>
        </div>
    </div>

</div>
@endsection