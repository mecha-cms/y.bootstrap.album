<?php

$z = defined('TEST') && TEST ? '.' : '.min.';
Asset::set(__DIR__ . D . 'index' . $z . 'css', 20);
Asset::set(__DIR__ . D . 'index' . $z . 'js', 20);

foreach ([
    'route-about' => '/about',
    'route-album' => '/article',
    'route-contact' => '/contact',
    'x.comment.page.type' => 'Markdown',
    'x.page.page.type' => 'Markdown'
] as $k => $v) {
    !State::get($k) && State::set($k, $v);
}

$GLOBALS['about'] = new Page;
$GLOBALS['contact'] = new Page;

if ($file = exist([
    LOT . D . 'page' . D . trim($state->routeAbout ?? 'about', '/') . '.archive',
    LOT . D . 'page' . D . trim($state->routeAbout ?? 'about', '/') . '.page'
], 1)) {
    $GLOBALS['about'] = new Page($file);
}

if ($file = exist([
    LOT . D . 'page' . D . trim($state->routeContact ?? 'contact', '/') . '.archive',
    LOT . D . 'page' . D . trim($state->routeContact ?? 'contact', '/') . '.page'
], 1)) {
    $GLOBALS['contact'] = new Page($file);
}