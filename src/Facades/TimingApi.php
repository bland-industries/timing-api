<?php

namespace BlandIndustries\TimingApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BlandIndustries\TimingApi\TimingApi
 */
class TimingApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BlandIndustries\TimingApi\TimingApi::class;
    }
}
