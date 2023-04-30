<?php

Asset::set('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', 20, [
    'integrity' => 'sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ',
    'crossorigin' => 'anonymous'
]);

Asset::set('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js', 20, [
    'integrity' => 'sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe',
    'crossorigin' => 'anonymous'
]);

$defaults = [
    'route-about' => '/about',
    'route-gallery' => '/gallery',
    'route-contact' => '/contact',
    'x.comment.page.type' => 'Markdown',
    'x.page.page.type' => 'Markdown'
];

foreach ($defaults as $k => $v) {
    !State::get($k) && State::set($k, $v);
}
