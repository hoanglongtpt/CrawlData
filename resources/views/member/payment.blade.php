@extends('layouts.master_layout')
@section('content')
    <section class="container-fluid">
        <div class="payment-method-list">
            {{-- <div class="payment-method-item">
                <img src="{{asset('assets-theme/img/payment-methods/momo.png')}}" width="40px" height="40px">
                <span>Nạp xu bằng ví điện tử momo</span>
            </div> --}}
            <a href="{{ route('checkout')}}">
                <div class="payment-method-item" >
                    <img src="{{asset('assets-theme/img/payment-methods/banking.svg')}}" width="40px" height="40px">
                    <span>Nạp xu bằng tài khoản ngân hàng</span>
                </div>
            </a>
            {{-- <div class="payment-method-item">
                <img src="{{asset('assets-theme/img/payment-methods/voucher.svg')}}" width="40px" height="40px">
                <span>Nạp xu bằng mã khuyến mãi</span>
            </div> --}}
        </div>
    </section>
@endsection
