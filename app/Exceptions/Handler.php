<?php

namespace App\Exceptions;

use Exception;
use HttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Laravel\Sanctum\Exceptions\MissingAbilityException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Exception|Throwable $e)
    {
        if (
            ($e instanceof MissingAbilityException)
        ) {
            return response()->json([
                'data'  => false,
                'error' => $e->getMessage()
            ], Response::HTTP_FORBIDDEN);
        }

        if (($e instanceof HttpException) ||
            ($e instanceof MethodNotAllowedHttpException)
        ) {
            return response()->json([
                'data'  => false,
                'error' => $e->getMessage()
            ], $e->getStatusCode());
        }

        if ($e instanceof AuthenticationException) {
            return response()->json([
                'data'  => false,
                'error' => $e->getMessage()
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'data'  => false,
            'error' => [
                'id'      => null,
                'message' => $e->getMessage()
            ]
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
//        return parent::render($request, $e);
    }
}
