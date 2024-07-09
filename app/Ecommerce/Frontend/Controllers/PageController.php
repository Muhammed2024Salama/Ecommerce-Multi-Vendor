<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use Ecommerce\Backend\Controllers\Admin\About\Models\About;
use Ecommerce\Backend\Controllers\Admin\EmailConfiguration\Models\EmailConfiguration;
use Ecommerce\Backend\Controllers\Admin\Terms\Models\TermsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function about()
    {
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function termsAndCondition()
    {
        $terms = TermsAndCondition::first();
        return view('frontend.pages.terms-and-condition', compact('terms'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function handleContactForm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000']
        ]);

        $setting = EmailConfiguration::first();

        Mail::to($setting->email)->send(new Contact($request->subject, $request->message, $request->email));

        return response(['status' => 'success', 'message' => 'Mail sent successfully!']);

    }
}
