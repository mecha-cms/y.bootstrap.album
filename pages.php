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
                  <span aria-label="<?= eat($page->title); ?>" class="bg-secondary card-img-top ratio ratio-16x9" role="img">
                    <span class="align-items-center d-flex h3 justify-content-center p-4 text-center text-muted">
                      <?= $page->title; ?>
                    </span>
                  </span>
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                  <p class="card-text">
                    <?= To::description($page->description, 360); ?>
                  </p>
                  <div class="align-items-center d-flex justify-content-between mt-auto">
                    <div class="btn-group">
                      <a class="btn btn-outline-secondary btn-sm" href="<?= eat($page->url); ?>">
                        <?= i('View'); ?>
                      </a>
                      <?php if ($x_panel && $x_user && $is_user): ?>
                        <a class="btn btn-outline-secondary btn-sm" href="<?= eat(strtr($page->url, [$url . '/' => $url . '/' . trim($state->x->panel->route ?? 'panel', '/') . '/get/page/']) . '.' . $page->x); ?>">
                          <?= i('Edit'); ?>
                        </a>
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
          <p role="status">
            <?= i('No more %s to show.', 'pages'); ?>
          </p>
        <?php else: ?>
          <p role="status">
            <?= i('No %s yet.', 'pages'); ?>
          </p>
        <?php endif; ?>
      <?php endif; ?>
    <?php else: ?>
      <p role="status">
        <?= i('%s does not exist.', 'Page'); ?>
      </p>
    <?php endif; ?>
  </div>
</div>
<?= self::exit(); ?>