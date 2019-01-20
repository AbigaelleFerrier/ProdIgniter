	<!-- Mobile -->
	<div class="hide-on-large-only show-on-medium-and-down">
		<?php
				$this->load->view('common/navConnexion');
		?>
		<hr>
	</div>


	<li><a href="<?php echo base_url('Accueil') ?>"  >Accueil</a></li>
	<li><a href="#!" class="modal-trigger" data-target="dropdownNavCateg">Categorie</a></li>
	<li><a href="<?php echo base_url('Lettrage') ?>" >Lettrage adhésif</a></li>
	<li><a href="<?php echo base_url('Contact') ?>"  >Contact</a></li>

	<!-- Mobile -->
	<div class="hide-on-large-only show-on-medium-and-down">

		<hr>
		<!-- Pannier -->
		<li class="">
			<a href="<?php echo base_url('Pannier') ?>">Panier <i class="material-icons right">local_grocery_store</i></a>
		</li>
	</div>

	<!-- Ordi -->
	<div class="hide-on-med-and-down show-on-large iUP">
		<!-- Pannier -->
		<li class="right"><a href="<?php echo base_url('Pannier') ?>"><i class="material-icons right">local_grocery_store</i></a></li>
	</div>
