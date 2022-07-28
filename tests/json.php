<?php

declare(strict_types=1);

use Kommai\View\JsonView;

require_once __DIR__ . '/../vendor/autoload.php';

$view = new JsonView();
$view->data['ini'] = ini_get_all();
$response = $view->toResponse();
$response->headers['X-Extra-Header'] = 'some extra value';
$response->dump(['A', 'B', 'C']);
var_dump($response);
