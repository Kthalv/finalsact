<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with('profile', 'courses')->find($id);
       
        // If the user doesn't exist, return a 404 error
        if (!$user) {
            abort(404, 'User not found');
        }


        // Return the view and pass the user data
        return view('users.show', compact('user'));
    }


    // Show all courses of a user
    public function showCourses($id)
    {
       
        $user = User::with('courses')->find($id);  


        if (!$user) {
            abort(404, 'User not found');
        }
       
        return view('users.courses', compact('user'));
    }
}
   
