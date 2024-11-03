<?php

namespace Mimisk13\LaravelEasySMS;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class EasySMS
{
    protected $client;
    protected $apiKey;
    protected $apiUrl;

    public function __construct(array $config)
    {
        $this->apiKey = $config['api_key'];
        $this->apiUrl = $config['api_url'] ?? 'https://easysms.gr/api/sms/send';
        $this->client = new Client();
    }

    public function check($mobile, $type = 'json')
    {
        try {
            $response = $this->client->post($this->apiUrl, [
                'form_params' => [
                    'key' => $this->apiKey,
                    'mobile' => $mobile,
                    'type' => $type,
                ],
            ]);

            $result = json_decode($response->getBody(), true);

            if ($result['status'] == 1) {
                return $result;
            } else {
                Log::error('EasySMS Error: ' . $result['remarks']);
                return false;
            }

        } catch (\Exception $e) {
            Log::error('EasySMS Exception: ' . $e->getMessage());
            return false;
        }
    }

    public function send($to, $message)
    {
        try {
            $response = $this->client->post($this->apiUrl, [
                'form_params' => [
                    'key' => $this->apiKey,
                    'to' => $to,
                    'text' => $message,
                ],
            ]);

            $result = json_decode($response->getBody(), true);

            if ($result['status'] == 1) {
                return $result;
            } else {
                Log::error('EasySMS Error: ' . $result['remarks']);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('EasySMS Exception: ' . $e->getMessage());
            return false;
        }
    }
}
