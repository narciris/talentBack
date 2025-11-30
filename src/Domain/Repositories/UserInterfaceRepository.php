<?php

namespace Src\Domain\Repositories;

use Src\Domain\ValueObjects\Username;

interface UserInterfaceRepository
{

    public function finByUsername(Username $username);
    public function create(array $data);

    public function findById(int $id);
}
