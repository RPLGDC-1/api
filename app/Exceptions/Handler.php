<?php

namespace App\Exceptions;

use App\Traits\ApiTrait;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiTrait;
    
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

        $this->renderable(function(Exception $e, $request) {
            return $this->handleException($request, $e);
        });
    }

    public function handleException($request, Exception $e)
    {
        if($request->wantsJson()) {
            if($e instanceof ValidationException)
                return $this->sendError($e->errors(), 422);

            if($e instanceof AuthenticationException)
                return $this->sendResponse(['message' => $e->getMessage()], 401);

            if($e instanceof NotFoundHttpException)
                return $this->sendResponse(['message' => 'Your request not found'], 404);
    
            return $this->sendResponse(['message' => $e->getMessage()], 500);
        }
    }

}
