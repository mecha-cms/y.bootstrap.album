<header data-bs-theme="dark">
  <div class="collapse text-bg-dark" id="navbar-header">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-8 py-4">
          <?php if ($about->exist): ?>
            <h4>
              <?= $about->title; ?>
            </h4>
            <p class="text-body-secondary">
              <?= $about->excerpt ?? $about->description; ?>
            </p>
          <?php else: ?>
            <h4>
              <?= i('Error'); ?>
            </h4>
            <p class="text-body-secondary" role="status">
              <?= i('Missing %s file.', "<code>.\\lot\\page\\" . strtr(trim($state->routeAbout ?? 'about', '/'), '/', "\\") . ".page</code>"); ?>
            </p>
          <?php endif; ?>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <?php if ($contact->exist): ?>
            <h4>
              <?= $contact->title; ?>
            </h4>
            <p class="text-body-secondary">
              <?= $contact->excerpt ?? $contact->description; ?>
            </p>
          <?php else: ?>
            <h4>
              <?= i('Error'); ?>
            </h4>
            <p class="text-body-secondary" role="status">
              <?= i('Missing %s file.', "<code>.\\lot\\page\\" . strtr(trim($state->routeContact ?? 'contact', '/'), '/', "\\") . ".page</code>"); ?>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?= self::nav(); ?>
</header>
<?= $site->is('home') ? self::hero() : ""; ?>