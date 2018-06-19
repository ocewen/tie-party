<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
    public function render($request, Exception $e)
	{
	    if($e instanceof NotFoundHttpException)
	    {
	        return response()->view('missing', [], 404);
	    }
	    
	    // Controlamos si se supera el tamaño máximo de imagen
	    if ($e instanceof \Illuminate\Http\Exceptions\PostTooLargeException)
            return redirect()->back()->with('status', 'No se ha podido subir la imagen porque supera el límite de tamaño');
        
	    return parent::render($request, $e);
	}
}
