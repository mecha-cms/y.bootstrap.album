<?= self::enter(); ?>
<div class="bg-body-tertiary py-5">
  <div class="container">
    <?php if ($page->exist): ?>
      <?php $x_panel = isset($state->x->panel); ?>
      <?php $x_user = isset($state->x->user); ?>
      <?php $is_user = $x_user && Is::user(); ?>
      <?php if ($pages->count): ?>
        <div class="g-3 row row-cols-1 row-cols-md-3 row-cols-sm-2">
          <?php foreach ($pages as $page): ?>
            <div class="col">
              <div class="card h-100 shadow-sm">
                <?php if ($image = $page->image(640, 360, 100)): ?>
                  <img alt="<?= eat($page->title); ?>" class="card-img-top img-fluid" height="360" src="<?= eat($image); ?>" width="640">
                <?php else: ?>
                  <span aria-label="<?= eat($page->title); ?>" class="card-img-top overflow-hidden ratio ratio-16x9" role="img">
                    <span class="align-items-center bg-body-secondary d-flex h-100 justify-content-center p-4 text-body-tertiary">
                      <svg aria-hidden="true" class="bi bi-camera" height="80" width="80">
                        <use href="#bi-camera"></use>
                      </svg>
                    </span>
                  </span>
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                  <?php if ($title = $page->title): ?>
                    <h3 class="card-title h4">
                      <?= $title; ?>
                    </h3>
                  <?php endif; ?>
                  <?php if ($description = To::description($page->description, 120)): ?>
                    <p class="card-text">
                      <?= $description; ?>
                    </p>
                  <?php endif; ?>
                  <div class="align-items-center d-flex justify-content-between mt-auto">
                    <div class="btn-group">
                      <a class="btn btn-outline-secondary btn-sm" href="<?= eat($page->url); ?>">
                        <?= i('View'); ?>
                      </a>
                      <?php if ($x_panel && $x_user && $is_user): ?>
                        <a class="btn btn-outline-secondary btn-sm" href="<?= eat(strtr($page->url, [$url . '/' => $url . '/' . trim($state->x->panel->route ?? 'panel', '/') . '/get/page/']) . '.' . $page->x); ?>">
                          <?= i('Edit'); ?>
                        </a>
                      <?php else: ?>
                        <?php if (!$x_panel): ?>
                          <a aria-disabled="true" class="btn btn-outline-secondary btn-sm disabled">
                            <?= i('Edit'); ?>
                          </a>
                        <?php endif; ?>
                      <?php endif; ?>
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
        <nav aria-label="<?= eat(i('Page navigation')); ?>" class="mt-5">
          <ul class="justify-content-center pagination">
            <?php if ($prev = $pager->prev): ?>
              <li class="page-item">
                <a class="page-link" href="<?= eat($prev->link); ?>" rel="prev" title="<?= eat($prev->title); ?>">
                  <?= i('Previous'); ?>
                </a>
              </li>
            <?php else: ?>
              <li class="disabled page-item">
                <span class="page-link">
                  <?= i('Previous'); ?>
                </span>
              </li>
            <?php endif; ?>
            <?php if ($next = $pager->next): ?>
              <li class="page-item">
                <a class="page-link" href="<?= eat($next->link); ?>" rel="next" title="<?= eat($next->title); ?>">
                  <?= i('Next'); ?>
                </a>
              </li>
            <?php else: ?>
              <li class="disabled page-item">
                <span class="page-link">
                  <?= i('Next'); ?>
                </span>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      <?php else: ?>
        <?php if ($site->has('part')): ?>
          <div class="alert alert-danger" role="alert">
            <p class="mb-0">
              <?= i('No more %s to show.', 'pages'); ?>
            </p>
          </div>
        <?php else: ?>
          <div class="alert alert-light" role="alert">
            <p class="mb-0">
              <?= i('No %s yet.', 'pages'); ?>
            </p>
          </div>
        <?php endif; ?>
      <?php endif; ?>
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