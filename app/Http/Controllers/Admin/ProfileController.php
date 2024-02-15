<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
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
        dd($request->all());
        return redirect()->back();
    }
}
