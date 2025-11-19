<?php

namespace Src\Auth\Domain\Exceptions;

use DomainException;
class PostStatusInvalidException extends DomainException
{
    public function __construct( string $status)
    {
         parent::__construct("El estado del post:  $status NO es valida" );
    }

}
