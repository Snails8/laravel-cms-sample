<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;

/**
 * Class ContactControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class ContactControllerTest extends TestCase
{
    /**
     * @test
     */
    public function お問い合わせ管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.contact.index'))->assertStatus(200);
    }

    /**
     * @test
     */
    public function お問い合わせ管理詳細画面のレスポンスは正常である()
    {
        $user = User::factory()->create();
        $contactId = Contact::query()->inRandomOrder()->first('id');

        $this->actingAs($user, 'admin')
            ->get(route('admin.contact.show', ['contact' => $contactId]))->assertStatus(200);
    }
}