<?php


namespace AsocialMedia\AllegroApi\Exceptions;


final class ExceptionFactory
{
    public static function throw( int $code, object $response )
    {
        switch ($code)
        {
            case 400 :
                throw new BadRequestException( 'Bad request', 400, null, $response );
            case 401 :
                throw new UnauthorizedException( 'Unauthorized', 401, null, $response );
            case 403 :
                throw new ForbiddenException( 'Forbidden', 403, null, $response );
            case 404 :
                throw new NotFoundException( 'Not found', 404, null, $response );
            case 422 :
                throw new InvalidParameterException( 'Invalid parameter', 422, null, $response );
            case 429 :
                throw new TooManyRequestsException( 'Too many requests', 429, null, $response );
            case 500 :
                throw new InternalServerErrorException( 'Internal server error', 500, null, $response );
            case 502 :
                throw new BadGatewayException( 'Bad gateway', 502, null, $response );

            default:
                throw new \RuntimeException( 'An error has occurred: ' . print_r($response, true), $code );
        }
    }
}