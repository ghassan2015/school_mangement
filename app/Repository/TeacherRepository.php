<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        // TODO: Implement getAllTeachers() method.
      return Teacher::all();
    }

    public function Getspecialization()
    {
        return Specialization::all();
        // TODO: Implement Getspecialization() method.
    }

    public function GetGender()
    {
        return Gender::all();
        // TODO: Implement GetGender() method.
    }

    public function StoreTeachers($request)
    {
        // TODO: Implement StoreTeachers() method.
        try {
//            $Teachers = new Teacher();
//            $Teachers->Email = $request->Email;
//            $Teachers->Password =  Hash::make($request->Password);
//            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers = new Teacher();
            $Teachers->user_id=Auth::user()->id;
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function editTeachers($id)
    {
        // TODO: Implement editTeachers() method.
        return Teacher::findOrFail($id);
    }

    public function UpdateTeachers($request)
    {
        // TODO: Implement UpdateTeachers() method.


        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Teachers.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTeachers($request)
    {
        // TODO: Implement DeleteTeachers() method.
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Teachers.index');

    }

    public function editUser($id)
    {
        return User::findOrFail($id);
        // TODO: Implement editUser() method.
    }
}
