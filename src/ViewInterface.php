<?php

declare(strict_types=1);

namespace Kommai\View;

use Kommai\Http\Response;

interface ViewInterface
{
    public function toResponse(): Response;
}
