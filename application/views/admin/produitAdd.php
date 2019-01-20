<div class="container">
    <div class="row">
        <?php
           echo form_open_multipart('AdminProduit/form_add/1');
           echo form_fieldset('Ajouter produit');

              echo '<div class="input-field col s6">';
                echo form_label('Référence Produit (exp: Stk-2342) !Attention : ne pourras pas être modifier par la suite','idRef');
                echo form_input('idRef', '', "class='countChar' required data-length='255'");
              echo'</div>';

              echo '<div class="input-field col s6">';
                echo form_label('Nom du produit','nomP');
                echo form_input('nomP', '' , "class='countChar' required data-length='255'");
              echo'</div>';

              echo '<div class="input-field col s12">';
                echo form_label('Description du produit','descP');
                echo form_textarea('descP', '' , "class='materialize-textarea countChar' data-length='255' required");
              echo'</div>';

              echo '<div class="input-field col s12">';
                echo form_label('Mots Clé du produit','motcleP');
                echo form_textarea('motcleP', '' , "class='materialize-textarea countChar' data-length='255' required");
              echo'</div>';

              echo '<div class="input-field col s6">';
                // echo form_label('Type de Produit','typeproduit');
                $options = array();
                foreach (Typeproduits::all() as $value) {
                  $options[$value->idTypeProd] = $value->nomType;
                }
                echo form_dropdown('typeproduit', $options);
              echo'</div>';

              echo '<div class="input-field col s6">';
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
                                foreach (Categoriesous::all() as $value) {
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
                                foreach (Tailleproduits::all() as $value) {
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
                              echo form_checkbox('inverserP', '');
                          echo "<span>Peut'il être inversé ?</span>";
                      echo "</label>";
                  echo'</div>';

                  echo '<div class="input-field col s12">';
                      echo "<label>";
                            echo form_checkbox('activerP', '1', 'checked="checked"');
                          echo "<span>Activer ?</span>";
                      echo "</label>";
                  echo'</div>';
              echo '</div>';

              echo '<div class="col s12">';
                echo form_submit('validLog','Valider', 'class="waves-effect waves-light btn right materialize-white-text"' );
              echo'</div>';

              //var_dump($produit->Tailleproduits()->get());

           echo form_fieldset_close();
           echo form_close();

        /*
            A faire :
            → recupere les donnees et les traiter pour les enregistre
            → ajouter sur la modif le typeproduit et la modif des prix
            → Ajouter creation et modif des categorie
        */

         ?>
     </div>
</div>
