@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Course_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Course_trans.Course') }}
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
                        {{ trans('Course_trans.add_Course') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Course_trans.Name') }}</th>
                                <th>{{ trans('Course_trans.Description') }}</th>
                                <th>{{ trans('Course_trans.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Courses as $Course)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $Course->name}}</td>
                                    <td>{{ $Course->description }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Course->id }}"
                                                title="{{ trans('Course_trans.Edit') }}"><i class="fa fa-edit"></i></button>

                                        <a type="button" class="btn btn-info btn-sm"  href="{{route('Course.editattachments',$Course->id)}}"

                                                title="{{ trans('Course_trans.Edit') }}"><i class="fas fa-file-pdf"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Course->id }}"
                                                title="{{ trans('Course_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>


{{--                                        <a href="{{route('Course.destroy',$Course->id)}}"class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i--}}
{{--                                                class="fa fa-trash"></i></a>--}}

                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $Course->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Course_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('Course.update', $Course->id) }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{ trans('Course_trans.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control"
                                                                   value="{{ $Course->getTranslation('name', 'ar') }}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $Course->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">{{ trans('Course_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $Course->getTranslation('name', 'en') }}"
                                                                   name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('Course_trans.Description') }}
                                                            :</label>
                                                        <textarea class="form-control" name="description"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{$Course->getTranslation('description', 'ar')}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('Course_trans.Description_en') }}
                                                            :</label>
                                                        <textarea class="form-control" name="description_en"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{$Course->getTranslation('description', 'en')}}</textarea>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col">
                                                            <label for="inputCity">{{trans('Teacher_trans.specialization')}}</label>
                                                            <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                                                <option value="{{$Course->Grade_id}}">{{$Course->Grades->Name}}</option>
                                                                @foreach($Grades as $Grade)
                                                                    <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('Grade_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Course_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('Course_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{$Course->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Course_trans.Delete') }}
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
                                                    {{ trans('Course_trans.Warning_Grade') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $Course->id }}">
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
                        <form action="{{ route('Course.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">اسم الكورس باللغة العربية
                                        :</label>
                                    <input id="Name" type="text" name="Name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">اسم الكورس باللغة الانجليزية
                                        :</label>
                                    <input type="text" class="form-control" name="Name_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">وصف الكورس باللغة العربية
                                    :</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">وصف الكورس باللغة الانجليزية
                                    :</label>
                                <textarea class="form-control" name="description_en" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <div class="col">
                                <label for="inputName"
                                       class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                <select name="Grade_id" class="custom-select"
                                        onchange="console.log($(this).val())">
                                    <!--placeholder-->
                                    <option value="" selected
                                            disabled>{{ trans('Sections_trans.Select_Grade') }}
                                    </option>
                                    @foreach ($Grades as $list_Grade)
                                        <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br><br>
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

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
