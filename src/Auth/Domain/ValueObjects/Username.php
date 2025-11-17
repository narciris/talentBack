<?php

namespace Src\Auth\Domain\ValueObjects;

class Username
{
   private string $value;

   public function __construct(string $value){

       if(empty($value) || $value === ''){
           throw new \InvalidArgumentException("el username no puede star vacio");
       }

       if(strlen($value) < 2 || strlen($value) > 32){
           throw new \InvalidArgumentException("EL username no contiene caracteres correctos");
       }
//       if (!preg_match('/^[a-zA-Z0-9_]+$/', $value)) {
//           throw new \InvalidArgumentException('El username solo puede contener letras, números y guion bajo');
//       }
       $this->value = $value;
   }

   public function value():string{
       return $this->value;
   }

   public function __toString():string{
       return $this->value;
   }

    public static function fromString(string $value): self
    {
        return new self($value);
    }
}
