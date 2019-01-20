<div class="container">
    <div class="row">
        <?php
           echo form_open_multipart('AdminProduit/form_mdf/'.$produit->idRef);
           echo form_fieldset('Modification produit');
              echo '<div class="input-field col s3">';
                 echo '<img class="activator responsive-img" src="'. img_url('produit/'.$produit->imageP) .'">';
              echo'</div>';

              echo '<div class="input-field col s8 offset-s1">';
                echo form_label('Référence Produit','idRef');
                echo form_input('idRef', $produit->idRef, "class='countChar' disabled  required data-length='255'");
              echo'</div>';

              echo '<div class="input-field col s8 offset-s1">';
                echo form_label('Nom du produit','nomP');
                echo form_input('nomP', $produit->nomP, "class='countChar' required data-length='255'");
              echo'</div>';

              echo '<div class="input-field col s12">';
                echo form_label('Description du produit','descP');
                echo form_textarea('descP', $produit->descP, "class='materialize-textarea countChar' data-length='255' required");
              echo'</div>';

              echo '<div class="input-field col s12">';
                echo form_label('Mots Clé du produit','motcleP');
                echo form_textarea('motcleP', $produit->motcleP, "class='materialize-textarea countChar' data-length='255' required");
              echo'</div>';

              echo '<div class="input-field col s12">';
                  echo '<div class="file-field input-field">
                            <div class="btn">
                                  <span>Image (.png uniquement)</span>
                                  <input type="file" name="image">
                            </div>
                            <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                            </div>
                        </div>';
              echo'</div>';




              echo '<div class="col s12">';
                  echo "<h4>Sous Categorie</h4>";
                  echo '<table>
                            <tbody>';
                                $i = 0;
                                $doNot = array(array());
                                foreach (Prodtocategs::where('idRef', $produit->idRef)->get() as $toSearch) {
                                    $value = Categoriesous::find($toSearch->idCategS);
                                    $doNot[0][] = $value->idCategS;
                                    if ($i %6 == 0) echo "<tr>";
                                          echo "<td><label>";
                                              echo form_checkbox('categoriesous[]', $value->idCategS, 'cheacked');
                                              echo "<span></span>";
                                          echo "</label></td>";
                                          echo "<td>";
                                              echo $value->nomCategS;
                                          echo "</td>";
                                        $i++;
                                    if ($i %6 == 0) echo "</tr>";
                                }
                                foreach (Categoriesous::whereNotIn('idCategS', $doNot[0])->get() as $value) {
                                  if ($i %6 == 0) echo "<tr>";
                                        echo "<td><label>";
                                            echo form_checkbox('categoriesous[]', $value->idCategS);
                                            echo "<span></span>";
                                        echo "</label></td>";
                                        echo "<td>";
                                            echo $value->nomCategS;
                                        echo "</td>";
                                      $i++;
                                  if ($i %6 == 0) echo "</tr>";
                                }
                                if ($i %6 != 0) echo "</tr>";
                      echo '</tbody>
                        </table>';
              echo'</div>';
              echo '<div class="input-field col s7 ">';
                  echo "<h4>Prix par taille</h4>";
                  echo '<table>
                            <thead>
                              <tr>
                                  <th></th>
                                  <th>Taille</th>
                                  <th>Prix</th>
                                  <th>Poid</th>
                              </tr>
                            </thead>
                            <tbody>';
                                $doNot = array(array());
                                foreach (Prodtotailleprix::where('idRef' , $produit->idRef)->get() as $toSearch) {
                                    $value = Tailleproduits::find($toSearch->idTailleProd);
                                    $doNot[0][] = $value->idTailleProd;
                                    echo "<tr>";
                                        echo "<td><label>";
                                            echo form_checkbox('tailleProduits[]', $value->idTailleProd, "cheacked");
                                            echo "<span></span>";
                                        echo "</label></td>";
                                        echo "<td>";
                                            echo $value->nomTaille;
                                        echo "</td>";
                                        echo "<td>";
                                            echo $value->prix. ' €';
                                        echo "</td>";
                                        echo "<td>";
                                            echo $value->poid . ' gr';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                foreach (Tailleproduits::whereNotIn('idTailleProd', $doNot[0])->get() as $value) {
                                  echo "<tr>";
                                      echo "<td><label>";
                                          echo form_checkbox('tailleProduits[]', $value->idTailleProd);
                                          echo "<span></span>";
                                      echo "</label></td>";
                                      echo "<td>";
                                          echo $value->nomTaille;
                                      echo "</td>";
                                      echo "<td>";
                                          echo $value->prix. ' €';
                                      echo "</td>";
                                      echo "<td>";
                                          echo $value->poid . ' gr';
                                      echo "</td>";
                                  echo "</tr>";
                                }
                      echo '</tbody>
                        </table>';
              echo'</div>';

              echo '<div class="col s4 offset-s1">';
                  echo "<h4>Option</h4>";
                  echo '<div class="input-field col s12">';
                      echo "<label>";
                          if ($produit->inverserP) {
                              echo form_checkbox('inverserP', $produit->inverserP, 'checked="checked"');
                          }
                          else {
                            echo form_checkbox('inverserP', $produit->inverserP);
                          }
                          echo "<span>Peut'il être inversé ?</span>";
                      echo "</label>";
                  echo'</div>';

                  echo '<div class="input-field col s12">';
                      echo "<label>";
                          if ($produit->activerP) {
                              echo form_checkbox('activerP', $produit->activerP, 'checked="checked"');
                          }
                          else {
                            echo form_checkbox('activerP', $produit->activerP);
                          }
                          echo "<span>Activer ?</span>";
                      echo "</label>";
                  echo'</div>';
              echo'</div>';

              echo '<div class="col s12">';
                echo form_submit('validLog','Valider', 'class="waves-effect waves-light btn right materialize-white-text"' );
              echo'</div>';

              //var_dump($produit->Tailleproduits()->get());

           echo form_fieldset_close();
           echo form_close();
         ?>
     </div>
</div>
