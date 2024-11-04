<?php

return [

    /*
    |--------------------------------------------------------------------------
    | EasySMS API Key
    |--------------------------------------------------------------------------
    |
    | This value is your unique API key for the EasySMS service, which is
    | required to authenticate requests to the easysms.gr API. Make sure
    | to set this value in your environment file (.env) as 'EASY_SMS_API_KEY'.
    |
    */

    'api_key' => env('EASY_SMS_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | SMS Endpoint URL
    |--------------------------------------------------------------------------
    |
    | This URL is the endpoint for sending SMS messages via easysms.gr.
    | By default, it is set to 'https://easysms.gr/api/sms/send', but you
    | may override this by setting 'EASY_SMS_SMS_URL' in your .env file.
    | This is where all SMS message requests will be sent.
    |
    */

    'sms_url' => env('EASY_SMS_SMS_URL', 'https://easysms.gr/api/sms/send'),

    /*
    |--------------------------------------------------------------------------
    | Viber Endpoint URL
    |--------------------------------------------------------------------------
    |
    | This URL is the endpoint for sending Viber messages through easysms.gr.
    | If no custom endpoint is specified in your .env file under the variable
    | 'EASY_SMS_VIBER_URL', the default value 'https://easysms.gr/api/viber/send'
    | will be used. Use this endpoint to send messages over Viber.
    |
    */

    'viber_url' => env('EASY_SMS_VIBER_URL', 'https://easysms.gr/api/viber/send'),

    /*
    |--------------------------------------------------------------------------
    | Balance Check Endpoint URL
    |--------------------------------------------------------------------------
    |
    | This URL is used to retrieve your current balance on easysms.gr.
    | You can set a custom URL in your .env file as 'EASY_SMS_BALANCE_URL',
    | otherwise, the default URL 'https://easysms.gr/api/me/balance' will be used.
    | This endpoint helps you monitor your account balance.
    |
    */

    'balance_url' => env('EASY_SMS_BALANCE_URL', 'https://easysms.gr/api/me/balance'),

    /*
    |--------------------------------------------------------------------------
    | Mobile Number Verification Endpoint URL
    |--------------------------------------------------------------------------
    |
    | This URL is used to verify if a mobile number is valid via easysms.gr.
    | If you wish to use a different URL, set 'EASY_SMS_MOBILE_CHECK_URL' in
    | your .env file. By default, it points to 'https://easysms.gr/api/mobile/check'.
    | Use this endpoint to validate mobile numbers before sending messages.
    |
    */

    'mobile_check_url' => env('EASY_SMS_MOBILE_CHECK_URL', 'https://easysms.gr/api/mobile/check'),

];
