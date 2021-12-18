<?php 

namespace App\service;

class JsonResponseOutput 
{
    private bool $success;
    private ?array $data;
    private ?string $message;
    private ?int $statusCode;

    public function set(bool $success, ?array $data, ?string $message, ?int $statusCode)
    {
        $this->success = $success;
        $this->data = $data;
        $this->message = $message;
        $this->statusCode = $statusCode;

        return $this;
    }

    public function output()
    {
        return response()->json([
            'success' => $this->success,
            'data' => $this->data,
            'message' => $this->message
        ], $this->statusCode);
    }
}