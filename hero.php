<section class="container py-5 text-center">
  <div class="py-lg-5 row">
    <div class="col-lg-6 col-md-8 mx-auto">
      <?php if ($title = $site->y->{'bootstrap.album'}->hero->title ?? ""): ?>
        <h1 class="fw-light">
          <?= $title; ?>
        </h1>
      <?php endif; ?>
      <?php if ($description = $site->y->{'bootstrap.album'}->hero->description ?? ""): ?>
        <p class="lead text-body-secondary">
          <?= $description; ?>
        </p>
      <?php endif; ?>
      <?php if ($tasks = (array) ($site->y->{'bootstrap.album'}->hero->tasks ?? [])): ?>
        <p class="d-flex gap-2 justify-content-center">
          <?php foreach ($tasks as $task): ?>
            <?php if (empty($task->link)): ?>
              <a aria-disabled="true" class="btn btn-<?= $task->type ?? 'secondary'; ?> disabled my-2">
                <?= i($task->title); ?>
              </a>
            <?php else: ?>
              <a href="<?= eat($task->link); ?>" class="btn btn-<?= $task->type ?? 'secondary'; ?> my-2">
                <?= i($task->title); ?>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </p>
      <?php endif; ?>
    </div>
  </div>
</section>