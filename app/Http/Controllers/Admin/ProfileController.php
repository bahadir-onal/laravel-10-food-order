<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function index()
    {
        return view('admin.profile.index');
    }

    function updateProfile(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $imagePath = $this->uploadImage($request, 'avatar');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
        $user->save();

        toastr('Updated Succesfully', 'success');

        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdateRequest $request)
    {
        $user = Auth::user();

        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Password Updated Succesfully');

        return redirect()->back();
    }
}
