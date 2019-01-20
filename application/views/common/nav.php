<nav class="nav-extended scrollspy row" role="navigation" id="nav">
    	<div class="col s12">
    		<div class="container">
		        <div class="nav-wrapper container col s12">
		            <a id="logo-container" href="<?php echo base_url('Accueil') ?>" data-target="nav-mobile" class="brand-logo elephant">Faty Concept
		            </a>
		            <a href="#" data-target="nav-mobile" class="sidenav-trigger right"><i class="material-icons">menu</i></a>

		            <ul class="right hide-on-med-and-down">
                    <?php
                        $this->load->view('common/navConnexion');
                    ?>
		            </ul>
		        </div>
		        <div class="nav-content  col s12">
		          	<ul class="tabs tabs-transparent hide-on-med-and-down">
		                <?php
                        $this->load->view('common/linkNav');
                    ?>
		          	</ul>
		        </div>
	        </div>
	    </div>
</nav>
