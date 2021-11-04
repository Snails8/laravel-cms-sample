<?php

namespace Tests\Unit\Service\Admin;

use App\Models\Company;
use App\Services\Admin\CompanyService;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class CompanyServiceTest extends TestCase
{
    protected $companyService;

    /**
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->companyService = app()->make(CompanyService::class);
    }

    /**
     * @test
     */
    public function 編集画面の返り値は正常である()
    {
        $company = Company::query()->inRandomOrder()->first();
        $data = $this->companyService->edit($company);

        $this->assertIsArray($data);
    }

    /**
     * @test
     */
    public function 編集処理の返り値は正常である()
    {
        $updateCompany = Company::query()->inRandomOrder()->first();

        $postData = [
            'name'          => 'テスト',
            'zipcode1'      => 000,
            'zipcode2'      => 1111,
            'address'       => 'テスト',
            'address_other' => '',
            'tel'           => 00011112222,
            'email'         => 'sample@sample.com',
            'ceo'           => 'テスト',
        ];

        $company = $this->companyService->update($postData, $updateCompany);

        $this->assertInstanceOf(RedirectResponse::class, $company);
    }
}