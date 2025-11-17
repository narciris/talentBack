<?php

namespace Src\Auth\Domain\Repositories;

use Src\Auth\Domain\ValueObjects\Username;

interface UserInterfaceRepository
{

    public function finByUsername(Username $username);
    public function create(array $data);
}
