<?php

namespace App\Services\Slack;

use Illuminate\Support\Facades\Facade;

/**
 * Class SlackFacade
 * @package App\Services\Slack
 */
class SlackFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'slack';
    }
}