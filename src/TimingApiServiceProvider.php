<?php

namespace BlandIndustries\TimingApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BlandIndustries\TimingApi\Commands\TimingApiCommand;

class TimingApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('timing-api')
            ->hasConfigFile();
    }
}
