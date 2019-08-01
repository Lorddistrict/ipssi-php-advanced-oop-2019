<?php
declare(strict_types=1);

namespace Application\Service\API;

/**
 * Class Music
 * @package Application\Service\API
 */
final class MusicAPI implements API
{
    /**
     * @param string $method
     * @param string $url
     * @param array|bool $data
     * @return string|null
     */
    public function callAPI($method, $url, $data): ?string
    {
        $curl = curl_init();
        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type' => 'application/json',
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){
            die("Connection Failure");
        }
        curl_close($curl);

        return $result;
    }
}