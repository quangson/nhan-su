@extends('Personal._layouts.default')
@section('title', 'aaa')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sach cham cong Phong</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form method="GET" action="{{ route('personal-list-time-keep', session()->get('personal_login')) }}" style="display: flex">
                    <div class="form-group mr-2">
                        <label for="day">Ngày:</label>
                        <input type="number" name="day" id="day" min="1" max="31" placeholder="Ngày" value="{{ request()->has('day') ? request()->input('day') : '' }}" required>
                    </div>
                    <div class="form-group mr-2">
                        <label for="month">Tháng:</label>
                        <input type="number" name="month" id="month" min="1" max="12" placeholder="Tháng" value="{{ request()->has('month') ? request()->input('month') : '' }}" required>
                    </div>
                    <div class="form-group mr-2">
                        <label for="year">Năm:</label>
                        <input type="number" name="year" id="year" min="1900" max="2099" placeholder="Năm" value="{{ request()->has('year') ? request()->input('year') : '' }}" required>
                    </div>
                    <div class="form-group mr-2">
                        <button type="submit">Tìm kiếm</button>
                    </div>
                </form>

                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Tên Nhân viên</th>
                                    <th>Khoa/Phòng</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($employees))
                                                                    <form id='timekeep-form' action="{{ route('timekeep-update-status') }}" method="post">
                                    @csrf
                                    <div>
                                        @foreach($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->group->name }}</td>
                                                <td>{{ config('constant.timekeep_status.'.$employee->time_keep_today) }}</td>
                                            </tr>
                                        @endforeach
                                    </div>
                                                                    </form>
                                @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </section>
@endsection
{{--@push('scripts')--}}
{{--    <!-- DataTables  & Plugins -->--}}
{{--    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>--}}
{{--    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>--}}
{{--    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>--}}
{{--    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>--}}
{{--    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>--}}
{{--    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>--}}
{{--    <script src="../../plugins/jszip/jszip.min.js"></script>--}}
{{--    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>--}}
{{--    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>--}}
{{--    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>--}}
{{--    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>--}}
{{--    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>--}}
{{--    <script>--}}
{{--        $(function () {--}}

{{--            $( "#submit-form" ).click(function() {--}}
{{--                $( "#timekeep-form" ).submit();--}}
{{--            });--}}

{{--            $("#example1").DataTable({--}}
{{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]--}}
{{--            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');--}}
{{--            $('#example2').DataTable({--}}
{{--                "paging": false,--}}
{{--                "lengthChange": false,--}}
{{--                "searching": false,--}}
{{--                "ordering": true,--}}
{{--                "info": true,--}}
{{--                "autoWidth": false,--}}
{{--                "responsive": true,--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
