<div class="container">
    <div class="row">
        <div class="col s12">
          <table>
              <thead>
                <tr>
                    <th></th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                      $tt = 0;
                      foreach ($pannier as $value) {
                          //var_dump($value);

                            /* DUPLIQUER L'AFFICHAGE POUR LES MOBILLE
                                need a vertion qui s'affiche mieux (ou plus pti)
                            */


                          ////////////////////////////////////////////////////////////////////////////////////////
                              $produit  = Produits::find($value[0]['idRef']);
                              $taille   = Tailleproduits::find($value[0]['choixTaille']);

                              $couleur  = (Couleurs::find($value[0]['choixCouleur']) != null ? Couleurs::find($value[0]['choixCouleur'])->nomCouleur : '<i class="material-icons">do_not_disturb</i>');

                              $option   = ($value[0]['inverser'] == 0 ? 'aucune option ' : (($value[0]['inverser'] == 1) ? 'inversé' : 'Recto/Verso'));

                              $poids    = ($value[0]['inverser'] == 2 ? ($taille->poid * $value[0]['qte'] * 2) : ($taille->poid * $value[0]['qte']));

                              $prix = ($value[0]['inverser'] == 2 ? ($taille->prix * $value[0]['qte'] * 2) : ($taille->prix * $value[0]['qte']));

                              $desc     = '<p class="descProduit">
                                                Reférence produit : '. $value[0]['idRef']   .'<br>
                                                Taille :            '. $taille->nomTaille   .'<br>
                                                Couleur :           '. $couleur             .'<br>
                                                Option :            '. $option              .'<br>
                                                Poids :             '. $poids              .' gr<br>
                                           </p>';


                            ////////////////////////////////////////////////////////////////////////////////////////

                          echo "<tr>";
                              // ---   Image   --- //
                                  echo "<td>";
                                      echo '<img class="activator responsive-img imgPannier" src="'. img_url('produit/'.$produit->imageP) .'">';
                                  echo "</td>";
                              // ---   Produit   --- //
                                  echo "<td>";
                                      echo $produit->nomP;
                                  echo "</td>";
                              // ---  Quantiter  --- //
                                  echo "<td>";
                                      echo '<a href="'. base_url('Pannier/qte/'. $value[0]['idTableau'] . '/-1') .'">
                                                <button class="btn smallbtn waves-effect waves-light" style="margin-right:15px">-</button>
                                            </a>';
                                      echo $value[0]['qte'];
                                      echo '<a href="'. base_url('Pannier/qte/'. $value[0]['idTableau']) .'">
                                                <button class="btn smallbtn waves-effect waves-light" style="margin-left:15px">+</button>
                                            </a>';
                                  echo "</td>";
                              // --- Description --- //
                                  echo "<td>";
                                      echo $desc;
                                  echo "</td>";
                              // ---     Prix    --- //
                                  echo "<td>";
                                      echo $prix .' €' ;
                                  echo "</td>";
                              // ---     Del    --- //
                                  echo "<td>";
                                      echo '<a href="'. base_url('Pannier/qte/'. $value[0]['idTableau']) .'/-'. $value[0]['qte'] .'">
                                                <i class="fatyColorGrey material-icons">delete</i>
                                            </a>' ;
                                  echo "</td>";
                          echo "</tr>";

                          $tt += $prix;
                      }
                        echo "<tr style='background : #eee'>";
                            echo "<td>";echo "</td>";
                            echo "<td>";echo "</td>";
                            echo "<td>";echo "</td>";
                            echo "<td>";echo "</td>";

                            echo "<td>";
                                echo "TOTAL : ". $tt . ' €';
                            echo "</td>";

                            echo "<td>";echo "</td>";
                        echo '</tr>';
                  ?>
              </tbody>
            </table>
        </div>
    </div>
</div>

<!--
<tr>
  <td>Alvin</td>
</tr> -->
