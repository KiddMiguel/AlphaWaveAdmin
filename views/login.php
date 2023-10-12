<div class='body-login'>

<main class="form-signin w-100 m-auto">
  <form method="post">
    <div class='text-center'>
      <img class="" src="public/images/logoAlpha.png" alt="" width="50%">
    </div>
    <h1 class="h3 mb-3 fw-normal text-center">Admin AlphaWave</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Votre login">
      <label for="floatingInput">Login</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Mot depasse</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Se souvenir de moi
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Connecter</button>
  </form>
  
<?php
if (isset($_POST["submit"])) {
  $data = [
    "login" => $_POST["login"],
    "password" => $_POST['password'],
  ];

  $user = $unController->connectionUser($data);
  if ($user != null) {
    $_SESSION["id_user"] = $user["idAdmin"];
    $_SESSION["nom"] = $user["nom"];
    $_SESSION["prenom"] = $user["prenom"];
    $_SESSION["image"] = $user["image"];
    header("location: index.php?page=produit&id_user=" . $_SESSION["id_user"] . "");
    exit;
  } else {
    echo '<div class="alert alert-danger text-center" role="alert">
      Mot de passe ou email incorrect !
      </div>';
  }
}
?>
</main>
</div>
