@extends('layouts.master_layout')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="content-container">
            <div class="form-container">
                <form action="{{ route('download.' . $page_item->type) }}" method="POST">
                    @csrf
                    <input type="hidden" name ="type" value="{{$page_item->type}}" />
                    <div class="card shadow mb-4">

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold header-text">Getlink {{ $page_item->name }} giá siêu rẻ chỉ
                                {{ $page_item->amount }}.000 đồng</h6>
                        </div>

                        <div class="card-body">
                            <div class="form-group green-border-focus">
                                <label class="sub-header">Dán link {{ $page_item->name }} vào ô bên dưới và nhấn nút
                                    getlink:</label>
                                <textarea class="form-control" name="link" id="link" rows="5"></textarea>
                            </div>
                            <div style="text-align: center;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id ="resource" type="radio" name="option" value="resource" checked="">
                                    <label class="form-check-label" for = "resource">
                                        Image/Template - 1xu
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id ="icon" type="radio" name="option" value="icon">
                                    <label class="form-check-label" for = "icon">
                                        Icon - 1xu
                                    </label>
                                </div>
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button class="btn btn-lg btn-outline-warning btn-getlink" type="submit"
                                    id="getlink_btn_freepik">
                                    <img class="" width="30px" height="30px"
                                        src="{{ asset('assets-theme/img/get-link-icon.svg') }}">
                                    <span class="text">GETLINK</span>
                                </button>
                                <button type="button" class="btn btn-lg btn-outline-warning btn-getlink" id="reset_btn">
                                    <img class="" width="30px" height="30px"
                                        src="{{ asset('assets-theme/img/reset-icon.svg') }}">
                                    <span class="text">RESET</span>
                                </button>
                            </div>
                            {{-- <div id="flashmessage" class="submit-warning border-warning">
                                <p class="warning-text">Oops! Vui lòng nhập link pikbest</p>
                                <button class="warning-text btn-close">&#x2715;</button>
                            </div>
                            <div id="flashmessage" class="submit-warning border-error">
                                <p class="error-text">Oops! Bạn chưa đăng nhập</p>
                                <button class="error-text btn-close">&#x2715;</button>
                            </div> --}}
                            @if (isset($url))
                                <div id="result" class="result-container">
                                    <div class="flex justify-center download-box  border-b-dashed">
                                        <img class="download-img" src="{{ asset('assets-theme/img/folder-download.png') }}">
                                    </div>
                                    <div class="download-box border-b-dashed flex flex-col items-center gap-2">
                                        <button class="result-link">{{$page_item -> name  }}_{{$id}}</button>
                                        <a type="button" href={{$url }} class="result-download">DOWNLOAD</a>
                                    </div>
                                    <div class="border-b-dashed flex justify-center report-link">Báo link download hỏng hoặc gặp
                                        sự cố?</div>
                                </div>
                            @endif

                            <!-- <div id="loadingbar" class="form-group">
                                            <h4 class="small font-weight-bold"><span id="title_loadingbar"></span><span
                                                    id="percent_loadingbar" class="float-right"></span></h4>
                                            <div class="progress mb-4">
                                                <div id="style_loadingbar" class="progress-bar bg-info" role="progressbar" style="width: 0%"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div> -->
                            <!-- <div class="m-separator m-separator--dashed"></div> -->
                            <div class="form-group mt-8">
                                <label>Định dạng hỗ trợ:
                                    <img class="format-file-img" src="{{ asset('assets-theme/img/format-list.svg') }}">
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="feedback-group">
                    <label class="feedback-text">Bạn muốn tải file từ trang web nào nữa hãy cho chúng tôi biết?</label>
                    <textarea class="form-control" id="" rows="2"></textarea>
                    <button class="send-btn">Gửi</button>
                </div>
            </div>
            <div class="banner-container">
                <img class="banner-home" src="{{ asset('assets-theme/img/login.jpg') }}">
                <!-- <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Khuyến mãi đang diễn ra</h6>
                            </div>
                            <div class="card-body">
                                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                    CSS bloat and poor page performance. Custom CSS classes are used to create
                                    custom components and custom utility classes.</p>
                                <p class="mb-0">Before working with this theme, you should become familiar with the
                                    Bootstrap framework, especially the utility classes.</p>
                            </div>
                        </div> -->
            </div>
        </div>
    </div>
@endsection
