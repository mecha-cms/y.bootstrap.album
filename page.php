<?= self::enter(); ?>
<div class="py-5">
  <div class="container">
    <?php if ($page->exist): ?>
      <div class="g-5 row">
        <div class="col">
          <?php if ($image = $page->image): ?>
            <div class="row">
              <img alt="" class="col-12 img-fluid" src="<?= eat($image); ?>">
            </div>
          <?php endif; ?>
          <?php if ($images = $page->images): ?>
            <div class="g-4 mt-0 row">
              <?php foreach ((array) $images as $image): ?>
                <img alt="" class="col-4 img-fluid" src="<?= eat($image); ?>">
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="col">
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