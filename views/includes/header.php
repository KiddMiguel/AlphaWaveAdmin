  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <img class="" src="public/images/logoAlpha.png" alt="" width="20%">
      <span class="fs-4">Admin Menu</span>
    </a>
    <hr>
    <?php
    if (isset($_SESSION['id_user'])) {
      echo '
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php?page=produit&id_user='.$_SESSION['id_user'].'" class="nav-link active" >
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

    <div class="d-flex">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none " >
        <img src="'.$_SESSION['image'].'" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>' . $_SESSION["nom"] . ' '.$_SESSION['prenom'].'</strong>
      </a>
      <button class="ms-auto btn ">
    <a href="index.php?page=deconnexion">
    <i class=" text-danger bi fs-4 bi-box-arrow-left"></i>
    </a> 
     </button> 
    </div>';
    }
    ?>
  </div>