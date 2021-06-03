<?php


namespace AsocialMedia\AllegroApi\Exceptions;


use Throwable;

abstract class BaseException extends \Exception
{
    protected $errors = [];

    /**
     * BaseException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param $response
     */
    public function __construct( $message = "", $code = 0, Throwable $previous = null, $response)
    {
        if( !empty($response->errors) )
        {
            parent::__construct( $response->errors[0]->userMessage, $code, $previous );
            $this->errors = $response->errors;
        }elseif( !empty($response->error) ){
            parent::__construct( $response->error, $code, $previous );
        }else{
            parent::__construct( $message, $code, $previous );
        }
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}