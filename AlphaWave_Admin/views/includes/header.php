  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <img class="" src="public/images/logoAlpha.png" alt="" width="20%">
      <span class="fs-4">Admin Menu</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" >
          Produits
        </a>
      </li>
      <li class="nav-item mt-3">
        <a href="#" class="nav-link text-white" aria-current="page">
          Clients
        </a>
      </li>
    </ul>
    <hr>
    <?php
    if (isset($_SESSION['id_user'])) {
      echo '
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>' . $_SESSION["nom"] . '</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">Profil</a></li>
        <li><a class="dropdown-item" href="#">Paramettre</a></li>
        <li><a class="dropdown-item" href="#">Se déconnecter</a></li>
      </ul>
    </div>';
    }
    ?>
  </div>