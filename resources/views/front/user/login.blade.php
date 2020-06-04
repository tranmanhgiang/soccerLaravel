@extends('front.layouts.index')
@section('content')

<section class="hero-section set-bg" data-setbg="front_asset/img/hero/hero-1.jpg">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-3 col-sm-6 col-xs-12 row-container">
            <form action="front/login" method = "POST">
              @csrf
                <h2 class="title">ĐĂNG NHẬP</h2>
                @if(session('fail'))
                  <div class="alert alert-danger">
                    {{session('fail')}}
                  </div>
                @endif
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" autofocus >
                  @if(count($errors) > 0)
                    @foreach ($errors->get('email') as $err)
                        <div style="color:red">
                          {{$err}}<br/>
                        </div>
                    @endforeach
                  @endif
                </div>
                <div class="form-group">
                  <label for="password">Mật khẩu</label>
                  <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                </div>
                @if(count($errors) > 0)
                  @foreach ($errors->get('password') as $err)
                      <div style="color:red">
                        {{$err}}<br/>
                      </div>
                  @endforeach
                @endif
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <div>Bạn chưa có tài khoản? <a href="front/regist">Đăng ký >></a></div>
            </form>
          </div>
        </div>
      </div>
</section>

@endsection