@extends('Admin._layouts.default')
@section('title', 'Khoa/Phòng - chỉnh sửa')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Khoa/Phòng</h1>
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
                        <form id="group-create-form" action="{{ route('group.update', $group->id) }}" method="post" class="h-adr">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Tên Khoa/Phòng</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $group->name) }}" placeholder="Tên Khoa/Phòng">
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
