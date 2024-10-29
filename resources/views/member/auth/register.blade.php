@extends('member.auth.auth_master')
@section('content')
<section class="login-container">
        <div class="login-card">
            <div class="side img-side">
                <img class="login-img"  src="{{asset('assets-theme/img/login.jpg')}}">
            </div>
            <div class="side login-side">
                <div class="logo">
                    <img src="{{ asset('assets-theme/img/logogetlink.png') }}" width="100" height="40" alt="">
                </div>
                <div class="login-wrapper">
                    <div class="login-text">Đăng ký</div>
                    <form action="{{route('member.postRegister')}}"  class="user" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control-login"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Nhập email của bạn">
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control-login"
                                id="name" placeholder="Nhập Tên của bạn">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control-login"
                                id="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group submit-group">
                            <button  type="submit" class="login-btn register-btn">Đăng Ký</button>
                        </div>
                        <hr class="divider">
                        <a href="index.html" class="btn btn-google btn-user btn-block social-btn">
                            <img width="24px" height="24px" src="{{asset('assets-theme/img/google.svg')}}">
                            Đăng nhập bằng Google
                        </a>
                        <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block social-btn">
                            <img width="24px" height="24px" src="{{asset('assets-theme/img/facebook.svg')}}">
                            Đăng nhập bằng Facebook
                        </a> -->
                    </form>
                    <div class="policy-group">
                        <p>Chính sách bảo mật</p>
                        <span>|</span>
                        <span class="hotline-text">Hotline:058.789.6799</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
