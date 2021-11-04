<?php

namespace Tests\Feature\Controller;

use Tests\TestCase;

class TopControllerTest extends TestCase
{
    /**
     * @test
     */
    public function トップページのレスポンスは正常である()
    {
        $this->get('/')->assertStatus(200);
    }
}