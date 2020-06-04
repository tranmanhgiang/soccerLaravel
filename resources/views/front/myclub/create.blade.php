@extends('front.layouts.index')
@section('content')

@if(session('success'))
    <div class="alert alert-success mb-0">
        {{session('success')}}
    </div>
@endif

<section class="breadcrumb-section set-bg" data-setbg="front_asset/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bs-text">
                    <h2>Tạo đội bóng mới</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero-section set-bg">
    <div class="container">
        <form action="front/myclub/create" method="POST" enctype="multipart/form-data">
            @csrf
            @if(count($errors) > 0)
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{$err}}
                    </div>  
                @endforeach
            @endif
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên đội</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="clubname" placeholder="Nhập tên đội bóng của bạn">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Khu vực</label>
                <div class="col-sm-10">
                    <select id="inputState" class="form-control" name="address">
                        <option selected>Hà Nội</option>
                        <option>Thành phố HCM</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trình độ</label>
                <div class="col-sm-10">
                    <select id="inputState" class="form-control" name="level">
                        <option selected>Yếu</option>
                        <option>Trung bình</option>
                        <option>Khá</option>
                        <option>Mạnh</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sân nhà</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="stadium" placeholder="Nhập tên sân bóng thường đá">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Logo đội</label>
                <input type="file" class="col-sm-4" name = "thunbar" onchange="readURL(this);">
                <br/>
                <img id="blah" src="#" alt="your image" width='100px' height='100px'/>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Độ tuổi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" placeholder="Nhỏ tuổi nhất" name="youngest">
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Lớn tuổi nhất" name="oldest">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Thời gian thường giao lưu</label>
                <div class="col-sm-10">
                    <select id="inputState" class="form-control" name="timeoften">
                        <option selected>CN</option>
                        <option>Thứ 2</option>
                        <option>Thứ 3</option>
                        <option>Thứ 4</option>
                        <option>Thứ 5</option>
                        <option>Thứ 6</option>
                        <option>Thứ 7</option>
                    </select>
                </div>
            </div>
            <div class = "form-group row">
                <label class="col-sm-2 col-form-label"> Giới thiệu</label>
                <div class="col-sm-10">
                    <textarea class="col-sm-12" style ="height:100px;" name="description"></textarea>
                </div>
            </div>

            <div class="pull-right">
                <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Xác nhận</button>
            </div>
        </form>
    </div>
</section>

@endsection