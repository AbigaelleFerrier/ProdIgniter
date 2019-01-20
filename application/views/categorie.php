<div class="container">
    <div class="row">
        <h1>Produits :</h1>
        <?php
            foreach ($typeProds as $typeProd) {
              echo '<div class="col s12 m4">
                  <div class="card">
                      <a href="'.base_url('Accueil/type/'. $typeProd->idTypeProd).'/1">
                          <div class="card-image">
                              <img src="'. img_url('typeproduit/'.$typeProd->imageType) .'">
                              <span class="card-title">'. $typeProd->nomType .'</span>
                          </div>
                      </a>
                  </div>
              </div>';
            }
        ?>
    </div>

    <div class="row">
        <h1>Categories :</h1>
        <?php
            foreach ($categs as $categ) {
                echo '<div class="col s6">';
                  echo "<h3>". $categ->nomCateg ."</h3>";

                  echo "<ul>";
                  foreach ($categ->Categoriesous as $categS) {
                      echo "<li>". $categS->nomCategS ."</li>";
                  }
                  echo "</ul>";
                echo "</div>";

            }
        ?>
    </div>
</div>
