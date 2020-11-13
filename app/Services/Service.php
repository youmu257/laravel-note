<?php
namespace App\Services;

use App\Enum\ResultCode;
use Illuminate\Support\Arr;

class Service
{
    /**
     * @param ResultCode $status
     * @param $data
     * @param string $message
     * 
     * @return array
     */
    public function getResult(ResultCode $status, $data = [], string $message = ''): array
    {
        return [
            'result' => $status,
            'data' => $data,
            'message' => $message,
        ];
    }

    /**
     * @param mix $data
     * @param string $message
     * 
     * @return array
     */
    public function getSuccessResult($data = [], string $message = ''): array
    {
        return $this->getResult(ResultCode::SUCCESS(), $data, $message);
    }

    /**
     * @param string $message
     * @param mix $data
     * 
     * @return array
     */
    public function getFailResult(string $message = '', $data = []): array
    {
        return $this->getResult(ResultCode::FAIL(), $data, $message);
    }

    /**
     * @param array $result
     * 
     * @return bool
     */
    public function isSuccess(array $result): bool
    {
        return Arr::get($result, 'result') == ResultCode::SUCCESS();
    }

    /**
     * @param array $result
     * 
     * @return bool
     */
    public function isFail(array $result): bool
    {
        return Arr::get($result, 'result') != ResultCode::SUCCESS();
    }

    /**
     * @param array $result
     * 
     * @return string
     */
    public function getMessage(array $result): string
    {
        return Arr::get($result, 'message', '');
    }

    /**
     * @param array $result
     * 
     * @return mix
     */
    public function getData(array $result)
    {
        return Arr::get($result, 'data', []);
    }
}