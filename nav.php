<div class="bg-dark navbar navbar-dark shadow-sm">
  <div class="container">
    <a class="align-items-center d-flex navbar-brand" href="<?= eat($url); ?>">
      <svg aria-hidden="true" class="me-2" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
        <circle cx="12" cy="13" r="4"></circle>
      </svg>
      <strong>
        <?= $site->title; ?>
      </strong>
    </a>
    <button aria-controls="navbar-header" aria-expanded="false" aria-label="<?= eat(i('Toggle navigation')); ?>" class="collapsed navbar-toggler" data-bs-target="#navbar-header" data-bs-toggle="collapse" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</div>