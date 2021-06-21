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
                                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                                      action="{{route('users.store','test')}}" method="post">
                                    {{csrf_field()}}

                                    <div class="">

                                        <div class="row mg-b-20">
                                            <div class="parsley-input col-md-6" id="fnWrapper">
                                                <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                            </div>

                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                                <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20"
                                                       data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mg-b-20">
                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                                   name="password" required="" type="password">
                                        </div>

                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                                   name="confirm-password" required="" type="password">
                                        </div>
                                    </div>
                                    <div class="row mg-b-20">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"> صلاحية المستخدم</label>
                                                {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                                    </div>
                                </form>
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
