<?php

namespace App\Domain\Exceptions;

use App\Domain\ValueObjects\Cpf;
use Exception;
use Throwable;

class RegistrationNotFoundException extends Exception {

    public function __construct(Cpf $cpf, $code = 0, Throwable $previous = null) {

        $message = "Inscrição com CPF: $cpf não encontrado";
        parent::__construct($message, $code, $previous);
    }

}
