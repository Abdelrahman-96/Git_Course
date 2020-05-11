<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Courses extends Controller
{
    public function getCourses()
    {
        $courses = DB::table('courses')->orderBy('created_at','desc')->get();
        return response()->json($courses, 200);
    }

    public function getCourse($id)
    {
        $course = Course::find($id);
        if(is_null($course))
        {
            return response()->json('Record not found!', 404);
        }
        return response()->json($course, 200);
    }

    public function saveCourse(Request $request){

        $course = new Course();
        $course->name=$request->input('name');
        $course->description = $request->input('description');
        $course->userId = $request->input('userId');
        $rules = [
            'name' => 'required|min:2',
            'description' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }        $course->save();
        return response()->json($course, 201);
    }

    public function updateCourse(Request $request, $id){
        $course = Course::find($id);
        if(is_null($course))
        {
            return response()->json('Record not found!', 404);
        }
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $rules = [
            'name' => 'required|min:2',
            'description' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $course->save();
        return response()->json($course, 200);
    }


    public function deleteCourse($id)
    {
        $course = Course::find($id);
        if(is_null($course))
        {
            return response()->json('Record not found!', 404);
        }
        $course->delete();
        return response()->json(null, 204);
    }
}
