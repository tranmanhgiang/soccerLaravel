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
    <form action='admin/users/add' id="form" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="title">Thêm người dùng</h2>
            <div class="row form-group" > 
                <div class="col-xs-6 col-md-6"> 
                    <input class="form-control" name="lastname" placeholder="Họ" autofocus type="text"> 
                
                </div> 
                <div class="col-xs-6 col-md-6"> 
                    <input class="form-control" name="firstname" placeholder="Tên" type="text" > 
                </div>                                                                                                                                                                                                                    
            </div> 
            <div class="form-group">
                <input class="form-control" name="email" placeholder="Email" type="email">
            </div>
            <div class="form-group">
                <input class="form-control" name="phone" placeholder="Số điện thoại" type="text">
            </div>
            <div class="form-group"> 
                <input type="password" placeholder="Mật khẩu" class="form-control" name="password" id="password" >
            </div>
            

            <div class="form-group">
                <input type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="confpass" id="confpass" >
            </div>
            
            <div class="form-group">
                <span class="error" style="color:red; font-weight: bold;"></span>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-1 col-form-label">Vai trò</label>
                    <div class="col-sm-3">
                        <select name="role" class="form-control">
                            <option value="0">Thành viên</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                <div class="col-sm-2"></div>
                <label for="inputEmail3" class="col-sm-1 col-form-label">Hình ảnh</label>
                    <div class="col-sm-3">
                        <input type="file" class="form-control" name = "thunbar" onchange="readURL(this);">
                        <br/>
                        <img id="blah" src="#" alt="your image" width='150px' height='200px'/>
                    </div>
            </div>
            <textarea rows="3" cols="119" placeholder="Nhập mô tả về bản thân" name = "description" id = "description"></textarea>
            <a type="button" href = "admin/users/list" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Trở về</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Lưu</button>
        </form>
    </div>
    <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection