<?php

declare(strict_types=1);

namespace Kommai\View;

use Kommai\Http\Response;

class WebpView implements ViewInterface
{
    use ViewTrait, ImageViewTrait;

    public const MEDIA_TYPE = 'image/webp';

    public function toResponse(): Response
    {
        return $this->renderImageAs(self::MEDIA_TYPE);
    }
}
