<?php

declare(strict_types=1);

use Kommai\View\HtmlView;

require_once __DIR__ . '/../vendor/autoload.php';

$view = new HtmlView(new PHPTAL());
foreach (ini_get_all(null, false) as $name => $value) {
    $view->data['ini'][] = [
        'name' => $name,
        'value' => (string) $value,
    ];
}
$response = $view->render('html.html')->toResponse();
$response->headers['X-Extra-Header'] = 'some extra value';
$response->dump(['A', 'B', 'C']);
var_dump($response);
