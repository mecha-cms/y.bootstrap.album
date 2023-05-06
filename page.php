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
              <svg aria-hidden="true" class="bi bi-camera" height="160" width="160">
                <use href="#bi-camera"></use>
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
      <div class="alert alert-danger" role="alert">
        <p class="mb-0">
          <?= i('%s does not exist.', 'Page'); ?>
        </p>
      </div>
    <?php endif; ?>
  </div>
</div>
<?= self::exit(); ?>