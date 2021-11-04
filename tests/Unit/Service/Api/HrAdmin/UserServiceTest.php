<?php

namespace Tests\Unit\Services\Api\HrAdmin;

use App\Services\Api\HrAdmin\UserService;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

/**
 * Class UserServiceTestTest
 * @package Tests\Unit\Services
 */
class UserServiceTestTest extends TestCase
{
    protected $userService;

    /**
     * UserServiceTestTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->userService = app()->make(UserService::class);
    }

    /**
     * @test
     */
    public function getHrUsersの戻り値の型は正常である()
    {
        $result = $this->userService->getHrUsers();

        $this->assertInstanceOf(Collection::class, $result);
    }

}
