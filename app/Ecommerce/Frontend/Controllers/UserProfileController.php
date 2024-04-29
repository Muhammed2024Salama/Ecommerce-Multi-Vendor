<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('frontend.dashboard.profile');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        // dd($request);
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
            /** End Deleting Old Image */

            $image = $request->image;
            $imageName = rand()."_".$image->getClientOriginalName();
            $image->move(public_path('uploads'),$imageName);

            $path = "/uploads/".$imageName;
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        toastr()->success('Profile Updated Successfully ! ');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' => ['required','current_password'],
            'password' => ['required','confirmed','min:8']
            // At The End Of Validation We Compare that current_password & password === password_confirmation
            // So We didn't add password_confirmation'
        ]);
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        // Start Toastr Notification
        toastr()->success('Profile Password Updated Successfully ! ');
        // End Toastr Notification

        return redirect()->back();
    }
}
