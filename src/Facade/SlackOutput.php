<?php

namespace CodeGym\SlackOutput\Facade;

use Illuminate\Support\Facades\Facade;
use CodeGym\SlackOutput\Service;

class SlackOutput extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Service::class;
    }

}