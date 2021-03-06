@extends('front.layouts.index')
@section('content')
<section class="breadcrumb-section set-bg" data-setbg="front_asset/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bs-text">
                    <h2>Quản lý thông tin</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="hero-section set-bg">
    <div class = "container options" style = "margin-top:20px;">
    
        <div class="tab">
        <button class="tablinks" onclick="display_info(event, 'user_info')" id="defaultOpen">
            <i class="fa fa-user"></i>
            <a> Thông tin cá nhân</a>
        </button>
        <button class="tablinks" onclick="display_info(event, 'info_edit')">
            <i class="fa fa-pencil"></i>
            <a> Chỉnh sửa thông tin</a>
        </button>
        </div>
   

<div id="user_info" class="profile-content">
    <p class = "info_text">Thông tin cá nhân</b></p>
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="admin_image/{{$user->thunbar}}" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                {{$user->firstName . ' ' .$user->lastName}}
            </div>
            <div class="profile-usertitle-job">
                Đội trưởng
            </div>
        </div>
    </div>
    <p><b>Họ tên</b>: {{$user->firstName . ' ' .$user->lastName}}</p>
    <p><b>Email</b>: {{$user->email}}</p>
    <p><b>Email</b>: {{'0'.$user->phone}}</p>
    <p><b>Mô tả bản thân</b>: {{$user->description}}</p>
</div>

<div id="info_edit" class="profile-content" style = "display: none;">
    <p class = "info_text">Chỉnh sửa thông tin cá nhân</p>
    <form action="" method = "POST">
        <div class = "row form-group" style = "margin-top:20px; ">
            <div class="col-sm-1 col-md-1"></div>
            <label for="name_change" class="col-sm-2 col-md-2"> Họ:</label>
            <input type = "text"  class="col-sm-3" name="firstName" value="{{$user->firstName}}">
        </div>
        <div class = "row form-group" style = "margin-top:20px; ">
            <div class="col-sm-1 col-md-1"></div>
            <label for="name_change" class="col-sm-2 col-md-2"> Tên:</label>
            <input type = "text"  class="col-sm-3" name="lastName" value="{{$user->lastName}}">
        </div>
        <div class = "row form-group" style = "margin-top:20px; ">
            <div class="col-sm-1 col-md-1"></div>
            <label for="name_change" class="col-sm-2 col-md-2"> Email:</label>
            <input type = "email"  class="col-sm-3" name="email" value="{{$user->email}}">
        </div>
        <div class = "row form-group" style = "margin-top:20px; ">
            <div class="col-sm-1 col-md-1"></div>
            <label for="name_change" class="col-sm-2 col-md-2"> SDT:</label>
            <input type = "text"  class="col-sm-3" name="phone" value="{{'0'.$user->phone}}">
        </div>
        <div class="row form-group">
            <div class="col-sm-1 col-md-1"></div>
            <label for="inputEmail3" class="col-sm-2 col-md-2">Hình ảnh</label>
            {{-- <input type="file" class="col-sm-6" id="inputEmail3" name = "thunbar"> --}}
            <input type="file" class="col-sm-4" name = "thunbar" onchange="readURL(this);">
            <br/>
            <img id="blah" src="admin_image/{{$user->thunbar}}" alt="your image" width='100px' height='100px'/>
        </div>
        <div class = "row form-group">
            <div class="col-sm-1 col-md-1"></div>
            <label for="description" class="col-sm-2 col-md-2"> Mô tả về bản thân</label>
            <textarea id = "description" class="col-sm-6" style ="height:100px;" name="description">{{$user->description}}</textarea>
        </div>
        <button type = "button" class = "btn btn-success" style = "margin:0 20px;">Thay đổi</button>
    </form>
</div>

</div>
</section>
@endsection

@section('script')
    <script>
        function display_info(evt, info) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("profile-content");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
            }
            document.getElementById(info).style.display = "block";
            evt.currentTarget.className += "active";
        }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
    </script>
@endsection
