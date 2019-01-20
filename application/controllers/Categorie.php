<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie extends CI_Controller {

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
      $data = array('titre' => 'Categorie');
      $this->load->view('common/head', $data);


      $data = array('categs'    => Categories::select('*')->get(),
                    'typeProds' => Typeproduits::select('*')->get());
      $this->load->view('categorie', $data);

      $this->load->view('common/footer');
    }
}
