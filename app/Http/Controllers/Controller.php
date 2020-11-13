<?php

namespace App\Http\Controllers;

use App\Enum\ResultCode;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
     * @return array
     */
    public function format(array $result): array
    {
        return [
            'result' => $this->isSuccess($result),
            'data' => Arr::get($result, 'data', []),
            'message' => Arr::get($result, 'message'),
        ];
    }

    /**
     * @var string $message
     * @var $data
     * 
     * @return array
     */
    public function formatException(string $message, $data = [])
    {
        return [
            'result' => false,
            'data' => $data,
            'message' => $message,
        ];
    }

    /**
     * @var string $e
     * @var int $statusCode
     * 
     * @return Illuminate\Http\Response
     */
    public function exceptionResponse(\Exception $e, int $statusCode = 422)
    {
        return response()->json($this->formatException($e->getMessage()), $statusCode);
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

    /**
     * @param array $result
     * 
     * @return mix
     */
    public function getResult(array $result)
    {
        return Arr::get($result, 'result');
    }
}
