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
                            <form action="{{ route('Course.attachments',$Course->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="academic_year">{{trans('Students_trans.Attachments')}} : <span class="text-danger">*</span></label>
                            <br>
                                <input name="attachments" type="file" accept="application/pdf, application/vnd.ms-excel" />
                                <br>
                                <br>

                                <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>

                            </form>
                </div>
            </div>



@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
