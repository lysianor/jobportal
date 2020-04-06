<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // if($this->isHttpException($exception))
        // {
        //     switch ($exception->getStatusCode()) 
        //     {
        //         case 404:
        //             return redirect()->route('notfound');
        //             break;
                    
        //         case '500':
        //             return redirect()->route('notfound');
        //             break;

        //         default:
        //             return $this->isHttpException($e);
        //             break;
        //     }
        // }
        return parent::render($request, $exception);
    }

protected function unauthenticated($request, AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }

    // Customize the redirect based on the guard
    // Note that we don't know which guard failed here, but I can't find an elegant way
    // to handle this and I know in this project I am only using one guard at a time anyway.
    $middleware = request()->route()->gatherMiddleware();
    $guard = config('auth.defaults.guard');
    foreach($middleware as $m) {
        if(preg_match("/auth:/",$m)) {
            list($mid, $guard) = explode(":",$m);
        }
    }

    switch($guard) {

        case 'admin':
            $login = 'jobseeker/myprofile';
            break;
        
        default:
            $login = 'admin/myprofile';
            break;
    }

    return redirect()->guest($login);
}

//     protected function unauthenticated($request, AuthenticationException $exception)
// {
//     if ($request->expectsJson()) {
//         return response()->json(['message' => $exception->getMessage()], 401);
//     }
 
//     $guard = Arr::get($exception->guards(), 0);
    
//     switch ($guard) {
//         case 'admin':
//             $route = 'admin.admin-login';
//             break;
//        default:
//             $route = 'login';
//     }

//     return redirect()->guest(route($route));
// }

}


