<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class GrantingBadgeException extends Exception
{
    public function __construct($message = "Granting badge exception", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
