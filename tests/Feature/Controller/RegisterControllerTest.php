<?php

namespace Tests\Feature\Controller;

use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 無料お試しフォーム表示ページのレスポンスは正常である()
    {
        $this->get(route('register.form'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function 無料お試しフォーム処理は正常である()
    {
        $postData = [
            'name'           => 'sample company name',
            'zipcode'        => 1112222,
            'address'        => 'sample address',
            'address_other'  => '',
            'tel'            => collect([0120111222, 00011112222 ])->random(),
            'email'          => 'sample@sample.com',
            'representative' => 'sample representative',
            'role'           => 'Standard',
            'is_contract'    => true,
        ];
        $res = $this->from(route('register.thanks'))
            ->post(route('register.post'), $postData);
        $res->assertRedirect(route('register.thanks'));
    }

    /**
     * @test
     */
    public function 無料お試しフォームのメール送付処理は正常である()
    {
        $postData = [
            'name'           => 'sample company name',
            'zipcode'        => 1112222,
            'address'        => 'sample address',
            'address_other'  => '',
            'tel'            => collect([0120111222, 00011112222 ])->random(),
            'email'          => 'sample@sample.com',
            'representative' => 'sample representative',
            'role'           => 'Standard',
            'is_contract'    => true,
        ];
        // TODO::メールのテストは仕様と命名が固まってから
//        Mail::fake();
        $res = $this->from(route('register.thanks'))
            ->post(route('register.post'), $postData);

//        Mail::assertSent(RegisterMail::class);
        $res->assertRedirect(route('register.thanks'));
    }

    public function 無料お試しフォームのサンクスページのレスポンスは正常である()
    {
        $this->get(route('register.thanks'));
    }
}