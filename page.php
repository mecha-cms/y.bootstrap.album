<?= self::enter(); ?>
<div class="<?= $site->is('home') ? 'bg-body-tertiary ' : ""; ?>py-5">
  <div class="container">
    <?php if ($page->exist): ?>
      <div class="g-5 row">
        <div class="col-lg-6">
          <?php if ($image = $page->image): ?>
            <div class="row">
              <div class="col-12">
                <img alt="" class="img-fluid w-100 rounded" src="<?= eat($image); ?>">
              </div>
            </div>
          <?php endif; ?>
          <?php if ($images = $page->images): ?>
            <div class="g-4 mt-0 row">
              <?php foreach ((array) $images as $image): ?>
                <div class="col-4">
                  <img alt="" class="img-fluid w-100 rounded" src="<?= eat($image); ?>">
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <?php if (!$image && !$images): ?>
            <div class="align-items-center bg-body-secondary d-flex h-100 justify-content-center p-4 rounded text-body-tertiary">
              <svg aria-hidden="true" class="bi bi-camera" fill="currentColor" height="160" viewBox="0 0 16 16" width="160" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"></path>
                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
              </svg>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-lg-6">
          <?php if ($title = $page->title): ?>
            <h1 class="display-1 mb-4">
              <?= $title; ?>
            </h1>
          <?php endif; ?>
          <?php if ($description = $page->description): ?>
            <p class="lead mb-4">
              <?= $description; ?>
            </p>
          <?php endif; ?>
          <?php if ($content = $page->content): ?>
            <div>
              <?= $content; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php else: ?>
      <p role="status">
        <?= i('%s does not exist.', 'Page'); ?>
      </p>
    <?php endif; ?>
  </div>
</div>
<?= self::exit(); ?>