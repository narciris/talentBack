<?php

namespace Src\Auth\Domain\Entities;

class PostEntity
{

    public  string $title;
    public  string $content;
    public  int $userId;
    public bool $status;

    public function __construct(
       string $title,
        string $content,
      int $userId, bool $status)
    {
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
        $this->status = $status;
    }

}
