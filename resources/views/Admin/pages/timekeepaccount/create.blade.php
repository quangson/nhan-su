@extends('Admin._layouts.default')
@section('title', 'Tài khoản - thêm mới')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài khoản</h1>
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
                        <form id="group-create-form" action="{{ route('timekeepaccount.store') }}" method="post" class="h-adr">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group @if($errors->get('Khoa/Phòng')) has-error @endif">
                                            <label for="group_id"> Khoa/Phòng <span class="text-danger">*</span></label>
                                                <select name="group_id" class="form-control" required>
                                                    @foreach($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                            @if($errors->has('group_id'))
                                                <small class="text-danger">{{ $errors->first('group_id') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account">ID<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="account" name="account" value="{{ old('account') }}" placeholder="ID">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pass">Mật khẩu<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="pass" name="pass" value="{{ old('pass') }}" placeholder="Mật khẩu">
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
