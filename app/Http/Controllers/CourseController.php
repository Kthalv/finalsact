<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function showUsers($id)
    {
        $course = Course::with('users')->findorFail($id);
   
        return view('users', [
        'course' => $course,
        'user' => $course->users,
        ]);
    }
}