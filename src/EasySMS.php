<?php

namespace Mimisk13\LaravelEasySMS;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class EasySMS
{
    protected Client $client;
    protected mixed $apiKey;
    protected mixed $smsUrl;
    protected mixed $viberUrl;
    private mixed $mobileCheckUrl;
    private mixed $balanceUrl;

    public function __construct(array $config)
    {
        $this->apiKey = $config['api_key'];
        $this->smsUrl = $config['sms_url'];
        $this->viberUrl = $config['viber_url'];
        $this->mobileCheckUrl = $config['mobile_check_url'];
        $this->balanceUrl = $config['balance_url'];
        $this->client = new Client();
    }

    public function request($method, $endpoint, array $data = [])
    {
        try {
            $response = $this->client->request($method, $endpoint, [
                'form_params' => array_merge(['key' => $this->apiKey, 'type' => 'json'], $data),
            ]);

            return json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            Log::error("EasySMS API Error: " . $e->getMessage());
            return false;
        }
    }

    public function getBalance()
    {
        return $this->request('POST', $this->balanceUrl);
    }

    public function mobile($mobile, $type = 'json')
    {
        return $this->request('POST', $this->mobileCheckUrl, [
            'mobile' => $mobile,
            'type' => $type,
        ]);
    }

    public function send($to, $message, $channel = 'sms')
    {
        $endpoint = $channel === 'viber' ? $this->viberUrl : $this->smsUrl;

        return $this->request('POST', $endpoint, [
            'to' => $to,
            'text' => $message,
        ]);
    }
}
