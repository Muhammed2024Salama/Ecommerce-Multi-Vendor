<?php

namespace Ecommerce\Backend\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email' => ['required','email' , 'unique:users,email,'.Auth::user()->id]
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back();
    }
}
