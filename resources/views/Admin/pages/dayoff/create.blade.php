@extends('Admin._layouts.default')
@section('title', 'Dayoff - thêm mới')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ngày nghỉ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-index') }}"></a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->


                        <form id="group-create-form" action="{{ route('dayoff.store') }}" method="post" class="h-adr">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">ID nhân viên</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="ID nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số ngày phép</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Số ngày nghỉ">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số ngày bù</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Số ngày nghỉ">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>


                            
                        
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
