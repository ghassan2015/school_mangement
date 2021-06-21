<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Repository\TeacherRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
     $this->Teacher=$Teacher;
    }

    public function index()
    {
        $Teachers=$this->Teacher->getAllTeachers();
        return view('pages.Teachers.Teachers',compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $id=Auth::user()->id;
        $Teachers= $this->Teacher->editUser($id);

        $specializations=$this->Teacher->Getspecialization();
        $genders=$this->Teacher->GetGender();
        return view('pages.Teachers.create',compact('specializations','genders','Teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Teacher->StoreTeachers($request);

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


        $User=Auth::user();
        $Teachers=Teacher::where('user_id',$id)->first();
        $specializations=$this->Teacher->Getspecialization();
        $genders=$this->Teacher->GetGender();
       return view('pages.Teachers.edit',compact('User','Teachers','specializations','genders'));
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
        return $this->Teacher->UpdateTeachers($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);

    }
}
