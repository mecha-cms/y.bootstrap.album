<footer class="py-5 text-body-secondary">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#top">
        <?= i('Back to top'); ?>
      </a>
    </p>
    <p class="mb-1">
      &#xa9; <?= $date->year; ?> &#xb7; <a href="<?= eat($url); ?>">
        <?= $site->title; ?>
      </a>
    </p>
    <p class="mb-0">
      <?= $site->description; ?>
    </p>
  </div>
</footer>