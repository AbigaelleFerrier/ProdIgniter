<div class="container containerProduit">

			<div class="row produit noMargeBottom">
				<div class="col m3 s12">
					    <img class="responsive-img" src="<?php echo img_url('produit/'.$produit->imageP); ?>">
				</div>
				<div class="col m9 s12">
          <div class="row">
						<div class="col s8">
							<h1 class="h1Prod"><?php echo $produit->nomP; ?></h1>
						</div>
						<div class="col s4 right">
							<h3 id="zonePrix" class="h1Prod">
								<?php
									foreach ($produit->Tailleproduits as $key => $taillePrix) {
										if ($key == 0) {
											echo $taillePrix->prix;
										}
									}
								?> €</h3>
						</div>

					</div>

					<?php echo form_open(base_url('Pannier/add/'. $produit->idRef));?>
							<div class="row">
									<div class="col m6 s12">

											<!-- Couleur -->
											<div class="row">

													<hr style="margin-bottom: 1.5em">

													<?php
														$typeProd = Typeproduits::find($produit->idTypeProd);

														if ($typeProd->necessiteCouleur) {

																$couleurs = Couleurs::where('activerCouleur', 1)->get();

																echo '<div class="input-field col m9 s12">';
																    echo '<select id="couleur" name="couleur" onchange="afficheCouleurOnProduit(this.value)">';

																			$premiereCouleur = "#5E3210";

																			foreach ($couleurs as $key => $couleur) {
																					if ($key == 0) {
																							$premiereCouleur = $couleur->hexa ;
																							echo '<option value="'. $couleur->refCouleur .'" selected>'.  $couleur->nomCouleur .'</option>';
																					}
																					else {
																							echo '<option value="'. $couleur->refCouleur .'">'.  $couleur->nomCouleur .'</option>';
																					}
																			}
																    echo '</select>';
																    echo '<label>Couleur :</label>';
																echo '</div>';

																echo '<div id="choixCouleurAffichage" class="col offset-m1 m1 s12 valign-wrapper" style="background:'. $premiereCouleur .'">
																	  </div>';
															}

													?>
										</div>

										<!-- Taille -->
										<div class="row">
											<div class="input-field col s12">
												<select id="taille"  name="taille" onchange="affichePrixOnProduit()">
													<?php
															//Tailleproduits::where('idTypeProd', $produit->idTypeProd)->get();

														  foreach ($produit->Tailleproduits as $taillePrix) {
										     				echo '<option prix="'.$taillePrix->prix.'" value="'. $taillePrix->idTailleProd .'">'. $taillePrix->nomTaille .'</option>';
										     			}
													?>
												</select>
												<label>Taille :</label>
											</div>
										</div>

										<!-- Qte -->
										<div class="row">
													<div class="col s1">
															<a href="#!" onclick="addDown(-1)" class="btn">-</a>
													</div>
													<div class="col offset-m1 m3 offset-s1 s5">
															<input value="1" id="qte" name="qte" type="number" onchange="if (this.value < 1) {this.value = 1}; affichePrixOnProduit()" class="validate">
													</div>
													<div class="col s1">
															<a href="#!" onclick="addDown(1)" class="btn">+</a>
													</div>
										</div>
									</div>

									<div class="col m4 offset-m2 s12">
											<hr>
											<!-- Inverser -->
											<?php
												if ($produit->inverserP) {
													echo "<div id='option'>";
														echo '
															<div class="col s12">
																<p>
														    		<label>
														        		<input onchange="affichePrixOnProduit()" value="0" type="radio"  name="groupInverse" checked />
														        		<span>Auccun option</span>
														      		</label>
														    	</p>
															</div>';
														echo '
															<div class="col s12">
																	<p>
															    		<label class="tooltipped" data-position="bottom" data-tooltip="Cochez cette case pour commander votre stickers avec effet miroir inversé. Attention, un produit avec tu texte sera illisible.">
															        		<input onchange="affichePrixOnProduit()" value="1" type="radio"  name="groupInverse"/>
															        		<span>Inverser</span>
														      		</label>
																  </p>
															</div>';
														echo '
															<div class="col s12">
																<p>
														    		<label class="tooltipped" data-position="bottom" data-tooltip="Cochez cette case pour commander votre stickers à la fois recto et verso (2 stickers)">

														        		<input onchange="affichePrixOnProduit()" value="2" type="radio" name="groupInverse" />
														        		<span>Recto / Verso</span>
														      		</label>
														    	</p>
															</div>';
													echo "</div>";
					 							}
					 						?>
									</div>
							</div>
							<div class="row produit noMargeTop">
									<button type="submit" class="waves-effect waves-light btn right">Ajouter au panier</button>
							</div>
					<?php echo form_close();?>
				</div>
			</div>

		</div>
