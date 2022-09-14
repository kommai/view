<?php

declare(strict_types=1);

use Kommai\View\JpegView;

require_once __DIR__ . '/../vendor/autoload.php';

$view = new JpegView();
$view->image = __DIR__ . '/cyberpunk.jpg';
$response = $view->toResponse();

foreach ($response->headers as $name => $value) {
    header(sprintf('%s: %s', $name, $value));
}
echo $response->body;
