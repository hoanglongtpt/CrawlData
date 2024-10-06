@extends('admin.layouts.master')
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Giao dịch</h4>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="scroll-horizontal-preview" role="tabpanel">
                                    <div id="scroll-horizontal-datatable_wrapper"
                                        class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <form action="{{route('transaction.index')}}" class="mt-5 custom-form-search-admin d-flex" method="GET">
                                            <a href="{{route('user.create')}}" class="form-control btn btn-primary custom-btn-add-new">Thêm mới</a>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ request()->get('email') }}">
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="name" class="form-control" placeholder="Tên" value="{{ request()->get('name') }}">
                                                </div>
                                                <div class="col">
                                                    <select class="form-control" name="status" value="{{ request()->get('status') }}">
                                                        <option value="">Trạng thái</option>
                                                        <option value="1">{{ App\Constants\Constants::VERIFIED_TRANSACTION_STATUS }}</option>
                                                        <option value="2">{{ App\Constants\Constants::UNVERIFIED_TRANSACTION_STATUS }}</option>
                                                        <option value="0">{{ App\Constants\Constants::INVALID_TRANSACTION_STATUS }}</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <input type="date" name="transactionDate" class="form-control" value="{{ request()->get('transactionDate') }}">
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="form-control btn btn-primary custom-btn-search">Tìm</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="dataTables_scroll">
                                                    <div class="dataTables_scrollBody"
                                                        style="position: relative; overflow: auto; width: 100%;">
                                                        <table id="scroll-horizontal-datatable"
                                                            class="table table-striped w-100 nowrap dataTable no-footer"
                                                            aria-describedby="scroll-horizontal-datatable_info"
                                                            style="width: 1141px;">
                                                            <thead>
                                                                <tr style="height: 0px;">
                                                                    <th>No.</th>
                                                                    <th>Tên</th>
                                                                    <th>Email</th>
                                                                    <th>Số lượng</th>
                                                                    <th>Tổng tiền</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Tải xuống trang</th>
                                                                    <th>Ngày giao dịch</th>
                                                                    <!-- <th class="th-action">Thao Tác</th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($transactionList as $item)
                                                                <tr class="odd">
                                                                    <td>{{$item->id}}</td>
                                                                    <td class="sorting_1">{{$item->member->name}}</td>
                                                                    <td>{{$item->member->email}}</td>
                                                                    <td>{{$item->quantity}}</td>
                                                                    <td>{{$item->amount}}</td>
                                                                    @if ($item->status == 1)
                                                                    <td class="sorting_1">
                                                                        <i class="mdi mdi-circle text-success"></i>
                                                                        {{ App\Constants\Constants::VERIFIED_TRANSACTION_STATUS }}
                                                                    </td>
                                                                    @elseif ($item->status == 2)
                                                                    <td>
                                                                        <i class="mdi mdi-circle text-warning"></i>
                                                                        {{ App\Constants\Constants::UNVERIFIED_TRANSACTION_STATUS }}
                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <i class="mdi mdi-circle text-danger"></i>
                                                                        {{ App\Constants\Constants::INVALID_TRANSACTION_STATUS }}
                                                                    </td>
                                                                    @endif
                                                                    <td>{{$item->pageDowload->name ?? ''}}</td>
                                                                    <td>{{$item->created_at}}</td>
                                                                    <!-- <td>
                                                                        <div class="dropdown">
                                                                            <a href="#" class="dropdown-toggle arrow-none card-drop show" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="mdi mdi-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 31px);" data-popper-placement="bottom-end">
                                                                                <a href="{{route('transaction.show',[$item->id])}}" class="dropdown-item">xem</a>
                                                                                <a href="{{route('transaction.edit',[$item->id])}}" class="dropdown-item">Sửa</a>
                                                                                <a href="javascript:void(0);" class="dropdown-item" onclick="{{'confirmDelete('.$item->id.')'}}">Xóa</a>
                                                                                <form id="{{'deleteForm-'.$item->id}}" action="{{ route('transaction.destroy',['id' => $item->id ]) }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </td> -->
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <x-pagination :items="$transactionList" />
                                    </div>
                                </div> <!-- end preview-->

                                <div class="tab-pane code" id="scroll-horizontal-code" role="tabpanel">
                                    <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                    <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"scroll-horizontal-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table w-100 nowrap"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>First name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Last name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Extn.<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>E-mail<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>5421<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>t.nixon@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>8422<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>g.winters@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                            </pre> <!-- end highlight-->
                                </div> <!-- end preview code-->
                            </div> <!-- end tab-content-->

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <!-- Footer Start -->
    @include('admin.includes.footer')

    <!-- end Footer -->

</div>
<script>
    function confirmDelete(id) {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            document.getElementById('deleteForm-' + id).submit();
        }
    }
</script>
@endsection