<?php

declare(strict_types=1);

namespace Kommai\View;

use BadMethodCallException;
use Kommai\Http\Response;
use RuntimeException;

trait ImageViewTrait
{
    public ?string $image = null;

    private function renderImageAs(string $type): Response
    {
        if (!isset($this->image)) {
            throw new BadMethodCallException('No image set');
        }
        if (!is_readable($this->image)) {
            throw new RuntimeException(sprintf('%s is unavailable', $this->image));
        }

        $response = new Response();
        $response->body = file_get_contents($this->image);
        $response->headers['Content-Type'] = $type;
        return $response;
    }
}
