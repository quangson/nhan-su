@extends('Admin._layouts.default')
@section('title', 'Nhân viên - danh sách')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nhân viên - danh sách</h1>
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
                            {{-- <form class="form-inline" action="{{ route('timekeepPersonnal.show') }}" method="get">
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request()->has('search') ? request()->input('search') : '' }}">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                            </form> --}}


                            <form class="form-inline" action="{{ route('timekeepPersonnal.show') }}" method="get">
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request()->has('search') ? request()->input('search') : '' }}">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                
                            </form>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                               
                                    <th>Tên Nhân viên</th>
                                    <th>Khoa/Phòng</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                         
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->group->name }}</td>
                                        <td>
                                            <div class="">
                                                <a class="btn btn-primary d-inline-block btn-sm mt-1" href="{{ route('timekeepPersonnal.list', $employee->id) }}">Danh sách chấm công</a>
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

            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#example2 tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
            $('#search-btn').on('click', function() {
                ar searchTerm = $('#search').val().toLowerCase();
                ('.searchable-item').each(function() {
                    if ($(this).text().toLowerCase().indexOf(searchTerm) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                );
                });
                ;
            });
    </script>

@endpush
