<?php

namespace App\Services\Session;

use Exception;
use Illuminate\Support\Facades\Log;

class Session
{
    public static function put(string $key, array $value): void
    {
        try {
            cache([
                md5($key) => cencrypt(json_encode($value, JSON_THROW_ON_ERROR))
            ], 60 * 60);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public static function get(string $key): mixed
    {
        try {
            if (cache(md5($key))) {
                return json_decode(cdecrypt(cache(md5($key))), false, 512, JSON_THROW_ON_ERROR);
            }
            return null;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return null;
        }
    }

}
