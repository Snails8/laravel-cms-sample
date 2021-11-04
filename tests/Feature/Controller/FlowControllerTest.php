<?php

namespace Tests\Feature\Controller;

use Tests\TestCase;

/**
 * FlowControllerのFeature Test
 */
class FlowControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 導入の流れ一覧ページのレスポンスは正常である()
    {
        $this->get(route('flow.index'))->assertStatus(200);
    }
}