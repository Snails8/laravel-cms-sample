<?php

namespace Tests\Feature\Controller\Admin;

use Tests\TestCase;
use App\Models\User;

/**
 * Class HomeControllerTest
 * @package Tests\Feature\Controller\Admin
 */
class HomeControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 会社管理一覧画面のレスポンスは正常である()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'admin')
            ->get(route('admin.home'))->assertStatus(200);
    }

}