<!DOCTYPE html>
<html data-bs-theme="<?= $state->y->{'bootstrap.album'}->theme ?? 'light'; ?>">
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
    <svg xmlns="http://www.w3.org/2000/svg" display="none">
      <symbol fill="currentColor" id="bi-camera" viewBox="0 0 16 16">
        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"></path>
        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
      </symbol>
    </svg>
    <?= self::header(); ?>
    <main>