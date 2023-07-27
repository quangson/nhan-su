@extends('Personal._layouts.default')
@section('title', 'Thông tin ngày nghỉ')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin ngày nghỉ</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="/assets/img/Logo.jpeg" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">{{ $employee->name }}</h3>
                                    <p class="text-muted text-center">{{ config('constant.gender_name.'.$employee->gender) }}</p>
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <b>Số ngày phép đã sử dụng</b> <a class="float-right">{{ $employee->dayoff_remain_this_year }}</a>             
                                            </div>
                                        </div>
                                        <div class="col-md-4 offset-md-4">
                                            <div class="form-group">
                                                <b>Số ngày phép còn lại của năm</b> <a class="float-right">{{ $employee->dayoffs->Annual_Leave }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <b>Số ngày bù đã sử dụng của tháng</b> <a class="float-right">{{ $employee->day_bu_remain_this_year }}</a>
                                            </div>
                        
                        
                                        </div>
                                        <div class="col-md-4 offset-md-4">
                                            <div class="form-group">
                                            <b>Số ngày bù còn lại của tháng</b> <a class="float-right">{{ $employee->dayoffs->Compensatory_Day }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <b>Số ngày đã nghỉ ốm</b> <a class="float-right">{{ $employee->dayoffs->sick_leave}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 offset-md-4">
                                            <div class="form-group">
                                            <b>Số ngày đã nghỉ không lương</b> <a class="float-right">{{ $employee->dayoffs->unpaid_leave}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <b>Số ngày đã nghỉ đi học</b> <a class="float-right">{{ $employee->dayoffs->school_leave}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 offset-md-4">
                                            <div class="form-group">
                                            <b>Số ngày đã nghỉ chế độ</b> <a class="float-right">{{ $employee->dayoffs->regime_leave}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <b>Số ngày đã nghỉ</b> <a class="float-right">{{ $employee->dayoffs->leave}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 offset-md-4">
                                            <div class="form-group">
                                            <b>Số ngày đã nghỉ không phép</b> <a class="float-right">{{ $employee->dayoffs->not_leave}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function () {

            $( "#submit-form" ).click(function() {
                $( "#timekeep-form" ).submit();
            });

            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
