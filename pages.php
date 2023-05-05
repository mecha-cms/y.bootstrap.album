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
                      <svg aria-hidden="true" class="bi bi-camera" fill="currentColor" height="80" viewBox="0 0 16 16" width="80" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"></path>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"></path>
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