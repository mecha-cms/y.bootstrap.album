<?php namespace y\bootstrap\album;

function page__content($content) {
    if (!$content) {
        return $content;
    }
    $content = \strtr($content, [
        '<blockquote>' => '<blockquote class="blockquote">',
        '<figcaption>' => '<figcaption class="figure-caption">',
        '<figure>' => '<figure class="figure">',
        '<table>' => '<table class="table">'
    ]);
    if (false !== \strpos($content, '<img ')) {
        $content = \preg_replace_callback('/<img(\s[^>]*?)?>/', static function ($m) {
            $img = new \HTML($m[0]);
            $img_classes = \preg_split('/\s+/', $img['class'] ?? "", -1, PREG_SPLIT_NO_EMPTY);
            $img_classes[] = 'img-fluid';
            $img_classes[] = 'rounded';
            \sort($img_classes);
            $img['class'] = \implode(' ', \array_unique($img_classes));
            return (string) $img;
        }, $content);
    }
    if (false !== \strpos($content, '</figure>')) {
        $content = \preg_replace_callback('/<figure(\s[^>]*?)?>([\s\S]*?)<\/figure>/', static function ($m) {
            $f = new \HTML($m[0], true);
            $figure = [$f[0], $f[1], $f[2]];
            if (\is_array($figure[1] ?? 0)) {
                foreach ($figure[1] as &$v) {
                    if (\is_array($v) && 'img' === $v[0]) {
                        $classes = \preg_split('/\s+/', $v[2]['class'] ?? "", -1, \PREG_SPLIT_NO_EMPTY);
                        $classes[] = 'figure-img';
                        \sort($classes);
                        $v[2]['class'] = \implode(' ', \array_unique($classes));
                    }
                }
                unset($v);
            }
            return new \HTML($figure, true);
        }, $content);
    }
    return $content;
}

function y__t_o_c($y) {
    $classes = \preg_split('/\s+/', $y[2]['class'] ?? "", -1, \PREG_SPLIT_NO_EMPTY);
    $classes[] = 'mb-4';
    \sort($classes);
    $y[2]['class'] = \implode(' ', \array_unique($classes));
    return $y;
}

$z = \defined("\\TEST") && \TEST ? '.' : '.min.';
\Asset::set(__DIR__ . \D . 'index' . $z . 'css', 20);
\Asset::set(__DIR__ . \D . 'index' . $z . 'js', 20);

\Hook::set('page.content', __NAMESPACE__ . "\\page__content");
\Hook::set('y.t-o-c', __NAMESPACE__ . "\\y__t_o_c");

$states = [
    'route-about' => '/about',
    'route-album' => '/article',
    'route-contact' => '/contact',
    'x.comment.page.type' => 'Markdown',
    'x.page.page.type' => 'Markdown'
];

foreach ($states as $k => $v) {
    !\State::get($k) && \State::set($k, $v);
}

foreach (['about', 'contact'] as $v) {
    $folder = \LOT . \D . 'page' . \D . \trim($state->{\f2p('route-' . $v)} ?? $v, '/');
    if ($file = \exist([
        $folder . '.archive',
        $folder . '.page'
    ], 1)) {
        \lot($v, new \Page($file));
    } else {
        \lot($v, new \Page);
    }
}