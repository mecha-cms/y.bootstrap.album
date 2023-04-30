<!DOCTYPE html>
<html data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <meta content="initial-scale=1,width=device-width" name="viewport">
    <?php if ($w = w($page->description ?? $site->description)): ?>
      <meta content="<?= $w; ?>" name="description">
    <?php endif; ?>
    <?php if ('archive' === $page->x): ?>
      <!-- Prevent search engines from indexing pages with `archive` state -->
      <meta content="noindex" name="robots">
    <?php endif; ?>
    <meta content="<?= eat($page->author); ?>" name="author">
    <title>
      <?= w($t->reverse); ?>
    </title>
    <link href="<?= eat($url); ?>/favicon.ico" rel="icon">
    <link href="<?= eat($url->current(false, false)); ?>" rel="canonical">
    <meta content="#712cf9" name="theme-color">
  </head>
  <body>
    <?= self::header(); ?>
    <main>