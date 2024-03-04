<?php

namespace App\Services\Session;

class Session
{
    /**
     * @throws \JsonException
     */
    public static function put(string $key, array $value): void
    {
        if (static::get($key)) {
            $value = array_merge($value, (array)static::get($key));
        }
        cache([
            md5($key) => cencrypt(json_encode($value, JSON_THROW_ON_ERROR))
        ], 60 * 60);
    }

    /**
     * @throws \JsonException
     */
    public static function get(string $key): mixed
    {
        if (cache(md5($key))) {
            return json_decode(cdecrypt(cache(md5($key))), false, 512, JSON_THROW_ON_ERROR);
        }
        return null;
    }

}
