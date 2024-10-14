@extends('layouts.master_layout')
@section('content')
    <style>
        .spinner-border {
            display: none;
        }
    </style>
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="content-container">
            <div class="form-container">
                <form action="{{ route('download.' . $page_item->type) }}" method="POST">
                    @csrf
                    <input type="hidden" name ="type" value="{{ $page_item->type }}" />
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
                                    <input class="form-check-input" id ="resource" type="radio" name="option"
                                        value="resource" checked="">
                                    <label class="form-check-label" for = "resource">
                                        Image/Template - 1bit
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id ="icon" type="radio" name="option"
                                        value="icon">
                                    <label class="form-check-label" for = "icon">
                                        Icon - 1bit
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="spinner-border text-warning" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
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
                            </div> --}}
                            <div id="flashmessage" class="submit-warning border-error" style="display:none;">
                                <p class="error-text"></p>
                            </div>
                            <div id="wp-result">
                            </div>
                            {{-- @if (isset($url))
                                <div id="result" class="result-container">
                                    <div class="flex justify-center download-box  border-b-dashed">
                                        <img class="download-img" src="{{ asset('assets-theme/img/folder-download.png') }}">
                                    </div>
                                    <div class="download-box border-b-dashed flex flex-col items-center gap-2">
                                        <button class="result-link">{{$page_item ->name}}_{{$id}}</button>
                                        <a type="button" href={{$url}} class="result-download">DOWNLOAD</a>
                                    </div>
                                    <div class="border-b-dashed flex justify-center report-link">Báo link download hỏng hoặc gặp
                                        sự cố?</div>
                                </div>
                            @endif --}}

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


    <script>
        var pageItemType = "{{ $page_item->type }}";
        switch (pageItemType) {
            case 'freepik':
                var url = "{{ route('download.freepik') }}"
                break;
            case 'motion-array':
                var url = "{{ route('download.motion-array') }}"
                break;
            default:
                var url = "{{ route('download.envato') }}"
                break;
        }

        // Giá trị động mà bạn muốn thay thế
        $(document).ready(function() {
            $('#getlink_btn_freepik').click(function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của form

                $.ajax({
                    url: url, // URL để gửi request
                    type: "POST", // Phương thức gửi
                    data: $('form').serialize(), // Dữ liệu của form
                    beforeSend: function() {
                        // Hiển thị spinner trước khi gửi yêu cầu
                        $('.spinner-border').show();
                    },
                    success: function(response) {
                        // Xử lý dữ liệu trả về
                        if (response.url) {
                            $('#wp-result').html(`
                        <div id="result" class="result-container">
                            <div class="flex justify-center download-box border-b-dashed">
                                <img class="download-img" src="{{ asset('assets-theme/img/folder-download.png') }}">
                            </div>
                            <div class="download-box border-b-dashed flex flex-col items-center gap-2">
                                <button class="result-link">${response.page_item.name}_${response.id}</button>
                                <a type="button" href="${response.url}" class="result-download">DOWNLOAD</a>
                            </div>
                            <div class="border-b-dashed flex justify-center report-link">Báo link download hỏng hoặc gặp sự cố?</div>
                        </div>
                    `);
                            $('#flashmessage').hide(); // Ẩn thông báo lỗi nếu có
                        } else {
                            $('#flashmessage .error-text').text(
                            'Không có URL nào được trả về.');
                            $('#flashmessage').show(); // Hiển thị thông báo lỗi
                        }
                    },
                    error: function(xhr) {
                        // Xử lý lỗi từ server
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            $('#flashmessage .error-text').text(xhr.responseJSON
                            .error); // Cập nhật thông báo lỗi
                        } else {
                            $('#flashmessage .error-text').text(
                                'Đã xảy ra lỗi khi gửi yêu cầu.'); // Lỗi chung
                        }
                        $('#flashmessage').show(); // Hiển thị thông báo lỗi
                    },
                    complete: function() {
                        // Ẩn spinner khi yêu cầu Ajax hoàn thành (thành công hoặc thất bại)
                        $('.spinner-border').hide();
                    }
                });
            });
        });
    </script>
@endsection
