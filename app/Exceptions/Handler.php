<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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

    public function render($request, Throwable $e)
    {
        //author
        if ($e instanceof \Illuminate\Auth\AuthenticationException && $request->is('api/*')) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
        //validate
        if ($e instanceof \Illuminate\Validation\ValidationException && $request->is('api/*')) {
            return response()->json($e->errors(), 422);
        }

        return parent::render($request, $e);
    }
}
