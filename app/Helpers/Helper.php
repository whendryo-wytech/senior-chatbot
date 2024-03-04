<?php

use App\Services\Crypto\Crypto;
use App\Services\Session\Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

if (!function_exists('cencrypt')) {
    function cencrypt(string $string): string
    {
        return Crypto::crypto($string, 'C');
    }
}

if (!function_exists('cdecrypt')) {
    function cdecrypt(string $string): string
    {
        return Crypto::crypto($string, 'D');
    }
}

if (!function_exists('intToHourString')) {
    function intToHourString(int $time): string
    {
        return str_pad((int)($time / 60), 2, '0', STR_PAD_LEFT).':'.str_pad($time % 60, 2, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('session_api')) {
    /**
     * @throws JsonException
     */
    function session_api(): Session
    {
        return new Session();
    }
}

if (!function_exists('formatHcmId')) {
    function formatHcmId(?int $numemp, ?int $tipcol, ?int $numcad): ?string
    {
        if ((!$numemp) || (!$tipcol) || (!$numcad)) {
            return null;
        }

        return str_pad($numemp, 10, '0', STR_PAD_LEFT).
            str_pad($tipcol, 10, '0', STR_PAD_LEFT).
            str_pad($numcad, 10, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('splitHcmId')) {
    function splitHcmId(string $hcmId): ?object
    {
        $array = str_split($hcmId, 10);
        $array = array_filter($array);
        $key = ["NUMEMP", "TIPCOL", "NUMCAD"];
        return (object)array_combine($key, array_map('intval', $array));
    }
}

if (!function_exists('formatOtherHcmId')) {
    function formatOtherHcmId(?array $array = []): ?string
    {
        if ($array) {
            $str = "";
            foreach ($array as $item) {
                $str .= str_pad($item, 10, '0', STR_PAD_LEFT);
            }
            return $str;
        }

        return null;
    }
}

if (!function_exists('userId')) {
    function userId(): ?int
    {
        return auth()->user()?->id ?? null;
    }
}

if (!function_exists('assetsFrontend')) {
    function assetsFrontend(): object
    {
        return (object)[
            'logo'           => env('FRONTEND_URL')."/_nuxt/assets/images/logo.png",
            'email_reproved' => env('FRONTEND_URL')."/_nuxt/assets/images/reproved.png",
            'email_approved' => env('FRONTEND_URL')."/_nuxt/assets/images/approved.png",
        ];
    }
}

if (!function_exists('infoUploadFile')) {
    function infoUploadFile(UploadedFile $file): object
    {
        //Verifica o MIME do arquivo
        $info = finfo_open();
        $mime = finfo_buffer($info, $file->get(), FILEINFO_MIME_TYPE);
        $size = (int)ceil((strlen($file->get()) * 3 / 4) / 1024);

        //Monta o nome do arquivo
        $ext = "bin";
        switch ($mime) {
            case 'audio/aac':
                $ext = '.aac';
                break;
            case 'application/x-abiword':
                $ext = '.abw';
                break;
            case 'application/x-freearc':
                $ext = '.arc';
                break;
            case 'image/avif':
                $ext = '.avif';
                break;
            case 'video/x-msvideo':
                $ext = '.avi';
                break;
            case 'application/vnd.amazon.ebook':
                $ext = '.azw';
                break;
            case 'application/octet-stream':
                $ext = '.bin';
                break;
            case 'image/bmp':
                $ext = '.bmp';
                break;
            case 'application/x-bzip':
                $ext = '.bz';
                break;
            case 'application/x-bzip2':
                $ext = '.bz2';
                break;
            case 'application/x-cdf':
                $ext = '.cda';
                break;
            case 'application/x-csh':
                $ext = '.csh';
                break;
            case 'text/css':
                $ext = '.css';
                break;
            case 'text/csv':
                $ext = '.csv';
                break;
            case 'application/msword':
                $ext = '.doc';
                break;
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                $ext = '.docx';
                break;
            case 'application/vnd.ms-fontobject':
                $ext = '.eot';
                break;
            case 'application/epub+zip':
                $ext = '.epub';
                break;
            case 'application/gzip':
                $ext = '.gz';
                break;
            case 'image/gif':
                $ext = '.gif';
                break;
            case 'text/html':
                $ext = '.html';
                break;
            case 'image/vnd.microsoft.icon':
                $ext = '.ico';
                break;
            case 'text/calendar':
                $ext = '.ics';
                break;
            case 'application/java-archive':
                $ext = '.jar';
                break;
            case 'image/jpeg':
                $ext = '.jpg';
                break;
            case 'text/javascript (Specifications: HTML and RFC 9239)':
                $ext = '.js';
                break;
            case 'application/json':
                $ext = '.json';
                break;
            case 'application/ld+json':
                $ext = '.jsonld';
                break;
            case 'audio/midi, audio/x-midi':
                $ext = '.mid';
                break;
            case 'text/javascript':
                $ext = '.mjs';
                break;
            case 'audio/mpeg':
                $ext = '.mp3';
                break;
            case 'video/mp4':
                $ext = '.mp4';
                break;
            case 'video/mpeg':
                $ext = '.mpeg';
                break;
            case 'application/vnd.apple.installer+xml':
                $ext = '.mpkg';
                break;
            case 'application/vnd.oasis.opendocument.presentation':
                $ext = '.odp';
                break;
            case 'application/vnd.oasis.opendocument.spreadsheet':
                $ext = '.ods';
                break;
            case 'application/vnd.oasis.opendocument.text':
                $ext = '.odt';
                break;
            case 'audio/ogg':
                $ext = '.oga';
                break;
            case 'video/ogg':
                $ext = '.ogv';
                break;
            case 'application/ogg':
                $ext = '.ogx';
                break;
            case 'audio/opus':
                $ext = '.opus';
                break;
            case 'font/otf':
                $ext = '.otf';
                break;
            case 'image/png':
                $ext = '.png';
                break;
            case 'application/pdf':
                $ext = '.pdf';
                break;
            case 'application/x-httpd-php':
                $ext = '.php';
                break;
            case 'application/vnd.ms-powerpoint':
                $ext = '.ppt';
                break;
            case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
                $ext = '.pptx';
                break;
            case 'application/vnd.rar':
                $ext = '.rar';
                break;
            case 'application/rtf':
                $ext = '.rtf';
                break;
            case 'application/x-sh':
                $ext = '.sh';
                break;
            case 'image/svg+xml':
                $ext = '.svg';
                break;
            case 'application/x-tar':
                $ext = '.tar';
                break;
            case 'image/tiff':
                $ext = '.tif';
                break;
            case 'video/mp2t':
                $ext = '.ts';
                break;
            case 'font/ttf':
                $ext = '.ttf';
                break;
            case 'text/plain':
                $ext = '.txt';
                break;
            case 'application/vnd.visio':
                $ext = '.vsd';
                break;
            case 'audio/wav':
                $ext = '.wav';
                break;
            case 'audio/webm':
                $ext = '.weba';
                break;
            case 'video/webm':
                $ext = '.webm';
                break;
            case 'image/webp':
                $ext = '.webp';
                break;
            case 'font/woff':
                $ext = '.woff';
                break;
            case 'font/woff2':
                $ext = '.woff2';
                break;
            case 'application/xhtml+xml':
                $ext = '.xhtml';
                break;
            case 'application/vnd.ms-excel':
                $ext = '.xls';
                break;
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                $ext = '.xlsx';
                break;
            case 'application/xml':
                $ext = '.xml';
                break;
            case 'application/vnd.mozilla.xul+xml':
                $ext = '.xul';
                break;
            case 'application/zip':
                $ext = '.zip';
                break;
            case 'video/3gpp2':
                $ext = '.3g2';
                break;
            case 'application/x-7z-compressed':
                $ext = '.7z';
                break;
        }

        return (object)[
            'random'    => Str::uuid().$ext,
            'mime'      => $mime,
            'extension' => $ext,
            'size'      => $size,
            'file'      => $file,
        ];
    }
}


