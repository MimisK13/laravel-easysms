# LaravelEasysms

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [CONTRIBUTING.md](CONTRIBUTING.md) to see a to do list.

## Installation

Via Composer

```bash
composer require mimisk13/laravel-easysms
```

### Publishing the Configuration File

To publish the configuration file for `laravel-easysms`, run the following command:

```bash
php artisan vendor:publish --tag=easysms.config
```

### Environment Settings (.env)

Before using the package, make sure to add the necessary settings to your .env file:

```dotenv
EASY_SMS_API_KEY=your_api_key_here

# optional
EASY_SMS_SMS_URL=https://easysms.gr/api/sms/send
EASY_SMS_VIBER_URL=https://easysms.gr/api/viber/send
EASY_SMS_BALANCE_URL=https://easysms.gr/api/me/balance
EASY_SMS_MOBILE_CHECK_URL=https://easysms.gr/api/mobile/check
```

## Usage

Here are examples of how to use the core functionalities of the `laravel-easysms` package.

### 1. Sending an SMS

To send an SMS, you can use the `send` method, specifying the channel as `'sms'` (default).

```php
use Mimisk13\LaravelEasySMS\Facades\EasySMS;

$smsResult = EasySMS::send('+1234567890', 'This is an SMS message');

if ($smsResult) {
    echo "SMS sent successfully!";
} else {
    echo "Failed to send SMS.";
}
```

### 2. Sending a Viber Message

To send a Viber message, specify the channel as 'viber' in the send method.

```php
use Mimisk13\LaravelEasySMS\Facades\EasySMS;

$viberResult = EasySMS::send('+1234567890', 'This is a Viber message', 'viber');

if ($viberResult) {
    echo "Viber message sent successfully!";
} else {
    echo "Failed to send Viber message.";
}
```

### 3. Checking Balance

You can check your account balance on easysms.gr using the getBalance method. This method returns your current balance details.

```php
use Mimisk13\LaravelEasySMS\Facades\EasySMS;

$balance = EasySMS::getBalance();

if ($balance && $balance['status'] == 1) {
    echo "Current balance: " . $balance['amount'];
} else {
    echo "Failed to retrieve balance.";
}
```

### 4. Mobile Number Verification

Use the mobile method to check the validity of a mobile number. This is useful to verify that the number is correct before sending a message.

```php
use Mimisk13\LaravelEasySMS\Facades\EasySMS;

$mobile = EasySMS::mobile('1234567890');

dump($mobile);

// result
array [
  "status" => "1"
  "remarks" => "Success"
  "error" => "0"
  "total" => 1
  "mobile" => array [
    "msisdn" => "301234567890"
    "national" => "1234567890"
    "country" => "GREECE"
    "countryCode" => 30
    "gsmCode" => "123"
    "number" => "4567890"
    "mcc" => "202"
    "mnc" => "05"
    "cost" => 1
  ]
]
```

## Change log

Please see the [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details and a todolist.

## Credits

- [Mimis K][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [LICENSE file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mimisk13/laravel-easysms.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mimisk13/laravel-easysms.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mimisk13/laravel-easysms/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/mimisk13/laravel-easysms
[link-downloads]: https://packagist.org/packages/mimisk13/laravel-easysms
[link-travis]: https://travis-ci.org/mimisk13/laravel-easysms
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/mimisk13
[link-contributors]: ../../contributors
