<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminProduit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // var_dump($a = $this->encryption->encrypt('123'));
        // var_dump($this->encryption->decrypt($a));
        // $this->input->post('pwd')
        if ($this->session->admin != TRUE) {
             redirect(base_url('Login'));
        }
    }

    public function index()
    {
      $data = array('titre' => 'ADMINISTRATION');
      $this->load->view('common/head', $data);

      $this->load->view('common/footer');
    }

// // // // // MODIFICATION // // // // // //
    public function mdf($ref = null)
    {
      if ($ref == null) {
          redirect('Accueil');
      }
      $produit = Produits::find($ref);

      if ($produit != null) {
        $data = array('titre' => 'ADMINISTRATION');
        $this->load->view('common/head', $data);

        $data = array('produit' => $produit);
        $this->load->view('admin/produitMdf', $data);

        $this->load->view('common/footer');
      }
      else {
          redirect('Admin?PasDeReferenceConnu');
      }
    }

    public function form_mdf($ref = null) {
        if ($ref == null) {
            redirect('Admin');
        }

        $produit = Produits::find($ref);

        if ($produit != null) {
            var_dump($this->input->post());
            var_dump($_FILES);
            // ||||||||||||||||| //

            if ($_FILES['image'] != null && $_FILES['image']['error'] == 0) {
                $nom = 'assets/images/produit/' . $this->input->post('idRef'). '.png';

                if ($this->input->post('idRef') != $produit->idRef) {
                    unlink('assets/images/produit/'. $produit->idRef.'.png');
                }

                $resultat = move_uploaded_file($_FILES['image']['tmp_name'],  $nom);
                if (!$resultat) {
                    redirect('AdminProduit/mdf?ERREUR_SUR_L_IMAGE');
                }
                Produits::where('idRef', $produit->idRef )->update(['imageP' => $this->input->post('idRef')]);
            }

            $inverserP = ($this->input->post('inverserP') == '' ? '0' : '1');
            $activerP  = ($this->input->post('activerP')  == '' ? '0' : '1');

            Produits::where('idRef', $produit->idRef )
                      ->update([  'nomP'      => $this->input->post('nomP'),
                                  'descP'     => $this->input->post('descP'),
                                  'motcleP'   => $this->input->post('motcleP'),
                                  'inverserP' => $inverserP,
                                  'activerP'  => $activerP
                              ]);


            Prodtotailleprix::where('idRef', $produit->idRef)->delete();
            Prodtocategs    ::where('idRef', $produit->idRef)->delete();

            if ($this->input->post('tailleProduits') != null) {
                foreach ($this->input->post('tailleProduits') as $value) {
                    Prodtotailleprix::insert(['idRef'        => $produit->idRef,
                                              'idTailleProd' => $value
                                            ]);
                }
            }

            if ($this->input->post('categoriesous') != null) {
                foreach ($this->input->post('categoriesous') as $value) {
                    Prodtocategs::insert(['idRef'        => $produit->idRef,
                                          'idCategS'     => $value
                                        ]);
                }
            }


            redirect('AdminProduit/mdf/'. $produit->idRef);
        }
        else {
            redirect('Admin?PasDeReferenceConnu');
        }
    }
// // // // // -- -- -- -- -- // // // // // //

// // // // // AJOUT  // // // // // //
    public function add($ref = null)
    {
        $data = array('titre' => 'ADMINISTRATION');
        $this->load->view('common/head', $data);

        $data = array('text' => '<p>Produit bien enregistré</p>');
        if (isset($_GET['ok'])) $this->load->view('message', $data);

        $this->load->view('admin/produitAdd');

        $this->load->view('common/footer');
    }

    public function form_add($z) {
        // var_dump($this->input->post());
        // var_dump($_FILES);
        // ||||||||||||||||| //
        $error = "";
        $produit = Produits::find($this->input->post('idRef'));

        if ($produit == null){

            if ($_FILES['image'] != null && $_FILES['image']['error'] == 0) {
                $nom = 'assets/images/produit/' . $this->input->post('idRef'). '.png';

                $resultat = move_uploaded_file($_FILES['image']['tmp_name'],  $nom);
                if (!$resultat) {
                    $error = "Erreur de l'image";
                }
            }
            else {
                $error = "Erreur de l'image";
            }

            $inverserP = ($this->input->post('inverserP') == '' ? '0' : '1');
            $activerP  = ($this->input->post('activerP')  == '' ? '0' : '1');

            Produits::insert(['idRef'       => $this->input->post('idRef'),
                              'nomP'        => $this->input->post('nomP'),
                              'descP'       => $this->input->post('descP'),
                              'motcleP'     => $this->input->post('motcleP'),
                              'imageP'      => $this->input->post('idRef') . '.png',
                              'inverserP'   => $inverserP,
                              'activerP'    => $activerP,
                              'idTypeProd'  => $this->input->post('typeproduit')
                            ]);

            if ($this->input->post('tailleProduits') != null) {
                foreach ($this->input->post('tailleProduits') as $value) {
                    Prodtotailleprix::insert(['idRef'         => $produit->idRef,
                                              'idTailleProd'  => $value
                                            ]);
                }
            }

            if ($this->input->post('categoriesous') != null) {
                foreach ($this->input->post('categoriesous') as $value) {
                    Prodtocategs::insert(['idRef'    => $produit->idRef,
                                          'idCategS' => $value
                                        ]);
                }
            }


            redirect('AdminProduit/add?ok');
        }
        else {
            $error = "La reference du produit existe deja";
        }
    }
// // // // // -- -- -- -- -- // // // // // //

// // // // // Supp  // // // // // //
    public function supp($ref = null)
    {
        $data = array('titre' => 'ADMINISTRATION');
        $this->load->view('common/head', $data);

        $data = array('ref' => $ref);
        $this->load->view('admin/produitSupp', $data);

        $this->load->view('common/footer');
    }

    public function del($ref = null)
    {
        Produits::where('idRef', $ref)->delete();
        redirect(base_url('Accueil'));
    }

// // // // // -- -- -- -- -- // // // // // //

}
