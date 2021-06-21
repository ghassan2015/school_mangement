<?php

namespace App\Http\Controllers\Exam;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Exams=\App\Models\Exam::all();
        $Courses=Course::all();
        $examTypes=ExamType::all();
        return  view('Pages.Exam.Exam',compact('Exams','Courses','examTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $exam=new \App\Models\Exam();
            $exam->name=['ar'=>$request->Name,'en'=>$request->Name_en];
            $exam->course_id=$request->Course_id;
            $exam->exam_types_id=$request->examType_id;
            $exam->exam_Date=$request->Exam_Date;
            $exam->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('Exam.index');

        }catch (\Exception $e){
            toastr()->error(trans('messages.error'));

            return redirect()->route('Exam.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
