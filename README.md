# Processing Input in a FormRequest

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mosdev-pro/sanitizer.svg?style=flat-square)](https://packagist.org/packages/mosdev-pro/sanitizer)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mosdev-pro/sanitizer/run-tests?label=tests)](https://github.com/mosdev-pro/sanitizer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/mosdev-pro/sanitizer/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/mosdev-pro/sanitizer/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mosdev-pro/sanitizer.svg?style=flat-square)](https://packagist.org/packages/mosdev-pro/sanitizer)

Processing incoming values according to your rules.
Now I have made 3 mechanisms:
- Clean up spaces
- Cleaning numbers from extraneous characters
- Format string to lower case

You can easily add your own rules!

## Installation

You can install the package via composer:

```bash
composer require mosdev-pro/sanitizer
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="sanitizer-config"
```

This is the contents of the published config file:

```php
return [
    'rules' => [
        'custom' => '' // Your custom Pipeline 
    ]   
];
```

## Usage

```php
use Mosdev\Sanitizer\Traits\Sanitizer;

class Request extends FormRequest
{
    use Sanitizer;
    
    /**
     * List of fields and methods for their processing.
     *
     * @return array
     */
    public array $sanitize = [
        'user_id' => ['numeric'],
        'type'    => ['trim', 'lower'],
        'text'    => ['trim'],
    ];
}
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

- [Aleksey Shavrak](https://github.com/mosdev-pro)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
