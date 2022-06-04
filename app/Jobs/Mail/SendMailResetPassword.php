<?php

namespace App\Jobs\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $email;
    private $actionLink;
    private $name;

    public function __construct($email, $actionLink, $name)
    {
        $this->email = $email;
        $this->actionLink = $actionLink;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = $this->email;
        $actionLink = $this->actionLink;

        Mail::send('mail.reset', [
            'actionLink' => $actionLink,
            'name' => $this->name
        ], function ($message) use ($email) {
            $message->to($email)->subject('Booking Car - Thông báo đặt lại mật khẩu');
        });
    }
}
