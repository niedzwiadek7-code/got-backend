<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class VerifyingEntryException extends Exception
{
    public function __construct($message = "Verifying entry exception", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
