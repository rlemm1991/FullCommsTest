<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            'email_address' =>'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $this->saveRequestToDB($request);

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

            Log::info("New contact request from ".$contactRequest->name. " saved");


        }catch (QueryException $queryException)
        {
            Log::critical($queryException->getMessage());
            return redirect(url('/contact'))->withErrors(['Database insert error has occured, please try again or contact admin']);
        }
    }

    // Usually this would be hooked up into a service under /Services <-- omitted from test
    private function sendEmails()
    {

    }
}
