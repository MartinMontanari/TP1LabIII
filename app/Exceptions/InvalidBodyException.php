<?php


namespace App\Exceptions;

use Throwable;

/**
 * Class InvalidBodyException
 * @package App\Exceptions
 */
class InvalidBodyException extends \Error implements Throwable
{

    /**
     * @var array
     */
    private array $messages;

    public function __construct($message = [])
    {
        $this->messages = $message;
        parent::__construct();
    }

    public function getMessages()
    {
        return $this->messages;
    }
}

