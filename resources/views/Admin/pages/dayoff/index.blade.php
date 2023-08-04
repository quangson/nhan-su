
@extends('Admin._layouts.default')
@section('title', 'Ngày nghỉ - danh sách')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ngày nghỉ- danh sách</h1>
                </div>
                <form action="{{ route('dayoff.export-form') }}" method="post" class="d-inline-block">
                    @csrf
                    <button class="btn btn-primary d-inline-block" type="submit">Tải mẫu đăng ký tổng hợp phép</button>
                </form>
                <button type="button" class="btn btn-primary d-inline-block ml-3" data-toggle="modal" data-target="#importModal">
                    File đăng ký tổng hợp phép
                </button>
                <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('dayoff.import-register') }}" method="post" class="d-inline-block" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Excel Import</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="file">Chọn file Excel</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                    <button type="submit" class="btn btn-primary">Nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                        <th>ID</th>
                                        <th>Nhân viên</th>
                                        <th>Số phép</th>
                                        <th>Số bù</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dayoffs as $dayoff)
                                        <tr>
    
                                      
                                            <td>{{ $dayoff->id }}</td>
                                            <td>{{ $dayoff->employee->name }}</td>
                                            <td>{{ $dayoff->Annual_Leave}}</td>
                                            <td>{{ $dayoff->Compensatory_Day}}</td>
                                            <td>  
                                                <div class="">
                                                    <a class="btn btn-primary d-inline-block btn-sm mt-1" href="{{ route('dayoff.edit', $dayoff->id) }}">Chỉnh sửa</a>
                                                    <a class="btn btn-primary d-inline-block btn-sm mt-1" href="{{ route('dayoff.delete', $dayoff->id) }}">Xóa</a>
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
