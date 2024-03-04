<?php

namespace App\Services\Crypto;

class Crypto
{
    public static function crypto(string $value, string $type = 'C'): string
    {
        /*Tratamento de Variáveis*/
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'g5SbZuwEDYy9CbsOSaEKYmg5SbZuwEDYy9CbsOSaEKYmvcJ11p3nVz5G8I4j1s1Ij8zKRKbTvcJ11p3nVz5G8I4j1s1Ij8zKRKbT';
        $secret_iv = 'kj6gbpx9vnOuJ3wZEvkj6gbpx9vnOuJ3wZEvtAcNG59cej4vl9mIoXvftt3ezuQbGBTPtAcNG59cej4vl9mIoXvftt3ezuQbGBTP';

        //hash
        $key = hash('sha256', $secret_key);

        //iv - para AES-256-CBC
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //Saída
        if ($type === 'C') {
            return base64_encode(openssl_encrypt($value, $encrypt_method, $key, 0, $iv));
        }
        if ($type === 'D') {
            return openssl_decrypt(base64_decode($value), $encrypt_method, $key, 0, $iv);
        }
        return '';
    }
    
}
