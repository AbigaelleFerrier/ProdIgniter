<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
         if ($this->session->admin == TRUE) {
            redirect('admin');
         }
         else if ($this->session->client == TRUE) {
            redirect('Accueil?co=ok');
         }

         else {
            $data = array('titre' => "Connection");
            $this->load->view('common/head', $data);
            // -------- //
            $data['titre'] = "Identification";
            $data['soustitre'] = "";
            $data['to'] = 'cnx';
            $this->load->view('login_form',$data);
            // -------- //
            $this->load->view('common/footer');
         }

    }

    public function log()
    {
        //Redirection
        if ($this->session->admin == TRUE) {
           redirect('Administration');
        }
        else if ($this->session->client == TRUE) {
           redirect('Accueil?co=ok');
        }


        // CLIENT //
        $client = Clients::find($this->input->post('emailLog'));

        if ($client != NULL && $this->encryption->decrypt($client->mdp) == $this->input->post('pwd')) {
            //enregistrement des données de session
            $sessiondata = array(
                   'nom'  => $this->input->post('emailLog'),
                   'client'=> TRUE
               );
            $this->session->set_userdata($sessiondata);
            redirect('Accueil?co=ok');
        }
        else {
            // ADMIN //
            $admin = Adminroots::find($this->input->post('emailLog'));

            if ($admin != NULL && $this->encryption->decrypt($admin->cle_admin) == $this->input->post('pwd')) {
                //enregistrement des données de session
                $sessiondata = array(
                       'nom'  => $this->input->post('emailLog'),
                       'admin'=> TRUE
                   );
                $this->session->set_userdata($sessiondata);
                redirect('Accueil?co=ok');
            }

            $data = array('titre' => "Connection");
            $this->load->view('common/head', $data);
            // -------- //
            $data['titre'] = "Identification - Erreur";
            $data['soustitre'] = "Pour accéder à votre compte, merci de saisir vos identifiants";
            $data['to'] = 'cnx';
            $this->load->view('login_form',$data);
            // -------- //
            $this->load->view('common/footer');
        }
    }

    public function disconnect()
    {
        $sessiondata = array(
                   'nom'  => "",
                   'admin' => FALSE,
                   'client'=> FALSE
               );
            $this->session->set_userdata($sessiondata);

        $this->session->set_userdata("");
        redirect('Login');
    }

    public function signIn() {
        var_dump($_POST);

        function verifTotaliterDesVariable() {
            if  (
                    isset($_POST['nom'])        && $_POST['nom']        != "" &&
                    isset($_POST['prenom'])     && $_POST['prenom']     != "" &&
                    isset($_POST['email'])      && $_POST['email']      != "" &&
                    isset($_POST['pwd'])        && $_POST['pwd']        != "" &&
                    isset($_POST['pwdV'])       && $_POST['pwdV']       != "" &&
                    isset($_POST['adresse'])    && $_POST['adresse']    != ""
                )
            {
                return true;
            }
            else {
                return false;
            }
        }
        function verifDoubleMdpValide() {
            return $a = ($_POST['pwd'] == $_POST['pwdV']) ? true : false;
        }

        try {
            if(verifTotaliterDesVariable()) {
                $tel = (isset($_POST['tel'])) ? $_POST['tel'] : '';

                if (! verifDoubleMdpValide()) {
                    throw new Exception("Les mots de passe ne correspondent pas");
                }


            }
            else {
                throw new Exception("Merci de bien vouloir fournir toutes les informations obligatoires");
            }

        }
        catch (Exception $e) {
            $data = array('titre' => "Connection");
            $this->load->view('common/head', $data);
            // -------- //
            $data['titre'] = "Identification";
            $data['soustitre'] = $e->getMessage();
            $data['to'] = 'ins';

            $this->load->view('login_form',$data);
            // -------- //
            $this->load->view('common/footer');
        }
    }
}
