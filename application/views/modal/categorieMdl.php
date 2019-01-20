<div id='dropdownNavCateg' class='modal container'>
  <div class="modal-content">
      <div class="row" style="margin-bottom: 2em">
          <?php
              foreach (Typeproduits::select('*')->get() as $typeProd) {
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

      <?php
        echo '<div class="row">';
            echo'<div class="col s12">';
                echo'<ul class="tabs tabs-fixed-width">';
                    foreach (Categories::select('*')->get() as $key => $categ) {
                        if ($key == 0) {
                          echo '<li class="tab">
                                    <a class="active" href="#NavCateg'. $categ->idCateg .'">'. $categ->nomCateg .'</a>
                                </li>';
                        }
                        else {
                          echo '<li class="tab">
                                    <a class="navCateg" href="#NavCateg'. $categ->idCateg .'">'. $categ->nomCateg .'</a>
                                </li>';
                        }

                    }
                echo "</ul>";
                echo "<hr>";
            echo "</div>";

            foreach (Categories::select('*')->get() as $categ) {
                echo'<div class="col s12 paddingNavCateg" id="NavCateg'. $categ->idCateg .'">';
                    foreach ($categ->Categoriesous as $categS) {
                        echo '<p>
                                  <i class="material-icons" style="position:relative; top:5px">keyboard_arrow_right</i>
                                  <a href="'.base_url('Accueil/categorie/'. $categS->idCategS).'/1" class="collection-item"> '. $categS->nomCategS ."</a>
                              </p>";
                    }
                echo "</div>";
            }
        echo "</div>";
      ?>

  </div>
</div>
