<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($validated)
    {
        $this->validated = $validated;
    }

    /**
     * Build the message.
     *
     * @return RegisterMail
     */
    public function build()
    {
        $validated = $this->validated;

        $data = [
            'validated' => $validated,
        ];

        return $this->from('info@sample-com', 'sample窓口')
            ->to($validated['email'])
            ->bcc('sample@company.com')
            ->subject('自動返信 予約完了のお知らせ')
            ->text('emails.reserve', $data);
    }
}
