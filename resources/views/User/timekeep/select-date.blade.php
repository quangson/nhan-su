@extends('User._layouts.default')
@section('title', 'Chấm công - danh sách')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

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
                            <form method="GET" action="{{ route('set-timekeep-user') }}" style="display: flex">
                                <div class="form-group mr-2">
                                    <label for="day">Ngày:</label>
                                    <input type="number" name="day" id="day" min="1" max="31" placeholder="Ngày" value="{{ \Carbon\Carbon::now()->day }}" required="">
                                </div>
                                <div class="form-group mr-2">
                                    <label for="month">Tháng:</label>
                                    <input type="number" name="month" id="month" min="1" max="12" placeholder="Tháng" value="{{ \Carbon\Carbon::now()->month }}" required="">
                                </div>
                                <div class="form-group mr-2">
                                    <label for="year">Năm:</label>
                                    <input type="number" name="year" id="year" min="1900" max="2099" placeholder="Năm" value="{{ \Carbon\Carbon::now()->year }}" required="">
                                </div>
                                <div class="form-group mr-2">
                                    <button type="submit">Chọn</button>
                                </div>
                            </form>

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

@endpush
