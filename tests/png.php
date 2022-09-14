<?php

declare(strict_types=1);

use Kommai\View\PngView;

require_once __DIR__ . '/../vendor/autoload.php';

$view = new PngView();
$view->image = __DIR__ . '/cyberpunk.png';
$response = $view->toResponse();

foreach ($response->headers as $name => $value) {
    header(sprintf('%s: %s', $name, $value));
}
echo $response->body;
