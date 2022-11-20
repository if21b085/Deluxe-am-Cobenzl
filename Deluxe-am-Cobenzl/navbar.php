<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= ($site == "home") ? "active" : "" ?>" aria-current="page" href=".">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($site == "help") ? "active" : "" ?>" href="?site=help">FAQ's</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($site == "impressum") ? "active" : "" ?>" href="?site=impressum">Impressum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($site == "news") ? "active" : "" ?>" href="?site=news">Newsbeiträge</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="login.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item <?= ($site == "login") ? "active" : "" ?>" href="?site=login">Login</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item <?= ($site == "register") ? "active" : "" ?>" href="?site=register">Register</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>