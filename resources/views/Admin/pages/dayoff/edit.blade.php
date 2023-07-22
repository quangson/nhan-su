@extends('Admin._layouts.default')
@section('title', 'Ngày nghỉ -  chỉnh sửa')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ngày nghỉ</h1>
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
                            <h3 class="card-title">Chỉnh sửa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="group-create-form" action="{{ route('dayoff.update', $dayoff->id) }}" method="post" class="h-adr">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">ID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="id" value="{{ old('id', $dayoff->id) }}" placeholder="Nhân viên Id">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name">Nhân viên <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dayoff->employee->name) }}" placeholder="Nhân viên Id">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name">Ngày phép <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="Annual_Leave" value="{{ old('Annual_Leave', $dayoff->Annual_Leave) }}" placeholder="Nhân viên Id">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Ngày bù<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="Compensatory_Day" value="{{ old('Compensatory_Day', $dayoff->Compensatory_Day) }}" placeholder="Nhân viên Id">
                                        </div>
                                    </div>
                                    
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
