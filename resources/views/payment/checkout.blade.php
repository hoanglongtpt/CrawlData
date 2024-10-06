@extends('layouts.master_layout')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="content-container">
            <div class="form-container">
                <form action="{{ route('createPaymentLink') }}" method="POST">
                    @csrf
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="form-group green-border-focus">
                                <label class="sub-header">Nhập số tiền muốn nạp (VND)</label>
                                <input type="number" name="amount" class="form-control" rows="5">
                                @if ($errors->has('amount'))
                                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button class="btn btn-lg btn-outline-warning btn-getlink" type="submit"
                                    >
                                    <img class="" width="30px" height="30px"
                                        src="{{ asset('assets-theme/img/get-link-icon.svg') }}">
                                    <span class="text">Tạo Link thanh toán</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



