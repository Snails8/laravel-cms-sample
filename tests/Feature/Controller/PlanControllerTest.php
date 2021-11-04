<?php

namespace Tests\Feature\Controller;

use Tests\TestCase;

/**
 * PlanControllerのFeature Test
 */
class PlanControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 料金プラン一覧のレスポンスは正常である()
    {
        $this->get(route('plan.index'))->assertStatus(200);
    }
}