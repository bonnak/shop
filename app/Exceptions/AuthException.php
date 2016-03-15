<?php

namespace App\Exceptions;

use Exception;
//use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class AuthException extends \RuntimeException
{
    /**
     * Redirect response variable.
     * 
     * @var \Symfony\Component\HttpFoundation\Response
     */
    private $response;

    /**
     * Create a new object instance.
     * 
     * @param \Illuminate\Http\Response $response 
     */
    public function __construct($response)
    {
        parent::__construct('The given data failed to pass authenticated login.');

        $this->response = $response;
    }

    /**
     * Get the underlying response instance.
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
