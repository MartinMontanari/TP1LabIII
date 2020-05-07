<?php


namespace App\Exceptions;

use Throwable;

/**
 * Class InvalidBodyException
 * @package App\Exceptions
 */
class InvalidBodyException extends \Exception
{
    private array $errorsArray;
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if(is_array($message)){
            $this->errorsArray = $message;
            $message= implode($message);
        }
        parent::__construct($message, $code, $previous);
    }
    public function getArrayMessages() : array{
        return $this->errorsArray;
    }
}
