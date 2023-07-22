@extends('Admin._layouts.default')
@section('title', 'Nhân viên - thêm mới')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ route('admin-index') }}</a></li>
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
                        <form id="group-create-form" action="{{ route('employee.store') }}" method="post" class="h-adr">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Họ và tên <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Họ và tên">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @if($errors->get('email')) has-error @endif">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" value="{{ old('email') }}"
                                                   name="email" placeholder="abc@gmail.com"
                                                   data-parsley-type-message="{!! trans('shop.mail_address') !!}2を正しいメールアドレスにしてください。"/>
                                            @if($errors->has('email'))
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @if($errors->get('address')) has-error @endif">
                                            <label for="address">Địa chỉ <span class="text-danger">*</span></label>
                                            <input type="address" class="form-control" value="{{ old('address') }}"
                                                   name="address"/>
                                            @if($errors->has('address'))
                                                <small class="text-danger">{{ $errors->first('address') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Giới tính <span class="text-danger">*</span></label>
                                            @foreach(\Config::get('constant.gender_name') as $key => $gender)
                                                <div class="radio mr-2">
                                                    <input type="radio" name="gender" id="gender{{$key}}"
                                                           @if( $key == old('check_store_id') ) checked @endif value="{{ $key }}">
                                                    <label for="gender{{$key}}">{{ $gender }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                        <div class="form-group @if($errors->get('Chức vụ')) has-error @endif">
                                            <label for="position_id"> Chức vụ <span class="text-danger">*</span></label>
                                            <select name="position_id" class="form-control" required>
                                                @foreach(\Config::get('constant.position') as $key => $position)
                                                    <option value="{{ $key }}">{{ $position }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('group_id'))
                                                <small class="text-danger">{{ $errors->first('group_id') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @if($errors->get('phone')) has-error @endif">
                                            <label for="phone"> Số điện thoại <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="vd: 0905-000-000"/>
                                            @if($errors->has('phone'))
                                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="birthday">Ngày tháng năm sinh <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="birthday" name="birthday">
                                            @if($errors->has('birthday'))
                                                <small class="text-danger">{{ $errors->first('birthday') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">Ngày bắt đầu HĐ <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                            @if($errors->has('start_date'))
                                                <small class="text-danger">{{ $errors->first('start_date') }}</small>
                                            @endif
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
