<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Throwable;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:254'],
            'project_type' => ['required', Rule::in(['Website development', 'Laravel application', 'Website redesign', 'Other project'])],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ]);
        if ($validator->fails()) {
            return redirect('/#contact')->withErrors($validator)->withInput();
        }
        $data = $validator->validated();
        try {
            if (! filter_var(config('portfolio.contact_email'), FILTER_VALIDATE_EMAIL)) {
                throw new \RuntimeException('Contact recipient is not configured.');
            }
            // Explicit SMTP prevents the log driver from reporting false delivery.
            Mail::mailer('smtp')->send('emails.project-inquiry', ['inquiry' => $data], function ($mail) use ($data) {
                $mail->to(config('portfolio.contact_email'))->replyTo($data['email'], $data['name'])
                    ->subject('Contact for project: '.$data['project_type']);
            });
        } catch (Throwable $exception) {
            report($exception);
            return redirect('/#contact')->withInput()->withErrors([
                'delivery' => 'Your message could not be sent right now. Please try again later or contact me directly by email.',
            ]);
        }
        return redirect('/#contact')->with('contact_success', 'Thank you! Your project inquiry has been sent. I will get back to you soon.');
    }
}
