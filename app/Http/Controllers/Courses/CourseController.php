<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseAttachment;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\ParentAttachment;
use App\Models\Teacher;
use App\Repository\CourseRepository;
use App\Repository\CourseRepositoryInterface;
use App\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $Grades = Grade::all();
        $Courses = Course::all();
        $teachers=User::role('معلم')->get();
        return view('pages.Courses.Courses', compact('Courses', 'Grades','teachers'));
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $course = new Course();
            $course->name = ['ar' => $request->Name, 'en' => $request->Name_en];
            $course->description = ['ar' => $request->description, 'en' => $request->description_en];
            $course->Grade_id = $request->Grade_id;

            $course->save();
            $course->teachers()->attach($request->teacher_id);

            toastr()->success(trans('messages.success'));
            return redirect()->route('Course.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $Course=Course::find($id);
            $Grades=Grade::all();

            if(!$Course)
                toastr()->error(trans('messages.error'));

            return view('pages.Courses.Courses', compact('Course', 'Grades'));

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        //
        try {
            $course=Course::find($request->id);
            $course->name = ['ar' => $request->Name, 'en' => $request->Name_en];
            $course->description = ['ar' => $request->description, 'en' => $request->description_en];
            $course->Grade_id = $request->Grade_id;
            $course->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Course.index');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

public function editAttachment(Request $request){
    $Course=Course::find($request->id);
    return view('pages.Courses.course_attachments',compact('Course'));
}
    public function updateAttachment(Request $request)
    {
        //
        try {
            $course=Course::find($request->id);
            $attachment=$request->attachments;
            $attachment->storeAs('كورسات', $attachment->getClientOriginalName(), $disk = 'course_attachments');
                    CourseAttachment::create([
                        'name' => $attachment->getClientOriginalName(),
                        'Course_id' => $request->id,
                    ]);


                toastr()->success(trans('messages.success'));
                return redirect()->route('Course.index');

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }



}
