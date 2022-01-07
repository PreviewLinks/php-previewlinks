<?php

namespace Flowframe\Previewify;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Previewify
{
    public const IMAGE_ENDPOINT = 'https://previewify.app/api/image';

    public const ASYNC_IMAGE_ENDPOINT = 'https://previewify.app/api/async-image';

    public function __construct(
        public string $apiKey,
    ) {
    }

    public function image(int $templateId, array $fields): ResponseInterface
    {
        $data = [
            'template_id' => $templateId,
            'fields' => $fields,
        ];

        $signature = hash_hmac('sha256', json_encode($data), $this->apiKey);

        $http = HttpClient::create();

        return $http->request('POST', static::IMAGE_ENDPOINT, [
            'json' => [
                'data' => $data,
                'signature' => $signature,
            ],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function asyncImage(int $templateId, array $fields): string
    {
        $data = base64_encode(json_encode([
            'template_id' => $templateId,
            'fields' => $fields,
        ]));

        $signature = hash_hmac('sha256', $data, $this->apiKey);

        $query = http_build_query([
            'data' => $data,
            'signature' => $signature,
        ]);

        return static::ASYNC_IMAGE_ENDPOINT . '?' . $query;
    }
}
