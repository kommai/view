<?php

declare(strict_types=1);

namespace Kommai\View;

use BadMethodCallException;
use Kommai\Http\Response;
use PHPTAL;

class HtmlView implements ViewInterface
{
    use ViewTrait;

    public const MEDIA_TYPE = 'text/html; charset=UTF-8';

    private PHPTAL $tal;
    private ?string $html = null;

    public function __construct(PHPTAL $tal)
    {
        $this->tal = $tal;
    }

    public function render(string $template): self
    {
        $this->tal->setTemplate($template);
        foreach ($this->data as $key => $value) {
            $this->tal->set($key, $value);
        }
        $this->html = $this->tal->execute();
        return $this;
    }

    public function toResponse(): Response
    {
        if (!isset($this->html)) {
            throw new BadMethodCallException('Not rendered yet');
        }
        $response = new Response();
        $response->body = $this->html;
        $response->headers['Content-Type'] = self::MEDIA_TYPE;
        return $response;
    }
}
