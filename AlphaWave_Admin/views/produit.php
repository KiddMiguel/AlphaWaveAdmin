 <section class="container" style="height:100vh;  overflow-y: scroll;">
    <div class="d-flex">
       <h1 class="text-center mt-2">Liste des produits</h1>
       <div class="ms-auto mt-4">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nouveau Produit</button>
       </div>
    </div>

    <hr>
    <div class="row" id="listeProduit">
       <?php
         $produits = $unController->getProduits();

         foreach ($produits as $produit) {
            echo '
            <div class="col-3 mb-3">
            <div class=" card" style="width: 18rem;">
            <img src="' . $produit['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $produit['intitule'] . '</h5>
                <p class="card-text">' . $produit['description'] . '</p>
                <div class="d-flex">
                <a href="#" class="btn btn-primary">Voir</a>
                <p href="#" class="ms-auto" class="btn btn-success">'.$produit['prix'].' €</p>
                </div>
               
            </div>
            </div>

        </div>';
         }

         ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                   <h1 class="modal-title fs-5" id="staticBackdropLabel">Nouveau Produit</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="d-flex">
                      <div class="mb-3 ">
                         <label for="exampleFormControlInput1" class="form-label">Prix</label>
                         <input type="number" class="form-control" id="exampleFormControlInput1" name="prix" placeholder="Prix">

                      </div>
                      <div class="mb-3 ms-auto">
                         <label for="exampleFormControlInput1" class="form-label">Intitue du produit</label>
                         <input type="text" class="form-control" id="exampleFormControlInput1" name="intitule" placeholder="Nom produit">
                      </div>
                   </div>

                   <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                   </div>
                   <div class="mb-3">
                      <label for="formFile" class="form-label">Image</label>
                      <input class="form-control" type="file" name="image" >
                   </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                   <button class="btn btn-primary" type="submit" name="submit">Enregistré</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </section>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
 <script src="../public/javaScript/scriptProduit.js"></script>

 <?php
   if (isset($_POST['submit'])) {
      $dossierUpload = 'public/images/';
      if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
         $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
         $nomFichier = basename($_FILES["image"]["name"], "." . $extension) . "_" . time() . "." . $extension;
         $chemin = $dossierUpload . $nomFichier;

         if (move_uploaded_file($_FILES["image"]["tmp_name"], $chemin)) {
            $data = [
               'intitule' => $_POST['intitule'],
               'description' => $_POST['description'],
               'prix' => $_POST['prix'],
               'image' => $chemin
            ];

            if ($unController->createProduit($data)) {
               
               exit; 
            }
         } else {
            echo "Erreur lors de l'upload de l'image.";
         }
      } else {
         echo "Erreur: " . $_FILES["image"]["error"];
      }
   }
   ?>