@extends('member.auth.auth_master')
@section('content')
<section class="login-container">
        <div class="forgot-password-card">
                <div class="logo-wrapper">
                    <div class="logo">LOGO</div>
                </div>
                <div class="login-wrapper">
                    <div class="forgot-password-text">Quên mật khẩu</div>
                    <p>Bạn quên mật khẩu của mình? Đừng lo lắng! Hãy cung cấp cho chúng tôi email bạn. Chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn qua email đó.</p>
                    <form action="{{route('member.postLogin')}}"  class="user forgot-password-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="email-label">Địa chỉ email của bạn:</label>
                            <input type="email" name="email" class="form-control-login"
                                id="email" aria-describedby="emailHelp"
                                placeholder="email@example.com">
                        </div>
                        
                        <div class="form-group submit-group forgot-password-group">
                            <button  type="submit" href="index.html" class="forgot-password-btn">Lấy lại mật khẩu</button>
                        </div>                        
                    </form>
                </div>
            </div>
    </section>
@endsection
