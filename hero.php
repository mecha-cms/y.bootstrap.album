<section class="container py-5 text-center">
  <div class="py-lg-5 row">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Album example</h1>
      <p class="lead text-body-secondary">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla.</p>
      <p class="d-flex gap-2 justify-content-center">
        <?php if (!empty($state->y->{'bootstrap.album'}->actions->main)): ?>
          <?php if (!empty($state->y->{'bootstrap.album'}->actions->main->link)): ?>
            <a href="<?= eat($state->y->{'bootstrap.album'}->actions->main->link); ?>" class="btn btn-primary my-2">
              <?= i($state->y->{'bootstrap.album'}->actions->main->title ?? 'Main Action'); ?>
            </a>
          <?php else: ?>
            <a aria-disabled="true" class="btn btn-primary disabled my-2">
              <?= i($state->y->{'bootstrap.album'}->actions->main->title ?? 'Main Action'); ?>
            </a>
          <?php endif; ?>
        <?php endif; ?>
        <?php if (!empty($state->y->{'bootstrap.album'}->actions->secondary)): ?>
          <?php if (!empty($state->y->{'bootstrap.album'}->actions->secondary->link)): ?>
            <a href="<?= eat($state->y->{'bootstrap.album'}->actions->secondary->link); ?>" class="btn btn-secondary my-2">
              <?= i($state->y->{'bootstrap.album'}->actions->secondary->title ?? 'Secondary Action'); ?>
            </a>
          <?php else: ?>
            <a aria-disabled="true" class="btn btn-secondary disabled my-2">
              <?= i($state->y->{'bootstrap.album'}->actions->secondary->title ?? 'Secondary Action'); ?>
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </p>
    </div>
  </div>
</section>