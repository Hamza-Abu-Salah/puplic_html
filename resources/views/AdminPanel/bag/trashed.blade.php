@extends('AdminPanel._layout')
@push('css')
    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css"/>
          <style>
            .btn-group, .btn-group-vertical {
                direction: rtl;
                /* width: 64px; */
                display: inline;
            }

            .btn-group>.btn-group:not(:first-child)>.btn, .btn-group>.btn:not(:first-child) {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
                padding: 8px;
            }

            .btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
                padding: 8px;
            }
          </style>
@endpush
@section('title', 'الحقب الزمنية المحذوفة')
@section('subtitle', 'الحقب الزمنية المحذوفة')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <p class="card-title-desc"> جميع الحقب المحذوفة
                    </p>
                    <h4 class="card-title">
                        <a href="{{ Route('bag.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>
                        <a href="{{ Route('bag.index') }}" class="btn btn-info"><i class="fas fa-home"></i></a>
                    </h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <td>#</td>
                            <th>اسم الحقبة</th>
                            <th>انشاْت بواسطة</th>
                            <th>العملية</th>
                        </tr>
                        </thead>


                        <tbody>
                        @php
                        $counter = 1;
                        @endphp
                            @foreach($bags as $b)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $b->name }}</td>
                                    <td>{{ $b->user->name }}</td>
                                    <td>
                                         <a href="{{ Route('bag.forcedelete',$b->id) }}" onclick="return confirm(' هل انت متأكد من العملية ؟');" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                                         <a href="{{ Route('bag.restore',$b->id) }}" class="btn btn-warning btn-xs"><i class="fas fa-reply-all"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@push('js')
    <!-- Required datatable js -->
    <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endpush
