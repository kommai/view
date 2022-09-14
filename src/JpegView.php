<?php

declare(strict_types=1);

namespace Kommai\View;

use Kommai\Http\Response;

class JpegView implements ViewInterface
{
    use ViewTrait, ImageViewTrait;

    public const MEDIA_TYPE = 'image/jpeg';

    public function toResponse(): Response
    {
        return $this->renderImageAs(self::MEDIA_TYPE);
    }
}
