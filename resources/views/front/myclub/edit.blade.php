@extends('front.layouts.index')
@section('content')
<section class="hero-section set-bg">
    <div class="container">
        <form action="front/myclub/edit/{{$club->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên đội</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name = "clubname" value="{{$club->clubName}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sân nhà</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name = "homeStadium" value="{{$club->homeStadium}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Khu vực</label>
                <div class="col-sm-10">
                    <select id="inputState" class="form-control" name="address">
                        <option {{$club->address == 'Hà Nội' ? 'selected' : ''}}>Hà Nội</option>
                        <option {{$club->address == 'Thành phố HCM' ? 'selected' : ''}}>Thành phố HCM</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trình độ</label>
                <div class="col-sm-10">
                    <select id="inputState" class="form-control" name="level">
                        <option {{$club->level == 'Yếu' ? 'selected' : ''}}>Yếu</option>
                        <option {{$club->level == 'Trung bình' ? 'selected' : ''}}>Trung bình</option>
                        <option {{$club->level == 'Khá' ? 'selected' : ''}}>Khá</option>
                        <option {{$club->level == 'Mạnh' ? 'selected' : ''}}>Mạnh</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Logo đội</label>
                <input type="file" class="col-sm-4" name = "thunbar" onchange="readURL(this);">
                <br/>
                <img id="blah" src="admin_image/{{$club->logo}}" alt="your image" width='100px' height='100px'/>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Độ tuổi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name = "youngest" value={{$club->youngest}}>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name = "oldest" value={{$club->oldest}}>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Thời gian thường giao lưu</label>
                <div class="col-sm-10">
                    <select id="inputState" class="form-control" name="timeOften">
                        <option {{$club->timeOften === 'CN' ? 'selected' : ''}}>CN</option>
                        <option {{$club->timeOften === 'Thứ 2' ? 'selected' : ''}}>Thứ 2</option>
                        <option {{$club->timeOften === 'Thứ 3' ? 'selected' : ''}}>Thứ 3</option>
                        <option {{$club->timeOften === 'Thứ 4' ? 'selected' : ''}}>Thứ 4</option>
                        <option {{$club->timeOften === 'Thứ 5' ? 'selected' : ''}}>Thứ 5</option>
                        <option {{$club->timeOften === 'Thứ 6' ? 'selected' : ''}}>Thứ 6</option>
                        <option {{$club->timeOften === 'Thứ 7' ? 'selected' : ''}}>Thứ 7</option>
                    </select>
                </div>
            </div>
            <div class = "form-group row">
                <label class="col-sm-2 col-form-label"> Giới thiệu</label>
                <div class="col-sm-10">
                    <textarea class="col-sm-12" style ="height:100px;" name="description">{{$club->description}}</textarea>
                </div>
            </div>

            <div class="pull-right">
                <button type="button" class="btn btn-default"><a href="front/myclub/info/{{$club->id}}">Hủy</a></button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Cập nhật</button>
            </div>
        </form>
    </div>
    
</section>
@endsection