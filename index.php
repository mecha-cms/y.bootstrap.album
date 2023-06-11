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

Hook::set('page.content', function ($content) {
    if (!$content) {
        return $content;
    }
    $content = strtr($content, [
        '<blockquote>' => '<blockquote class="blockquote">',
        '<table>' => '<table class="table">'
    ]);
    if (false !== strpos($content, '<img ')) {
        $content = preg_replace_callback('/<img(\s[^>]*?)?>/', static function ($m) {
            $img = new HTML($m[0]);
            $img_classes = preg_split('/\s+/', $img['class'] ?? "", -1, PREG_SPLIT_NO_EMPTY);
            $img_classes[] = 'img-fluid';
            $img_classes[] = 'rounded';
            sort($img_classes);
            $img['class'] = implode(' ', array_unique($img_classes));
            return (string) $img;
        }, $content);
    }
    return $content;
});

Hook::set('y.t-o-c', function ($y) {
    $class = preg_split('/\s+/', $y[2]['class'] ?? "", -1, PREG_SPLIT_NO_EMPTY);
    $class[] = 'mb-4';
    sort($class);
    if ($class) {
        $y[2]['class'] = \implode(' ', \array_unique($class));
    }
    return $y;
});