<?php

$z = defined('TEST') && TEST ? '.' : '.min.';
Asset::set(__DIR__ . D . 'index' . $z . 'css', 20);
Asset::set(__DIR__ . D . 'index' . $z . 'js', 20);

$states = [
    'route-about' => '/about',
    'route-album' => '/article',
    'route-contact' => '/contact',
    'x.comment.page.type' => 'Markdown',
    'x.page.page.type' => 'Markdown'
];

foreach ($states as $k => $v) {
    !State::get($k) && State::set($k, $v);
}

foreach (['about', 'contact'] as $v) {
    $folder = LOT . D . 'page' . D . trim($state->{f2p('route-' . $v)} ?? $v, '/');
    if ($file = exist([
        $folder . '.archive',
        $folder . '.page'
    ], 1)) {
        lot($v, new Page($file));
    } else {
        lot($v, new Page);
    }
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