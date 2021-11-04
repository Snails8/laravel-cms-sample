<?php

namespace Tests\Feature\Controller;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /**
     * @test
     */
    public function お問い合わせフォーム表示ページのレスポンスは正常である()
    {
        $this->get(route('contact.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お問い合わせフォームの送信処理は正常である()
    {
        $postData = [
            'company'        => 'サンプル株式会社',
            'name'           => 'sample name',
            'tel'            => collect([0120111222, 00011112222 ])->random(),
            'email'          => 'sample@sample.com',
            'employee_count' => 1,
            'contact_type'   => 1,
            'detail'         => 'sample text',
        ];
        Mail::fake();
        $res = $this->from(route('contact.thanks'))
            ->post(route('contact.post'), $postData);

        Mail::assertSent(ContactMail::class);
        $res->assertRedirect(route('contact.thanks'));
    }

    public function お問い合わせフォームのサンクスページのレスポンスは正常である()
    {
        $this->get(route('contact.thanks'));
    }
}