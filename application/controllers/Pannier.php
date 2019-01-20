<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pannier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (! isset($this->session->pannier)) {
            $this->session->pannier = array();
        }

        /* ---- Structure session tableau pannier --------- *
        *     pannier [                                     *
        *        'R-idRef_C-choixCouleur_T-choixTaille_Opt-option' =>  *
        *              [                                    *
        *                 'idTableau'                       *
        *                 'idRef',                          *
        *                 'qte'  ,                          *
        *                 'choixCouleur',                   *
        *                 'choixTaille' ,                   *
        *                  'inverser'                       *
        *                ],                                 *
        *      ]                                            *
        * ------------------------------------------------- */
    }

    public function index()
    {
        $data = array('titre'   => 'Pannier');
        $this->load->view('common/head', $data);

        if ($this->session->pannier != null) {
            $data = array('pannier' => $this->session->pannier);
            $this->load->view('Pannier', $data);

            $msg = ($this->session->client == true ? '<a href="#" class="btn right">Commander</a>'
                                                   : '<a href="'. base_url('Login') .'" class="btn right">Connexion/Inscription</a>'
                   );
            $data = array('text' => $msg);
            $this->load->view('message', $data);
        }
        else {
            $data = array('text' => "<h3>Votre pannier est vide <div class='small-font'>(pour le moment !)</div></h3>");
            $this->load->view('message', $data);
        }

        $this->load->view('common/footer');
    }

    public function add($ref = null, $qteAModifier = 1)
    {
        ///////////////////
        var_dump($_POST);
        var_dump($this->session);

        if ($ref == null) {
            //redirect('Accueil');
        }

        $produit = Produits::find($ref);

        if ($produit != null) {
            ///////////////////////////////////////////////
            // crea de l'id de reference pour le produit //
            $idTableau = "R-" . $ref . "_C-" . $this->input->post('couleur') . "_T-" . $this->input->post('taille') . "_Opt-" . $this->input->post('groupInverse');

            ////////////////////////////////////////////////////////
            // Si le tableau comporte deja l'id on modifie la qte //
            if ( isset($this->session->pannier[$idTableau] )) {
                $_SESSION['pannier'][$idTableau][0]['qte'] += $qteAModifier;

                ///////////////////////////////////////////////////
                // Si La qte tombe a zero supp le produit        //
                // nt. Posiblement inutile a cause de $idTableau //
                if ($_SESSION['pannier'][$idTableau][0]['qte'] == 0) {

                    unset($_SESSION['pannier'][$idTableau]);
                }
            }
            ////////////////////////////////////////////////////////
            // Si non on cree dans le tableau le nouveaux produit //
            else {
                $_SESSION['pannier'][$idTableau] = array([
                                                            'idTableau'    => $idTableau,
                                                            'idRef'        => $ref,
                                                            'qte'          => $this->input->post('qte'),
                                                            'choixCouleur' => $this->input->post('couleur'),
                                                            'choixTaille'  => $this->input->post('taille'),
                                                            'inverser'     => $this->input->post('groupInverse')
                                                        ]);
            }

            ///////////////////////////////////////////////////
            // Puis on retourne au produit avec la reference //
            redirect('Produit/ref/'. $ref . '/Produit_ajouté_au_pannier');

        }
        else {
            redirect('Accueil');
        }
    }

    public function qte($idTableau = null, $qteAModifier = 1)
    {
        if (isset($this->session->pannier[$idTableau] )) {
            $_SESSION['pannier'][$idTableau][0]['qte'] += $qteAModifier;

            ///////////////////////////////////////////////////
            // Si La qte tombe a zero supp le produit        //
            if ($_SESSION['pannier'][$idTableau][0]['qte'] <= 0) {
                unset($_SESSION['pannier'][$idTableau]);
            }
            redirect('Pannier');
        }
        else {
            redirect('Accueil');
        }
    }

    public function viderLePannier()
    {
        unset($_SESSION['pannier']);
        redirect('Pannier');
    }
}
