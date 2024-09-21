@extends('admin.layouts.master')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Người dùng</h4>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="scroll-horizontal-preview" role="tabpanel">
                                        <div id="scroll-horizontal-datatable_wrapper"
                                            class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="row mt-3">
                                                <div class="col-sm-12 col-md-6 customcol-flex-end">
                                                    <div class="dataTables_length" id="scroll-horizontal-datatable_length">
                                                        <label class="form-label custom-form-label"><select
                                                                name="scroll-horizontal-datatable_length"
                                                                aria-controls="scroll-horizontal-datatable"
                                                                class="form-select form-select-sm custom-w-sl" fdprocessedid="l00zwg">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> <span class="ms-2"></span></label></div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="scroll-horizontal-datatable_filter" class="dataTables_filter">
                                                        <label>Tìm:<input type="search"
                                                                class="form-control form-control-sm" placeholder=""
                                                                aria-controls="scroll-horizontal-datatable"></label></div>
                                                </div>
                                            </div>
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
                                                                        <th>1</th>
                                                                        <th>2</th>
                                                                        <th>3</th>
                                                                        <th>4</th>
                                                                        <th>5</th>
                                                                        <th>6</th>
                                                                        <th>7</th>
                                                                        <th>8</th>
                                                                        <th>9</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">Airi</td>
                                                                        <td>Satou</td>
                                                                        <td>Accountant</td>
                                                                        <td>Tokyo</td>
                                                                        <td>33</td>
                                                                        <td>2008/11/28</td>
                                                                        <td>$162,700</td>
                                                                        <td>5407</td>
                                                                        <td>a.satou@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">Angelica</td>
                                                                        <td>Ramos</td>
                                                                        <td>Chief Executive Officer (CEO)</td>
                                                                        <td>London</td>
                                                                        <td>47</td>
                                                                        <td>2009/10/09</td>
                                                                        <td>$1,200,000</td>
                                                                        <td>5797</td>
                                                                        <td>a.ramos@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">Ashton</td>
                                                                        <td>Cox</td>
                                                                        <td>Junior Technical Author</td>
                                                                        <td>San Francisco</td>
                                                                        <td>66</td>
                                                                        <td>2009/01/12</td>
                                                                        <td>$86,000</td>
                                                                        <td>1562</td>
                                                                        <td>a.cox@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">Bradley</td>
                                                                        <td>Greer</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>London</td>
                                                                        <td>41</td>
                                                                        <td>2012/10/13</td>
                                                                        <td>$132,000</td>
                                                                        <td>2558</td>
                                                                        <td>b.greer@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">Brenden</td>
                                                                        <td>Wagner</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>San Francisco</td>
                                                                        <td>28</td>
                                                                        <td>2011/06/07</td>
                                                                        <td>$206,850</td>
                                                                        <td>1314</td>
                                                                        <td>b.wagner@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">Brielle</td>
                                                                        <td>Williamson</td>
                                                                        <td>Integration Specialist</td>
                                                                        <td>New York</td>
                                                                        <td>61</td>
                                                                        <td>2012/12/02</td>
                                                                        <td>$372,000</td>
                                                                        <td>4804</td>
                                                                        <td>b.williamson@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">Bruno</td>
                                                                        <td>Nash</td>
                                                                        <td>Software Engineer</td>
                                                                        <td>London</td>
                                                                        <td>38</td>
                                                                        <td>2011/05/03</td>
                                                                        <td>$163,500</td>
                                                                        <td>6222</td>
                                                                        <td>b.nash@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">Caesar</td>
                                                                        <td>Vance</td>
                                                                        <td>Pre-Sales Support</td>
                                                                        <td>New York</td>
                                                                        <td>21</td>
                                                                        <td>2011/12/12</td>
                                                                        <td>$106,450</td>
                                                                        <td>8330</td>
                                                                        <td>c.vance@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">Cara</td>
                                                                        <td>Stevens</td>
                                                                        <td>Sales Assistant</td>
                                                                        <td>New York</td>
                                                                        <td>46</td>
                                                                        <td>2011/12/06</td>
                                                                        <td>$145,600</td>
                                                                        <td>3990</td>
                                                                        <td>c.stevens@datatables.net</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">Cedric</td>
                                                                        <td>Kelly</td>
                                                                        <td>Senior Javascript Developer</td>
                                                                        <td>Edinburgh</td>
                                                                        <td>22</td>
                                                                        <td>2012/03/29</td>
                                                                        <td>$433,060</td>
                                                                        <td>6224</td>
                                                                        <td>c.kelly@datatables.net</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="scroll-horizontal-datatable_info"
                                                        role="status" aria-live="polite">Showing 1 to 10 of 57 entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="scroll-horizontal-datatable_paginate">
                                                        <ul class="pagination pagination-rounded">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="scroll-horizontal-datatable_previous"><a
                                                                    href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="0" tabindex="0" class="page-link"><i
                                                                        class="mdi mdi-chevron-left"></i></a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="1" tabindex="0"
                                                                    class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="2" tabindex="0"
                                                                    class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="3" tabindex="0"
                                                                    class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="4" tabindex="0"
                                                                    class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="5" tabindex="0"
                                                                    class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="6" tabindex="0"
                                                                    class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="scroll-horizontal-datatable_next"><a href="#"
                                                                    aria-controls="scroll-horizontal-datatable"
                                                                    data-dt-idx="7" tabindex="0" class="page-link"><i
                                                                        class="mdi mdi-chevron-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection
