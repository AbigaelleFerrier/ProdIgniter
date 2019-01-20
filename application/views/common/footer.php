<?php

  $this->load->view('common/script_end_body');

?>

</body>
<footer class="page-footer">

    <?php
        $footer = Footer::find(1);
    ?>



    <div class="container">
        <div class="row">
            <div class="col m6 s12">
                <h5 class="white-text">Information :</h5>
                <p class="grey-text text-lighten-4"><?php echo $footer->champ1 ?></p>
            </div>

            <div class="col m2 offset-m4 s12">
                <h5 class="white-text">Lien :</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $footer->Link1 ?>" target="blank_"><?php echo $footer->nomLink1 ?></a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $footer->link2 ?>" target="blank_"><?php echo $footer->nomLink2 ?></a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo $footer->link3 ?>" target="blank_"><?php echo $footer->nomLink3 ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <p class="grey-text text-lighten-4" style="display: contents">
                © 2018-<?php echo date("Y");?> Fatyconcept.com
                <div class="right">
                    <a class="grey-text text-lighten-4 underline" href="mentions-legales.php"> Mentions Légales </a>|
                    <a class="grey-text text-lighten-4 underline" href="conditions-generales-de-ventes.php"> CGV </a>|
                    <a class="grey-text text-lighten-4 underline" href="https://www.asheart.fr" target="blank_"> Réalisation AsheArt </a>
                </div>
            </p>
        </div>
    </div>
</footer>
