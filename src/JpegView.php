<?php

declare(strict_types=1);

namespace Kommai\View;

use Kommai\Http\Response;
use RuntimeException;

class JpegView implements ViewInterface
{
    use ViewTrait, ImageViewTrait;

    private const MEDIA_TYPE = 'image/jpeg';

    public function toResponse(): Response
    {
        if (!is_readable($this->image)) {
            throw new RuntimeException(sprintf('%s is unavailable', $this->image));
        }

        $response = new Response();
        $response->body = file_get_contents($this->image);
        $response->headers['Content-Type'] = self::MEDIA_TYPE;
        return $response;
    }
}
