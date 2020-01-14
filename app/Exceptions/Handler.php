<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];


    public function report(Exception $exception)
    {
        parent::report($exception);
    }


    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'Status-Code' => 404,
                'Message' => 'Entry for ' . str_replace('App\\', '', $exception->getModel()) . ' not found',
            ], 404);
        }
        if ($exception instanceof QueryException) {
            return response()->json([
                'Status-Code' => 500,
                'Message' => "",
            ], 500);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'Status-Code' => 404,
                'Message' => 'Page not found',
            ], 404);
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'Status-Code' => 405,
                'Message' => 'Method not allowed',
            ], 405);
        }


        return parent::render($request, $exception);
    }
}
