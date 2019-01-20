<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
      redirect(index_page());
    }

    // ------------ PRODUIT ------------ //
        public function afficheCouleurOnProduit() {
            if (isset($_POST['refCouleur'])) {
                echo $couleur = ( Couleurs::find($_POST['refCouleur']) != null  ? Couleurs::find($_POST['refCouleur'])->hexa
                                                                                : "ERREUR-refCouleurNotFound");
            }
        }

        public function affichePrixOnProduit() {
            if (isset($_POST['taille']) && isset($_POST['qte']) && isset($_POST['inverse'])) {
                $modificateur = ($_POST['inverse'] == 2 ? '2' : '1');
                $taille = Tailleproduits::find($_POST['taille']);
                echo $prix = (($taille != null ) ? $taille->prix * $_POST['qte'] * $modificateur
                                                 : "ERREUR-refCouleurNotFound"
                            );
            }
        }
}
