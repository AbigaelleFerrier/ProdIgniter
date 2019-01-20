<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect('Accueil');
    }

    public function ref($ref = null, $ok = null ) {
        if ($ref == null) {
            redirect('Accueil');
        }

        $produit = Produits::find($ref);

        if ($produit != null) {
          if ($produit->activerP == 1 || $this->session->admin == TRUE) {
              $data = array('titre' => $produit->nomP);
              $this->load->view('common/head', $data);

              if ($this->session->admin == TRUE) {
                  $data = array('produit' => $produit);
                  $this->load->view('btnProduit', $data);
              }

              $data = array('produit' => $produit);
              $this->load->view('produit', $data);


              $this->load->view('common/footer');

              ////////////////////////////////////////
              // Message lors de l'ajout de produit //
              if ($ok == "Produit_ajout%C3%A9_au_pannier") {
                  $data = array('texte' => "Le produit a été ajouté à votre pannier");
                  $this->load->view('common/toast', $data);
              }
          }
          else {
              $data = array('titre' => $produit->nomP);
              $this->load->view('common/head', $data);

              $data = array('text' => "<h3>Le produit n'est plus en vente pour le moment</h3>");
              $this->load->view('message', $data);

              header( "refresh:5; url=Accueil" );


              $this->load->view('common/footer');
          }

        }
        else {
          redirect('Accueil?PasDeReferenceConnu');
        }


        // foreach (Produits::find(20)->Tailleproduits as $taillePrix) {
        //    echo $taillePrix->prix;
        // }
    }

}
