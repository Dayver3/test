<?php

namespace App\Services;

/**
 *
 */
class ResponseService
{
    /**
     * @param $data
     * @param int $code
     * @param bool $success
     * @param string $message
     * @return array
     */
    public function getResponse($data, int $code = 200, bool $success = true, string $message = 'Success'): array
    {
        return [
            "status" => $success,
            "code" => $code,
            "message" => $message,
            "data" => $data,
        ];
    }
}
