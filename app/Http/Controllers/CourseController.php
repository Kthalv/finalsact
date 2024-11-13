<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function courseUsers(Request $request,Course $course){
        $users = $course->users;

        return view('Course',['users'=>$users,'course'=>$course]);
    }
}namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function showUsers($id)
    {
        $course = Course::with('users')->findorFail($id);
   
        return view('courses.users', [
        'course' => $course,
        'users' => $course->users,
        ]);
    }
}