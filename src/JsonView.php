<?php

declare(strict_types=1);

namespace Kommai\View;

use Kommai\Http\Response;

class JsonView implements ViewInterface
{
    use ViewTrait;

    private const MEDIA_TYPE = 'application/json; charset=UTF-8';

    public function toResponse(): Response
    {
        $response = new Response();
        $response->body = json_encode($this->data);
        $response->headers['Content-Type'] = self::MEDIA_TYPE;
        return $response;
    }
}
