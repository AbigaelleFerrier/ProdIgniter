<div class="container">
<?php
    $i = 0;
    foreach ($produits as $produit) {
      if ($i % 3 == 0) {
        echo '<div class="row">';
      }
          //------//
          echo '<div class="col l4 m4 s6">';
            echo '<a href="'. base_url('Produit/ref/'. $produit->idRef) .'">';
              echo '<div class="card hoverable">';
                  echo '<div class="card-image">';
                  /**/echo '<img class="activator" src="'. img_url('produit/'.$produit->imageP) .'">';
                  /**/echo '<span class="card-title">'. $produit->nomP .'</span>';
                  echo '</div>';

                  echo '<div class="card-action right-align">';
                      if ($this->session->admin == TRUE)  echo '<a href="'. base_url('AdminProduit/mdf/'. $produit->idRef) .'" class="waves-effect waves-light btn">Modifier</a>';
                  /**/echo '<a href="'. base_url('Produit/ref/'. $produit->idRef) .'" class="waves-effect waves-light btn">Voir le produit</a>';
                  echo '</div>';
              echo '</div>';
            echo '</a>';
          echo '</div>';
          //------//
      if ($i % 3 == 2) {
        echo '</div>';
      }
      $i++;
    }

    if ($i % 3 == 2 || $i % 3 == 1) {
      echo '</div>';
    }
 ?>
  </div>
</div>
