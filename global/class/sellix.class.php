<?php

if (!defined('allow')) {
    header("HTTP/1.0 404 Not Found");
}

if (!defined('k90plearptJQXxFZR2l7LRp8V')) {
    die('includes not found');
}

class SellixAutopayment
{
    private $api_key;
    private $api_url = 'https://dev.sellix.io/v1';

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    private function makeRequest($method, $endpoint, $data = [])
    {
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->api_key,
        ];

        $options = [
            CURLOPT_URL => $this->api_url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_CUSTOMREQUEST => $method,
        ];

        if (!empty($data)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
        }

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $decodedResponse = json_decode($response, true);

        if ($httpCode >= 400) {
            $errorData = array('API_error' => $decodedResponse['message'], 'timestamp' => date("d.m.Y H:i:s", time()));
            $errorJson = json_encode($errorData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            file_put_contents("error_log.json", $errorJson . "\n", FILE_APPEND);
        }


        return $decodedResponse;
    }

    public function createOrder($user_id, $value, $gateway)
    {
        $default_payload = [
            "title" => "Payments",
            "currency" => "USD",
            "quantity" => null,
            "email" => "no-reply@sellix.io",
            "white_label" => true,
            "return_url" => "https://stresse.re/global/ipn.php",
            "custom_fields" => [
                "user_id" => $user_id
            ],
            "value" => $value,
            "gateway" => $gateway,
            "webhook" => "https://stresse.re/global/ipn.php",
        ];

        $response = $this->makeRequest('POST', '/payments', $default_payload);
        return $response;
    }

    // Add more methods as needed for additional Sellix API functionality.
}

?>
