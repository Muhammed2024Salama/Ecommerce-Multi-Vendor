<?php

namespace Ecommerce\Backend\Controllers\Admin\Subscribers\Controllers;

use App\DataTables\NewsletterSubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use Ecommerce\Frontend\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class SubscribersController extends Controller
{
    /**
     * @param NewsletterSubscriberDataTable $dataTable
     * @return mixed
     */
    public function index(NewsletterSubscriberDataTable $dataTable)
    {
        return $dataTable->render('admin.subscriber.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMail(Request $request)
    {
        /** Start Validation */
        $request->validate([
            'subject' => ['required'],
            'message' => ['required']
        ]);
        /** End Validation */

        // Fetch verified email addresses
        $emails = NewsletterSubscriber::where('is_verified', 1)->pluck('email')->toArray();

        // Ensure there are email addresses to send to
        if (empty($emails)) {
            toastr('No verified email addresses found', 'error', 'error');
            return redirect()->back();
        }

        try {
            // Send email
            Mail::to($emails)->send(new Newsletter($request->subject, $request->message));
            toastr('Mail has been sent', 'success', 'success');
        } catch (\Exception $e) {
            // Handle errors
            toastr('Failed to send mail: ' . $e->getMessage(), 'error', 'error');
        }

        return redirect()->back();
    }


    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function destory(string $id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => 'deleted successfully']);
    }
}
