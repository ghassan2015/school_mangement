@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teacher_trans.Add_Teacher') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Add_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">رجوع</a>
                                    </div>
                                </div>
                                <br>
                            <br>
                                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                                <div class="">

                                    <div class="row">
                                        <div class="parsley-input col-md-6" id="fnWrapper">
                                            <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                            {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                                        </div>

                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                            {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row mg-b-20">
                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                        {!! Form::password('password', array('class' => 'form-control','required')) !!}
                                    </div>

                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                        {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>


                                <div class="row row-sm mg-b-20">
                                        <label class="form-label">حالة المستخدم</label>
                                    <div class="mt-10"></div>
                                        <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                                            <option value="{{ $user->Status}}">{{ $user->Status}}</option>
                                            <option value="مفعل">مفعل</option>
                                            <option value="غير مفعل">غير مفعل</option>
                                        </select>
                                </div>

                                <div class="row mg-b-20">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>نوع المستخدم</strong>
                                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple'))
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="mg-t-30">
                                    <button class="btn btn-main-primary pd-x-20" type="submit">تحديث</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                </div>
            </div>




        </div>
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
