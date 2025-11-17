<?php

namespace Src\Auth\Domain\ValueObjects;

class Password
{

    private $value;

    public function __construct(string $value)
    {
        if(empty($value) || $value === '' ){
            throw new \InvalidArgumentException("contraseña no puede estar vacia");
        }

        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&._-])[A-Za-z\d@$!%*?&._-]{8,}$/', $value)) {
            throw new \InvalidArgumentException(
                'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.'
            );
        }
        $this->value = $value;

    }

    public function value():string{
        return $this->value;
    }

    public function __toString():string
    {
        return $this->value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

}
