<?php
namespace App\Repository;



namespace App\Repository;
namespace App\Repository;


use App\Models\Grade;
use App\Models\promotion;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseRepository implements CourseRepositoryInterface
{

    public function index()
    {
        $Grades=Grade::all();
        return view('Courses.Courses',compact('Grades'));
    }

    public function store($request)
    {
        return $request;

        DB::beginTransaction();

        try {



        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }


}
