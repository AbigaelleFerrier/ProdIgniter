<?php
	//Si il est connecter
	if($this->session->client == TRUE) {

		echo'<li><a href="modication_profil.php">Mon Compte</a></li>';
		echo'<li><a href="'. base_url('Login/disconnect') .'">Déconnexion</a></li>';

	}
	else if ($this->session->admin == TRUE) {
		echo'<li><a href="'. base_url('Admin') .'">Panel d\'Administrateur</a></li>';
		echo'<li><a href="'. base_url('Login/disconnect') .'">Déconnexion</a></li>';
	}
	else {
		echo'<li><a href="'. base_url('Login') .'">Connexion / Inscription</a></li>';
	}
?>
