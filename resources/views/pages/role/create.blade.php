@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Grades_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        @if ($errors->any())
            <div class="error">{{ $errors->first('Name') }}</div>
        @endif



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- row -->
                        <form action="{{ route('roles.store') }}" method="post">
@csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mg-b-20">
                                    <div class="card-body">
                                        <div class="main-content-label mg-b-5">
                                            <div class="col-xs-7 col-sm-7 col-md-7">
                                                <div class="form-group">
                                                    <p>اسم الصلاحية :</p>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- col -->
                                            <div class="col-lg-4">
                                                <ul id="treeview1">
                                                        <li>
                                                            @foreach($permission as $value)
                                                                <label>

                                                                    <input type="checkbox" class="form-control" name="permission[]" value="{{$value->id}}">{{ $value->name }}-</label>
                                                                @endforeach
                                                        </li>
                                                </ul>
                                            </div>
                                            <!-- /col -->
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-main-primary">تاكيد</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
</form>
                        <!-- row closed -->
                </div>
                <!-- Container closed -->
            </div>

            <!-- row closed -->
            @endsection
            @section('js')
                @toastr_js
                @toastr_render
@endsection
