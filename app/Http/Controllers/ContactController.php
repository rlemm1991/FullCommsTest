<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use App\Mail\ConfirmationEmail;
use App\Mail\NewContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        // No middleware required
    }

    public function processRequest(Request $request)
    {

        // validate
        $request->validate([
            'first_name' => 'required|max:32',
            'last_name' => 'required|max:32',
            'email_address' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $this->saveRequestToDB($request);
        $this->sendEmails($request);

        return redirect(url('/thank-you'));
    }

    private function saveRequestToDB($formInput)
    {
        try {
            $contactRequest = new ContactRequest();
            $contactRequest->name = $formInput->input('first_name') . " " . $formInput->input('last_name');
            $contactRequest->email = $formInput->input('email_address');
            $contactRequest->subject = $formInput->input('subject');
            $contactRequest->message = $formInput->input('message');
            $contactRequest->save();

            Log::info("New contact request from " . $contactRequest->name . " saved");


        } catch (QueryException $queryException) {
            Log::critical($queryException->getMessage());
            return redirect(url('/contact'))->withErrors(['Database insert error has occured, please try again or contact admin']);
        }
    }

    // Usually this would be hooked up into a service under /Services <-- omitted from test
    // Queables would also go here
    private function sendEmails($request)
    {
        // Send emails

        try {
            // Send contact first
            Mail::to("MasterAdmin@fullcomm.test")->send(new NewContactRequest(
                $request->input('email_address'),
                $request->input('first_name') . " " . $request->input('last_name'),
                $request->input('message'),
                $request->input('subject')
            ));

            // Now Confirmation
            Mail::to($request->input('email_address'))->send(new ConfirmationEmail($request->input('first_name')));
        } catch (\Exception $exception) {
            Log::critical('Email issues :: ' . $exception->getMessage());
        }
    }
}
