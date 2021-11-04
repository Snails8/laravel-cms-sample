<?php

namespace App\Mail\AutoMail;

use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $customer;
    protected $newsLists;

    /**
     * Create a new message instance.
     * @param Customer $customer
     * @param Collection $newsLists
     */
    public function __construct(Customer $customer, Collection $newsLists)
    {
        $this->customer  = $customer;
        $this->newsLists = $newsLists;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        $title = '自動送信テストメールサンプル';
        $data = [
            'customer'  => $this->customer,
            'newsLists' => $this->newsLists,
            'title'     => $title,
        ];

        return $this->from('info@sample-com')
            ->to($this->customer->email)
            ->subject($title)
            ->text('emails.auto_mail.new_news', $data);
    }
}
