<?php


namespace AsocialMedia\AllegroApi\Exceptions;


class UnauthorizedException extends BaseException
{
    protected $error_description;

    public function __construct( $message = "", $code = 0, Throwable $previous = null, $response)
    {
        if( !empty($response->error) )
        {
            parent::__construct( $response->error, $code, $previous );
            $this->error_description = $response->error_description;
        }else{
            parent::__construct( $message, $code, $previous );
        }
    }

    public function getErrorDesctiption()
    {
        return $this->error_description;
    }
}