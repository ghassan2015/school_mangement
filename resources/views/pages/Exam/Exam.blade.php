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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('exam.add_exam') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('exam.Name') }}</th>
                                <th>{{ trans('exam.type') }}</th>
                                <th>{{ trans('exam.specialization') }}</th>

                                <th>{{ trans('Grades_trans.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Exams as $exam)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                        <td>{{$exam->name}}</td>
                                    <td>{{ $exam->ExamType->name}}</td>
                                    <td>{{ $exam->Course->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $exam->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>


                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $exam->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>


                                        {{--                                        <a href="{{route('Course.destroy',$Course->id)}}"class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i--}}
                                        {{--                                                class="fa fa-trash"></i></a>--}}

                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $exam->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('ExamType.update', $exam->id) }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control"
                                                                   value="{{ $exam->getTranslation('name', 'ar') }}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $exam->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $exam->getTranslation('name', 'en') }}"
                                                                   name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                                                            :</label>
{{--                                                        <textarea class="form-control" name="description"--}}
{{--                                                                  id="exampleFormControlTextarea1"--}}
{{--                                                                  rows="3">{{$exam->getTranslation('description', 'ar')}}</textarea>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label--}}
{{--                                                            for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}--}}
{{--                                                            :</label>--}}
{{--                                                        <textarea class="form-control" name="description_en"--}}
{{--                                                                  id="exampleFormControlTextarea1"--}}
{{--                                                                  rows="3">{{$exam->getTranslation('description', 'en')}}</textarea>--}}
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="inputCity">{{trans('exam.type')}}</label>
                                                        <select class="form-control form-control-lg"
                                                                id="exampleFormControlSelect1" name="examType_id">
                                                            <option value="{{ $exam->ExamType->id }}"selected>{{ $exam->ExamType->name }}</option>

                                                            @foreach ($examTypes as $examType)
                                                                <option value="{{ $examType->id }}">
                                                                    {{ $examType->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                        <label for="inputCity">{{trans('exam.specialization')}}</label>
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                                id="exampleFormControlSelect1" name="course_id">
                                                            <option value="{{ $exam->Course->id }}" selected>{{ $exam->Course->name }}</option>

                                                            @foreach ($Courses as $Course)
                                                                <option value="{{ $Course->id }}">
                                                                    {{ $Course->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="title">{{trans('Teacher_trans.Joining_Date')}}</label>
                                                            <div class='input-group date'>
                                                                <input value="{{$exam->exam_Date}} "class="form-control" type="text"  id="datepicker-action" name="Exam_Date" data-date-format="yyyy-mm-dd"  required>
                                                            </div>
                                                            @error('Exam_Date')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{$exam->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Course.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('Grades_trans.Warning_Grade') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $exam->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('Grades_trans.add_Grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Exam.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{trans('exam.stage_name_ar')}}                                    :</label>
                                    <input id="Name" type="text" name="Name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{trans('exam.stage_name_en')}}                                    :</label>
                                    <input type="text" class="form-control" name="Name_en">
                                </div>
                            </div>


                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputCity">{{trans('exam.course')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Course_id">
                                            <option selected disabled>{{trans('exam.course')}}...</option>
                                            @foreach($Courses as $Course)
                                                <option value="{{$Course->id}}">{{$Course->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('Course_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputCity">{{trans('exam.specialization')}}</label>
                                            <select class="custom-select my-1 mr-sm-2" name="examType_id">
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($examTypes as $examType)
                                                    <option value="{{$examType->id}}">{{$examType->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('examType')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">{{trans('Teacher_trans.Joining_Date')}}</label>
                                                <div class='input-group date'>
                                                    <input class="form-control" type="text"  id="datepicker-action" name="Exam_Date" data-date-format="yyyy-mm-dd"  required>
                                                </div>
                                                @error('Exam_Date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
