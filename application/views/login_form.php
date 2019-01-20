<div class="container">
    <ul class="tabs" id="tabs">
      <li class="tab col l6 m6 s6"><a <?php echo $class = ($to == 'cnx')? 'class="active"' : '' ; ?>href="#Connexion">Connexion</a></li>
      <li class="tab col l6 m6 s6"><a <?php echo $class = ($to == 'cnx')? '' : 'class="active"' ; ?>href="#Inscription">Inscription</a></li>
    </ul>

    <div class="row" id="Connexion">
        <br>
          <?php
             echo form_open('Login/log');
             echo form_fieldset($titre);

                echo "<p>". $soustitre."</p>";

                echo '<div class="input-field col s12">';
                  echo form_label('Email','emailLog');
                  echo form_input('emailLog', "", "required");
                echo'</div>';

                echo '<div class="input-field col s12">';
                 echo form_label('Mot de Passe','pwd');
                 echo form_password('pwd', "", "required");
                echo'</div>';

                echo '<div class="col s12">';
                  echo form_submit('validLog','Valider', 'class="waves-effect waves-light btn right materialize-white-text"' );
                echo'</div>';
             echo form_fieldset_close();
             echo form_close();
           ?>
    </div>
    <div class="row" id="Inscription">
      <br>
      <?php
         echo form_open('Login/signIn');
         echo form_fieldset('Inscription');

            echo "<p>". $soustitre."</p>";

            echo '<div class="input-field col s6">';
                echo form_label('Nom *','nom');
                echo form_input('nom', '', "required");
            echo'</div>';

            echo '<div class="input-field col s6">';
                echo form_label('Prenom *','prenom');
                echo form_input('prenom', "", "required");
            echo'</div>';

            echo '<div class="input-field col s12">';
                echo form_label('Email *','email');
                echo form_input('email', "", "required");
            echo'</div>';





            echo '<div class="input-field col s5">';
                echo form_label('Mot de Passe','pwd');
                echo form_password('pwd', '', 'required id="pwdIns" onblur="inscriptionMDP()"');
            echo'</div>';

            echo    '<div class="input-field col s1">
                        <i onclick="passwordShow(0)" id="pswShow" class="material-icons">lock</i>
                    </div>';


            echo '<div class="input-field col s5">';
                echo form_label('Mot de Passe','pwdV');
                echo form_password('pwdV', '', 'required id="pwdIns2" onblur="inscriptionMDP()"');
            echo'</div>';

            echo    '<div class="input-field col s1">
                        <i onclick="passwordShow(1)" id="pswShow2" class="material-icons">lock</i>
                    </div>';




            echo '<div class="input-field col s12">';
                echo form_label('Adresse * (utiliser lors de la livraison)','adresse');
                echo form_textarea('adresse', '', 'class = "materialize-textarea" required');
            echo'</div>';

            echo '<div class="input-field col s12">';
                echo form_label('Téléphone','tel');
                echo form_input('tel', '', 'pattern="[0-9]{10}"');
            echo'</div>';

            echo '<div class="col m6 s12 right">';
                echo '  <p class="right-align">
                            En créant un compte, vous acceptez les <a href="'. base_url('Conditions_generales_de_vente') .'">Conditions générales de vente</a> de FatyConcept.
                            Veuillez consulter nos <a href="'. base_url('Mentions_Legales') .'">Mentions Légales</a> concernant la <a href="'. base_url('Mentions_Legales#DCP') .'">Protection de vos Informations Personnelles</a>.
                        </p>';
            echo'</div>';

            echo '<div class="col s12">';
                echo '<button type="submit" class="waves-effect waves-light btn right">Inscription</button>';
            echo'</div>';
         echo form_fieldset_close();
         echo form_close();
       ?>
    </div>
</div>
