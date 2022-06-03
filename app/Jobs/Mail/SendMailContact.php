<?php

namespace App\Jobs\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $contactId;

    public function __construct($contactId)
    {
        $this->contactId = $contactId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contact = Contact::query()->find($this->contactId);
        $email = $contact->email;

        $subject = "Booking Car - " . $contact->subject;

        Mail::send('mail.contact', [
            'feedback'=> $contact->feedback
        ], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
}
