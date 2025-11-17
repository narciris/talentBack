<?php

namespace Src\Auth\Infrastructure\DTos\Response;

class PermissionsResponseDto
{
    public int $id;
    public string $name;
    public string $description;

    public function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function toArray():array
    {
        return [
            'name' => $this->name,
            'id' => $this->id,
            'description' => $this->description,
        ];
    }
    public  static function fromModel($permission):self
    {
        return new self(
          id: $permission->id,
           name: $permission->name,
          description:  $permission->description
        );
    }
}
