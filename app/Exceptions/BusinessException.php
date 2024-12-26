<?php

namespace App\Exceptions;

use Throwable;

class BusinessException extends \RuntimeException
{
    private string $userMessage;
    private int $userCode;

    public function __construct($message = "Что то пошло не так, попробуйте позже.", $code = 422, Throwable $previous = null)
    {
        $this->userMessage = $message;
        $this->userCode = $code;
        parent::__construct($message, $code, $previous);
    }

    public function getUserMessage(): string
    {
        return $this->userMessage;
    }

    public function getUserCode(): int
    {
        return $this->userCode;
    }
}
