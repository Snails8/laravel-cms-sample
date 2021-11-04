<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * お問合せフォームのメール処理
 */
class ContactMail extends Mailable
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
     * @return $this
     */
    public function build()
    {
        $validated = $this->validated;

        $data = [
            'validated' => $validated,
        ];

        return $this->from('info@sample-com', 'お問い合わせ窓口')
            ->to($validated['email'])
            ->bcc('sample@company.com')
            ->subject('自動返信 お問い合わせ内容受付完了のお知らせ')
            ->text('emails.contact', $data);
    }
}
