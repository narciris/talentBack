<?php

namespace Src\Domain\ValueObjects;

use Src\Domain\Exceptions\PostStatusInvalidException;

class Status
{
    public string $value;

    public const VISIBLE = 'visible';
    public const HIDDEN = 'hidden';
    public function __construct(string $value)
    {
        if(!in_array($value, [self::HIDDEN,self::VISIBLE])){
            throw new PostStatusInvalidException(40);
        }
        $this->value = $value;
    }

    public static function fromString(string $value):self
    {
        return new self($value);
    }

}
