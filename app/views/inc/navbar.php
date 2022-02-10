<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=
    URLROOT; ?>"><?= SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=
          URLROOT; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/pages/about">About</a>
        </li>
          <?php if (isset($_SESSION['user_id'])) : ?>
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="<?=
                  URLROOT; ?>/posts">Posts</a>
              </li>
          <?php endif; ?>
      </ul>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Welcome <?=
                $_SESSION['user_name']; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?=
                URLROOT; ?>/users/logout">Logout</a>
            </li>
        <?php else : ?>
        <ul class="navbar-nav ml-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?=
                URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>/users/login">Login</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>
