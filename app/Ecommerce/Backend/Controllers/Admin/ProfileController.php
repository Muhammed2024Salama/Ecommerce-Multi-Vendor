<?php

namespace Ecommerce\Backend\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required','max:100'],
            'email' => ['required','email' , 'unique:users,email,'.Auth::user()->id],
            'image' => ['image','max:2048']
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            /** Check File If Exists Or Not If Exists Delete Old  */
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand()."_".$image->getClientOriginalName();
            $image->move(public_path('uploads'),$imageName);

            $path = "/uploads/".$imageName;
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back();
    }
}
