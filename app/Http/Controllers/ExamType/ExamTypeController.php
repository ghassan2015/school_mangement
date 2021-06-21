<?php

namespace App\Http\Controllers\ExamType;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examTypes=\App\Models\ExamType::all();
        return view('Pages.Exam.ExamType',compact('examTypes'));

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

        $examType=new ExamType();
        $examType->name	=['ar'=>$request->Name,'en'=>$request->Name_en];
        $examType->description==['ar'=>$request->description,'en'=>$request->description_en];
        $examType->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('ExamType.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
    public function update(Request $request)
    {
        try {

            $examType=ExamType::find($request->id);
            $examType->name	=['ar'=>$request->Name,'en'=>$request->Name_en];
            $examType->description==['ar'=>$request->description,'en'=>$request->description_en];
            $examType->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('ExamType.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
