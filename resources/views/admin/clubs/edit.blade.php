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
    <form action="admin/clubs/edit/{{$club->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên đội</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="clubname" value="{{$club->clubName}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Đội trưởng</label>
            <div class="col-sm-10">
                {{-- <select id="inputState" class="form-control" name="captain">
                    @foreach($captain as $item)
                        @if($item->clubs === null && $item->role !== 1)
                            <option selected value = {{$item->id}}>{{$item->lastName . ' ' . $item->firstName}}</option>
                        @endif
                    @endforeach
                </select> --}}
                <input type="text" class="form-control" name="captain" value="{{$captain[0]->lastName . ' ' .$captain[0]->firstName}}" readonly/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sân bóng</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="homeStadium" value="{{$club->homeStadium}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Khu vực</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control" name="address">
                    <option {{$club->address === 'Hà Nội' ? 'selected' : ''}}>Hà Nội</option>
                    <option {{$club->address === 'Thành phố HCM' ? 'selected' : ''}}>Thành phố HCM</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Trình độ</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control" name="level">
                    <option {{$club->level === 'Yếu' ? 'selected' : ''}}>Yếu</option>
                    <option {{$club->level === 'Trung bình' ? 'selected' : ''}}>Trung bình</option>
                    <option {{$club->level === 'Khá' ? 'selected' : ''}}>Khá</option>
                    <option {{$club->level === 'Mạnh' ? 'selected' : ''}}>Mạnh</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Độ tuổi</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name = "youngest" value="{{$club->youngest}}">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name = "oldest" value="{{$club->oldest}}">
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
        <div class="form-group row">
            <label class="col-sm-2">Logo đội</label>
            <input type="file" class="col-sm-3" name = "thunbar" onchange="readURL(this);">
            
            <img id="blah" src="admin_image/{{$club->logo}}" alt="your image" width='150px' height='200px'/>
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