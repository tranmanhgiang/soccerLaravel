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
    <form action='admin/users/edit/{{$user->id}}' id="form" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="title">Chỉnh sửa thông tin</h2>
            <div class="row form-group" > 
                <div class="col-xs-6 col-md-6"> 
                    <input class="form-control" name="lastname" placeholder="Họ" autofocus type="text" value = "{{$user->lastName}}"> 
                
                </div> 
                <div class="col-xs-6 col-md-6"> 
                    <input class="form-control" name="firstname" placeholder="Tên" type="text" value = "{{$user->firstName}}"> 
                </div>                                                                                                                                                                                                                    
            </div> 
            <div class="form-group">
                <input class="form-control" name="email" placeholder="Email" type="email" value = "{{$user->email}}" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" name="phone" placeholder="Số điện thoại" type="text" value = {{'0'.$user->phone}}>
            </div>
            <div class="form-group">
                <label>Đổi mật khẩu</label>
                <input type="checkbox" name = "changePassword" id="changePassword" />
            </div>
            <div class="form-group"> 
                <input type="password" placeholder="Mật khẩu" class="form-control password" name="password" id="password" disabled>
            </div>
            

            <div class="form-group">
                <input type="password" placeholder="Nhập lại mật khẩu" class="form-control password" name="confpass" id="confpass" disabled>
            </div>
            
            <div class="form-group">
                <span class="error" style="color:red; font-weight: bold;"></span>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-1 col-form-label">Vai trò</label>
                    <div class="col-sm-3">
                        <select name="role" class="form-control" readonly>
                            <option value='0' {{$user->role === 0 ? 'selected' : ''}}>Thành viên</option>
                            <option value="1" {{$user->role === 1 ? 'selected' : ''}}>Admin</option>
                        </select>
                    </div>
                <div class="col-sm-2"></div>
                <label for="inputEmail3" class="col-sm-1 col-form-label">Hình ảnh</label>
                    <div class="col-sm-3">
                        <input type="file" class="form-control" name = "thunbar" onchange="readURL(this);">
                        <br/>
                        <img id="blah" src={{'admin_image/'.$user->thunbar}} alt="your image" width='150px' height='200px'/>
                    </div>      
            </div>
            <textarea rows="3" cols="119" placeholder="Nhập mô tả về bản thân" name = "description" id = "description">{{$user->description}}</textarea>
            <a type="button" href = "admin/users/list" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Trở về</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Lưu</button>
        </form>
    </div>
    <div class="col-md-2"></div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection