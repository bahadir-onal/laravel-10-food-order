<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    function index()
    {
        return view('admin.profile.index');
    }

    function updateProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        toastr('Updated Succesfully', 'success');

        return redirect()->back();
    }
}
