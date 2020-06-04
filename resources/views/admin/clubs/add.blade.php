@extends('admin.layouts.index')
@section('content')
<div class="container">
    @if(count($errors) > 0)
      <div class="alert alert-danger">
        @foreach($errors->all() as $err)
          {{$err}} <br/>
        @endforeach
      </div>
    @endif
    <h1>Thêm đội bóng</h1>
    <form action="admin/clubs/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên đội</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="clubname" placeholder="Nhập tên đội bóng">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Đội trưởng</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control" name="captain">
                    @foreach($captain as $item)
                        @if($item->clubs === null && $item->role !== 1)
                            <option selected value = {{$item->id}}>{{$item->lastName . ' ' . $item->firstName}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sân bóng</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="homeStadium" placeholder="Nhập tên sân bóng">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Khu vực</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control" name="address">
                    <option selected>Hà Nội</option>
                    <option >Thành phố HCM</option>
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
            <label class="col-sm-2 col-form-label">Độ tuổi</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Nhỏ tuổi nhất"name = "youngest">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Lớn tuổi nhất"name = "oldest">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Thời gian thường giao lưu</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control" name="timeOften">
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
        <div class="form-group row">
            <label class="col-sm-2">Logo đội</label>
            <input type="file" class="col-sm-3" name = "thunbar" onchange="readURL(this);">
            
            <img id="blah" src="#" alt="your image" width='150px' height='200px'/>
        </div>
        <a type="button" href = "admin/clubs/list" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Trở về</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Lưu</button>
    </form>
    </div>
    <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection