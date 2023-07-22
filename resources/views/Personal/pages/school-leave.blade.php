@extends('Personal._layouts.default')
@section('title', 'Số nghỉ đi học')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Số nghỉ đi học</h1>
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

                            <table id="example2" class="table table-bordered table-hover">

                                <thead>
                                <tr>

                                    <th>Ngày</th>
                                    <th>Loại</th>
                                    {{-- <th>Lý do</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                <form id='timekeep-form' action="#" method="post">
                                    @csrf
                                    <div>
                                        @if (!empty($employee->timekeepStatuses))
                                            @foreach($employee->timekeepStatuses as $timekeepStatus)
                                            <tr>
                                                <td>{{ $timekeepStatus->created_at->toDateString() }}</td>
                                                <td>{{ config('constant.timekeep_status.'. $timekeepStatus->status)  }}</td>
                                                {{-- <td>

                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        @endif
                                    </div>


                                </form>

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
