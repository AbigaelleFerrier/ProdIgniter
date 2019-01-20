<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil extends CI_Controller {

    private $nbVoulu = 6;

    public function __construct()
    {
        parent::__construct();
        // var_dump($a = $this->encryption->encrypt('123'));
        // var_dump($this->encryption->decrypt($a));

        // if ($this->session->admin != TRUE) {
        //     redirect('/Login');
        // }
    }

    public function index()
    {
      $i = 1;
      $data = array('titre' => 'Bienvenue chez FatyConcept');
      $this->load->view('common/head', $data);

      $produits = Produits::where('activerP', 1)->skip(($i*$this->nbVoulu)-$this->nbVoulu)->take($this->nbVoulu)->get();

      $data = array('produits' => $produits);
      $this->load->view('AccProduit', $data);

      $data = array('i'       => $i,
                    'nbVoulu' => $this->nbVoulu,
                    'to'      => 'Accueil/page',
                    'where'   => 1);
      $this->load->view('PaginationProd', $data);

      $this->load->view('common/footer');
    }



    public function page($i = 1) {
        if ($i == NULL || $i <= 0) {
              redirect('Accueil');
        }
        $data = array('titre' => 'Bienvenue chez FatyConcept');
        $this->load->view('common/head', $data);

        $produits = Produits::where('activerP', 1)->skip(($i*$this->nbVoulu)-$this->nbVoulu)->take($this->nbVoulu)->get();

        if (count($produits) < 1) {
          if ($i - 1 <= 1) {
            redirect('Accueil/page/1');
          }
          else {
            redirect('Accueil/page/'. $i-1);
          }
        }

        $data = array('produits' => $produits);
        $this->load->view('AccProduit', $data);

        $data = array('i'       => $i,
                      'nbVoulu' => $this->nbVoulu,
                      'to'      => 'Accueil/page',
                      'where'   => 1);
        $this->load->view('PaginationProd', $data);

        $this->load->view('common/footer');
    }



    public function type($type = null ,$i = 1) {
        if ($type == NULL || $i == NULL || $i <= 0) {
              redirect('Accueil');
        }

        $data = array('titre' => 'Bienvenue chez FatyConcept');
        $this->load->view('common/head', $data);

        $produits = Produits::where([['activerP', 1],['idTypeProd', $type]])->skip(($i*$this->nbVoulu)-$this->nbVoulu)->take($this->nbVoulu)->get();

        if (count($produits) < 1) {
          if ($i - 1 <= 1) {
            redirect('Accueil');
          }
          else {
            redirect('Accueil/type/'. $type .'/'. $i-1);
          }
        }

        $data = array('produits' => $produits);
        $this->load->view('AccProduit', $data);

        $data = array('i'       => $i,
                      'nbVoulu' => $this->nbVoulu,
                      'to'      => 'Accueil/type/'. $type,
                      'where'   => 2,
                      'type'    => $type);
        $this->load->view('PaginationProd', $data);

        $this->load->view('common/footer');
    }




    public function categorie($categ = null, $i = 1) {
        if ($categ == NULL || $i == NULL || $i <= 0) {
              redirect('Accueil');
        }

        $data = array('titre' => 'Bienvenue chez FatyConcept');
        $this->load->view('common/head', $data);

        $produits = Categoriesous::find($categ)->Produits()->skip(($i*$this->nbVoulu)-$this->nbVoulu)->take($this->nbVoulu)->get();

        if (count($produits) < 1) {
          if ($i - 1 <= 1) {
            redirect('Accueil');
          }
          else {
            redirect('Accueil/categorie/'. $categ .'/'. $i-1);
          }
        }

        $data = array('produits' => $produits);
        $this->load->view('AccProduit', $data);

        $data = array('i'       => $i,
                      'nbVoulu' => $this->nbVoulu,
                      'to'      => 'Accueil/categorie/' . $categ,
                      'where'   => 3,
                      'categ'    => $categ);
        $this->load->view('PaginationProd', $data);

        $this->load->view('common/footer');
    }
}
