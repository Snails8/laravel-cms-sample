<?php
//
//namespace Tests\Unit\Repositories\Admin;
//
//use App\Repositories\Admin\Company\CompanyRepository;
//use Tests\TestCase;
//
//class CompanyRepositoryTest extends TestCase
//{
//    protected $companyRepository;
//
//    /**
//     * @param string|null $name
//     * @param array $data
//     * @param string $dataName
//     * @throws \Illuminate\Contracts\Container\BindingResolutionException
//     */
//    public function __construct(?string $name = null, array $data = [], $dataName = '')
//    {
//        parent::__construct($name, $data, $dataName);
//
//        $this->companyRepository = app()->make(CompanyRepository::class);
//    }
//
//    /**
//     * @test
//     */
////    public function 更新の保存処理は正常である()
////    {
////        $postData = [
////            'name'          => 'テスト',
////            'zipcode1'      => 000,
////            'zipcode2'      => 1111,
////            'address'       => 'テスト',
////            'address_other' => '',
////            'tel'           => 00011112222,
////            'email'         => 'sample@sample.com',
////            'ceo'           => 'テスト',
////        ];
////
////        $company = $this->companyRepository->update($postData);
////    }
//}