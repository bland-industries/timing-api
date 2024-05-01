# Laravel Package to connect to the Timing App API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bland-industries/timing-api.svg?style=flat-square)](https://packagist.org/packages/bland-industries/timing-api)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/bland-industries/timing-api/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/bland-industries/timing-api/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/bland-industries/timing-api/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/bland-industries/timing-api/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bland-industries/timing-api.svg?style=flat-square)](https://packagist.org/packages/bland-industries/timing-api)

Package to connect to the [Timing App API](https://web.timingapp.com/docs/)


## Installation

You can install the package via composer:

```bash
composer require bland-industries/timing-api
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="timing-api-config"
```

This is the contents of the published config file:

```php
return [
    "max_batch_size"    => 50, // the max batch size Mixpanel will accept is 50,
    "max_queue_size"    => 1000, // the max num of items to hold in memory before flushing
    "debug"             => false, // enable/disable debug mode
    "host"              => "https://web.timingapp.com", // the host name for api calls
    "use_ssl"           => true, // use ssl when available
    "error_callback"    => null, // callback to use on consumption failures
    "version"           => "v1", // default api version
    "token"             => env('TIMING_API_TOKEN') // api token
];
```

## Usage

```php
$timingApi = new BlandIndustries\TimingApi();
echo $timingApi->echoPhrase('Hello, BlandIndustries!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Thomas Verstraete](https://github.com/)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
