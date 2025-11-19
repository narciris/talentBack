<?php

namespace Src\Auth\Infrastructure\DTos\Response;


class PostResponseDto
{
    public int $id;
    public string $title;
    public string $content;
    public string $status;

    public function __construct(int $id, string $title, string $content, string $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
    }

    public static function fromModel($model):self
    {
        return new self(
            $model->id,
            $model->title,
            $model->content,
            $model->status

        );
    }

    public function toArray():array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->title,
            'contenido'  => $this->content,
            'estado' => $this->status
        ];

    }

}
