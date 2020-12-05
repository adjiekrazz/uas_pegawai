<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top shadow-sm">
  <span class="navbar-brand">Sistem Informasi Pegawai</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
      if(isset($_SESSION['username']) && isset($_SESSION['status'])) {
    ?>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= ($_GET['page']) === '' ? 'active' : ''; ?>">
        <a class="nav-link" href="?page=">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?= ($_GET['page']) === 'Daftar-Pegawai' ? 'active' : ''; ?>">
        <a class="nav-link" href="?page=Daftar-Pegawai&status" target="_self">Pegawai</a>
      </li>
    </ul>
    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $_SESSION['username'] ?>
        </a>
        <div class="dropdown-menu" style="min-width:5rem !important;" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
    <?php
      }
    ?>
  </div>
</nav>