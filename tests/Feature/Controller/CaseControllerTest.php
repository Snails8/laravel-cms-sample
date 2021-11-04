<?php

namespace Tests\Feature\Controller;

//use App\Models\Case;
use Tests\TestCase;

class CaseControllerTest extends TestCase
{
    /**
     * @test
     */
    public function 導入事例一覧ページのレスポンスは正常である()
    {
        $this->get(route('case.index'))->assertStatus(200);
    }

    /**
     * @test
     */
//    public function 導入事例詳細ページのレスポンスは正常である()
//    {
//        $caseId = Case::query()->inRandomOrder()->first('id');
//        $this->get(route('case.show', ['caseId' => $caseId]))->assertStatus(200);
//    }
}