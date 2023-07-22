@extends('User._layouts.default')
@section('title', 'Chấm công - danh sách')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chấm công - danh sách  ({{ $currentDate }})</h1>
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

                                    <th>Tên Nhân viên</th>
                                    <th>Khoa/Phòng</th>
                                    <th>Trạng thái</th>
                                    {{-- <th>Lý do</th> --}}
                                    {{-- <th></th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                <form id='timekeep-form' action="{{ route('timekeep-update-status') }}" method="post">
                                    @csrf
                                    <div>
                                        @foreach($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->group->name }}</td>
                                                <td>
                                                    <select name='timekeep_status[{{ $employee->id }}]'>
                                                        @foreach (\Config::get('constant.timekeep_status') as $key => $item)
                                                            <option value="{!! $key !!}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                 <td></td>
                                            </tr>
                                        @endforeach
                                    </div>
                                    {{-- <div>
                                        <button id='submit' class="btn btn-primary">Submit</button>
                                    </div> --}}
                                    
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-primary">Chấm công</button>
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

{{-- thêm vào --}}
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

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
