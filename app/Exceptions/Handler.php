<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use App\Classes\ContentHelper;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
        // A NotFoundHttpException means none of the defined routes for the CMS
        // matched any content so it's possible the content is part of the dynamic
        // functionality. We should now do a database lookup.
        if($exception instanceof NotFoundHttpException) {
            try
            {
                // take a proxy into account first using the X-Forwarded-Host header
                if(!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
                    $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
                }
                else
                {
                    // no proxy so go off the value that PHP reports; if THAT header
                    // is empty then just assume localhost
                    $host = (!empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost');
                }

                $path = $request->path(); // retrieves the path info component
                $content = ContentHelper::getContent($host, $path);
                return response($content, 200);
            }
            catch(NotFoundHttpException $e) {
                // TODO: the content was TRULY not found so display a 404 page
                // with the response code of 404 based on what kind of Not Found
                // error was triggered
                if($request->is("cms-admin/*")) {
                    // CMS error page
                    return response("CMS 404 Not Found", 404);
                }

                // dynamic content error page
                return response("404 Not Found", 404);
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
