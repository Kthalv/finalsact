<?php


namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Profile;




class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('user')->get();
        return view('profiles', compact('profiles'));
    }
      // Method to show a specific profile by ID
    public function show($id)
{
    // Find the profile by its ID and load the associated user
    $profile = Profile::with('user')->find($id);


    // If the profile does not exist, return a 404 error
    if (!$profile) {
        abort(404, 'Profile not found');
    }


    // Return the view with the profile data
    return view('profile', compact('profile'));
    }
}
