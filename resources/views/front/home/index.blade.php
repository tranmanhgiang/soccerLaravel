@extends('front.layouts.index')
@section('content')

@if(session('success'))
    <div class="alert alert-success mb-0">
        {{session('success')}}
    </div>
@endif

<section class="hero-section set-bg" data-setbg="front_asset/img/hero/hero-2.jpg">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hs-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hs-text">
                                    <h4>QUẢN LÝ SÂN, TÌM ĐỐI GIAO LƯU, ĐẶT SÂN TRỰC TUYẾN</h4>
                                    <h2>Hoàn toàn miễn phí</h2>
                                    @if(Auth::check())
                                    @else
                                        <a href="front/login" class="primary-btn explore">Tìm hiểu ngay</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection