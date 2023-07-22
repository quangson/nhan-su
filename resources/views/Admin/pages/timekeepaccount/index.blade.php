@extends('Admin._layouts.default')
@section('title', 'Tài khoản chấm công - danh sách')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài khoản chấm công- danh sách</h1>
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
                                    <th>Tên khoa/phòng</th>
                                    <th>ID</th>
                                    <th>Pass</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                          
                                @foreach($timekeepaccounts as $timekeepaccount)
                                    <tr>
                                        <td>{{ $timekeepaccount->group->name }}</td>
                                        <td>{{ $timekeepaccount->account }}</td>
                                        <td>{{ $timekeepaccount->pass }}</td>
                                        
                                        <td>
                                            <div class="">
                                                <a class="btn btn-primary d-inline-block btn-sm mt-1" href="{{ route('timekeepaccount.edit', $timekeepaccount->id) }}">Chỉnh sửa</a>
                                                <a class="btn btn-primary d-inline-block btn-sm mt-1" href="{{ route('timekeepaccount.delete', $timekeepaccount->id) }}">Xóa</a>
                                         
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                 
                                    
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
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
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
