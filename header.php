<header data-bs-theme="dark">
  <div class="collapse text-bg-dark" id="navbar-header">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-8 py-4">
          <?php if ($about->exist): ?>
            <h4>
              <?= $about->title; ?>
            </h4>
            <div class="text-body-secondary">
              <?php if ($excerpt = $about->excerpt): ?>
                <?= $excerpt; ?>
              <?php else: ?>
                <p>
                  <?= $about->description; ?>
                </p>
              <?php endif; ?>
              <p>
                <a class="btn btn-primary btn-sm<?= 0 === strpos($url->current(false, false) . '/', $about->url . '/') ? ' disabled' : ""; ?>" href="<?= eat($about->url); ?>">
                  <?= i('More'); ?>
                </a>
              </p>
            </div>
          <?php else: ?>
            <h4>
              <?= i('Error'); ?>
            </h4>
            <p class="text-body-secondary" role="status">
              <?= i('Missing %s file.', "<code>.\\lot\\page\\" . strtr(trim($state->routeAbout ?? 'about', '/'), '/', "\\") . '.page</code>'); ?>
            </p>
          <?php endif; ?>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <?php if ($contact->exist): ?>
            <h4>
              <?= $contact->title; ?>
            </h4>
            <div class="text-body-secondary">
              <?php if ($excerpt = $contact->excerpt): ?>
                <?= $excerpt; ?>
              <?php else: ?>
                <p>
                  <?= $contact->description; ?>
                </p>
              <?php endif; ?>
              <p>
                <a class="btn btn-primary btn-sm<?= 0 === strpos($url->current(false, false) . '/', $contact->url . '/') ? ' disabled' : ""; ?>" href="<?= eat($contact->url); ?>">
                  <?= i('More'); ?>
                </a>
              </p>
            </div>
          <?php else: ?>
            <h4>
              <?= i('Error'); ?>
            </h4>
            <p class="text-body-secondary" role="status">
              <?= i('Missing %s file.', "<code>.\\lot\\page\\" . strtr(trim($state->routeContact ?? 'contact', '/'), '/', "\\") . '.page</code>'); ?>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?= self::nav(); ?>
</header>
<?= $site->is('home') ? self::hero() : ""; ?>