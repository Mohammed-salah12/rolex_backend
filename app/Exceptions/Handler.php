<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Session\TokenMismatchException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            // Handle validation errors
            return response()->json(['icon' => 'error', 'title' => 'Validation error', 'message' => $e->getMessage()], 400);
        }

        if ($e instanceof QueryException) {
            // Handle database query errors
            return response()->json(['icon' => 'error', 'title' => 'Database query error occurred', 'message' => $e->getMessage()], 500);
        }

        if ($e instanceof FileNotFoundException) {
            // Handle file not found errors
            return response()->json(['icon' => 'error', 'title' => 'File not found', 'message' => $e->getMessage()], 404);
        }

        // Add more custom error handling logic as needed

        return parent::render($request, $e);
    }

}
