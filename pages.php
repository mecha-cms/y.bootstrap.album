<?= self::enter(); ?>
<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($pages as $page): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <?php if ($image = $page->image): ?>
              <img alt="" class="card-img-top" height="225" src="<?= eat($image); ?>" width="100%">
            <?php endif; ?>
            <div class="card-body d-flex flex-column">
              <p class="card-text">
                <?= $page->description; ?>
              </p>
              <div class="align-items-center d-flex justify-content-between mt-auto">
                <div class="btn-group">
                  <a class="btn btn-sm btn-outline-secondary" href="<?= eat($page->url); ?>">
                    <?= i('View'); ?>
                  </a>
                  <a class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                <small class="text-body-secondary">
                  <?= $page->view; ?>
                </small>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?= self::exit(); ?>