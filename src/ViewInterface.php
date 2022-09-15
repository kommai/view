<?php

declare(strict_types=1);

namespace Kommai\View;

use Kommai\Http\Response;

interface ViewInterface
{
    public const MEDIA_TYPE = 'text/plain; charset=UTF-8';

    public function toResponse(): Response;
}
