<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $nbVoulu = 12;

    public function __construct()
    {
        parent::__construct();
        // var_dump($a = $this->encryption->encrypt('123'));
        // var_dump($this->encryption->decrypt($a));

        if ($this->session->admin != TRUE) {
             redirect(base_url('Login'));
        }
    }

    public function index()
    {
      $data = array('titre' => 'ADMINISTRATION');
      $this->load->view('common/head', $data);

      $data = array( 'list' => [
                                [
                                  'h3'    => 'Produits',
                                  'liste' =>  [
                                                [
                                                  'text' => 'Voir les produit désactivé',
                                                  'link'  => 'Admin/produitDesactiver/1'
                                                ],
                                                [
                                                  'text' => 'Créé un Produit',
                                                  'link'  => 'AdminProduit/add'
                                                ]
                                              ]
                                ],
                                [
                                  'h3'    => 'Produits',
                                  'liste' =>  [
                                                [
                                                  'text' => 'Voir les produit désactivé',
                                                  'link'  => 'Admin/produitDesactiver/1'
                                                ],
                                                [
                                                  'text' => 'Créé un Produit',
                                                  'link'  => 'AdminProduit/add'
                                                ]
                                              ]
                                ],
                           ]
                         );
      $this->load->view('admin/panel', $data);

      $this->load->view('common/footer');
    }

    public function produitDesactiver($i = 1) {
        if ($i == NULL || $i <= 0) {
              redirect('Accueil');
        }
        $data = array('titre' => 'ADMINISTRATION');
        $this->load->view('common/head', $data);

        $produits = Produits::where('activerP', 0)->skip(($i*$this->nbVoulu)-$this->nbVoulu)->take($this->nbVoulu)->get();

        if (count($produits) < 1) {
            $data = array('text' => "<h3>Aucun produit n'est désactivé</h3>");
            $this->load->view('message', $data);
        }
        else {
            $data = array('produits' => $produits);
            $this->load->view('AccProduit', $data);

            $data = array('i'       => $i,
                          'nbVoulu' => $this->nbVoulu,
                          'to'      => 'Admin/produitDesactiver',
                          'where'   => 0);
            $this->load->view('PaginationProd', $data);
        }

        $this->load->view('common/footer');
    }

}
