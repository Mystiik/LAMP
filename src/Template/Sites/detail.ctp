<div class="main-header"  style="margin-bottom: 15px;">
	<h2>DETAIL</h2>
	<em>vous voulez des détails, vous allez être servi</em>
</div>
<div class="main-content">
	<div class="widget">
		<div class="widget-content"  style="padding: 10px;">
			<div class="row">
				<div class="col-sm-12">
					<select name="select2" id="select1" class="select2 FORM" style="margin-bottom:20px">
					<?php
						for($i=0;$i<count($tableorder);$i++)
						{
							if($TheChosenOne==$tableorder[$i][0]) {$selec="selected";} else {$selec="";}
							echo "<option value='".$tableorder[$i][0]."' $selec>".$tableorder[$i][1]." - ".$tableorder[$i][2]." :: ".$tableorder[$i][3].",".$tableorder[$i][4]."</option>";
						}
					?>
					</select>
					
					<!--DEBUT INVISIBLE FORM-->
					<?= $this->Form->create('Formulaire', array('type'=>'post', 'id'=>'hiddenform'))?>
					<?= $this->Form->input('TheChosenOne',array(	'type'=>'text',
														'id'=>'hiddeninput',
														'label'=>False,
														'style'=>'display:none;')) ?>
					<?= $this->Form->end() ?>
					<!--FIN INVISIBLE FORM-->
					
					<script type="text/javascript">
						$('.FORM').on('change', function (e) {
							hiddenform = document.getElementById('hiddenform');
							hiddeninput = document.getElementById('hiddeninput');
							index = document.getElementById('select1').value;
							
							hiddeninput.value = index;
							
							hiddenform.submit();
						});
					</script>
					
					<!--AJOUTER UNE VOIE D'ACHEMINEMENT-->
					<div class="panel-group" id="accordion3">
						<div class="panel panel-default">
							<div class="btn-success btn-block">
								<h4 class="panel-title text-center">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" style="color:white; text-decoration:none;">
										<i class="fa fa-plus-circle" style="position:relative; top:-1px;"></i><i class="fa fa-plus-circle"></i> AJOUTER  UNE VOIE D'ACHEMINEMENT
									</a>
								</h4>
							</div>
							<div id="collapse3" class="panel-collapse collapse">
								<div class="panel-body">
									<!--DEBUT FORM-->
									<?= $this->Form->create('Formulaire', array('type'=>'post', 'id'=>'new_site', 'url' => ['controller' => 'Sites', 'action' => 'ajout_lien/'.$TheChosenOne]))?>
									
									<?php
										$site_actuel = $this->Form->input('',array('type'=>'text',
																					'class'=>'form-control',
																					'value'=> $table[$TheChosenOne-1][1],
																					'label'=>False,
																					'disabled'=>'disabled',
																					'style'=>'margin-bottom:5px;'));
										$value = [];
										
										for($i=0;$i<count($table);$i++)
										{
											if($table[$i][2] != $table[$TheChosenOne-1][2])
											{
												$value[$table[$i][0]] = $table[$i][1];
											}
										}
										
										if($table[$TheChosenOne-1][2] == "producteur") { $etat="consommateur"; }
										else { $etat="producteur"; }
										
										$site_lien = $this->Form->input($etat, array('type'=>'select',
																				'class'=>'select2',
																				'id'=>$etat,
																				'label'=>False,
																				'style'=>'margin-bottom:5px;',
																				'options' => $value) );
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="col-sm-6" style="padding:6px 4px 0 0;">
												<?php
													if($table[$TheChosenOne-1][2] == "producteur") { echo $site_actuel; }
													else { echo $site_lien; }
												?>
											</div>
											<div class="col-sm-6" style="padding:6px 0 0 4px;">
												<?php
													if($table[$TheChosenOne-1][2] == "consommateur") { echo $site_actuel; }
													else { echo $site_lien; }
												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="col-sm-6" style="padding:0 4px 20px 0;">
												<?= $this->Form->input('', array('type'=>'text',
																					'class'=>'form-control',
																					'value'=> 'Producteur',
																					'label'=>False,
																					'disabled'=>'disabled') ); ?>
											</div>
											<div class="col-sm-6" style="padding:0 0 20px 4px;">
												<?= $this->Form->input('', array('type'=>'text',
																					'class'=>'form-control',
																					'value'=> 'Consommateur',
																					'label'=>False,
																					'disabled'=>'disabled') ); ?>
											</div>
										</div>
									</div>
									
									<div class="center" style="padding:0 4px 0 0;">
										<?= $this->Form->button('Valider', array('type' => 'submit',
																				'class'=>'btn btn-custom-primary btn-block',
																				'id'=>'btn-quick-event',
																				'label'=>False)) ?>
									</div>
									<?= $this->Form->end() ?>
									<!--FIN FORM-->
								</div>
							</div>
						</div>
					</div>
					<!--AJOUTER UNE VOIE D'ACHEMINEMENT-->
					
					<!--MODIFIER UN SITE-->
					<div class="row">
						<div class="col-sm-6">
							<div class="panel-group" id="accordion2">
								<div class="panel panel-default">
									<div class="btn-success btn-block">
										<h4 class="panel-title text-center">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" style="color:white; text-decoration:none;">
												<i class="fa fa-plus-circle" style="position:relative; top:-1px;"></i><i class="fa fa-plus-circle"></i> MODIFIER UN SITE
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse">
										<div class="panel-body">
											<!--DEBUT FORM-->
											<?= $this->Form->create('Formulaire', array('type'=>'post', 'id'=>'new_site', 'url' => ['controller' => 'Sites', 'action' => 'modif_site/'.$TheChosenOne]))?>
											<?= $this->Form->input('name',array('type'=>'text',
																						'class'=>'form-control',
																						'id'=>'name',
																						'value'=> $table[$TheChosenOne-1][1],
																						'label'=>False,
																						'placeholder'=>'Nom du site',
																						'required'=>'required',
																						'style'=>'margin-bottom:5px;')) ?>
											<?= $this->Form->input('type', array('type'=>'select',
																				'class'=>'select2',
																				'id'=>'type',
																				'value'=> $table[$TheChosenOne-1][2],
																				'label'=>False,
																				'options' => ['consommateur'=>'Consommateur','producteur'=>'Producteur'],) ); ?>
											<div class="col-sm-6" style="padding:6px 4px 0 0;">
												<?= $this->Form->input('locx',array('type'=>'number',
																							'class'=>'form-control',
																							'id'=>'locx',
																							'value'=> $table[$TheChosenOne-1][3],
																							'label'=>False,
																							'placeholder'=>'Localisation x',
																							'step'=>'any',
																							'required'=>'required',
																							'style'=>'margin-bottom:5px;')) ?>
											</div>
											<div class="col-sm-6" style="padding:6px 0 0 4px;">
												<?= $this->Form->input('locy',array('type'=>'number',
																								'class'=>'form-control',
																								'id'=>'locy',
																								'value'=> $table[$TheChosenOne-1][4],
																								'label'=>False,
																								'placeholder'=>'Localisation y',
																								'required'=>'required',
																								'style'=>'margin-bottom:5px;')) ?>
											</div>
											<?= $this->Form->input('stock',array('type'=>'number',
																							'class'=>'form-control',
																							'id'=>'stock',
																							'value'=> $table[$TheChosenOne-1][5],
																							'label'=>False,
																							'placeholder'=>'Stock',
																							'required'=>'required',
																							'style'=>'margin-bottom:15px;')) ?>
											
											<div class="center" style="padding:0 4px 0 0;">
												<?= $this->Form->button('Valider', array('type' => 'submit',
																						'class'=>'btn btn-custom-primary btn-block',
																						'id'=>'btn-quick-event',
																						'label'=>False)) ?>
											</div>
											<?= $this->Form->end() ?>
											<!--FIN FORM-->
										</div>
									</div>
								</div>
							</div>
						</div>
					<!--MODIFIER UN SITE-->
					
					<!--AJOUTER UN RELEVE-->
						<div class="col-sm-6">
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="btn-success btn-block">
										<h4 class="panel-title text-center">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color:white; text-decoration:none;">
												<i class="fa fa-plus-circle" style="position:relative; top:-1px;"></i><i class="fa fa-plus-circle"></i> AJOUTER UN RELEVE
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse">
										<div class="panel-body">
											<!--DEBUT FORM-->
											<?= $this->Form->create('Formulaire', array('type'=>'post', 'id'=>'new_site', 'url' => ['controller' => 'Sites', 'action' => 'ajout_releve/'.$TheChosenOne]))?>
											<?= $this->Form->input('valeur',array('type'=>'number',
																							'class'=>'form-control',
																							'id'=>'valeur',
																							'min'=>-500,
																							'max'=>500,
																							'label'=>False,
																							'placeholder'=>'Valeur du relevé',
																							'required'=>'required',
																							'style'=>'margin-bottom:5px;')) ?>
											
											<div class="center" style="padding:0 4px 0 0;">
												<?= $this->Form->button('Valider', array('type' => 'submit',
																						'class'=>'btn btn-custom-primary btn-block',
																						'id'=>'btn-quick-event',
																						'label'=>False)) ?>
											</div>
											<?= $this->Form->end() ?>
											<!--FIN FORM-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--AJOUTER UN RELEVE-->
					
					<!--PROGRESS BAR-->
					<div class="widget widget-table">
						<div class="widget-header">
							<h3><i class="fa fa-table"></i>Statistique du site</h3> <em> - <?php echo $table[$TheChosenOne-1][1]; ?></em>
						</div>
						<div class="widget-content" style="padding-top:10px;">
							<div class="row">
								<div class="col-sm-6">
									<div class="progress">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70"
										aria-valuemin="0" aria-valuemax="100" style="width:80%"><?php echo $stat['etat']; ?> totale: <?php echo $stat['tot']; ?> kWh</div>
									</div>
									<div class="progress">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
										aria-valuemin="0" aria-valuemax="100" style="width:70%"><?php echo $stat['etat']; ?> moyenne: <?php echo $stat['moy']; ?> kWh</div>
									</div>
									<div class="progress">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
										aria-valuemin="0" aria-valuemax="100" style="width:40%">Nombre de relevés: <?php echo $stat['nbr']; ?></div>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="progress">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
										aria-valuemin="0" aria-valuemax="100" style="width:75%"><?php echo $stat['etat']; ?> maximale: <?php echo $stat['max']; ?> kWh</div>
									</div>
									<div class="progress">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70"
										aria-valuemin="0" aria-valuemax="100" style="width:60%"><?php echo $stat['etat']; ?> minimale: <?php echo $stat['min']; ?> kWh</div>
									</div>
									<div class="progress">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
										aria-valuemin="0" aria-valuemax="100" style="width:90%">Capacité totale d'approvisionnement: <?php echo $stat['totapp']; ?> kWh</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--PROGRESS BAR-->
					
					<!--VOIE ASSOCIEE-->
					
					<div class="widget widget-table">
						<div class="widget-header">
							<h3><i class="fa fa-truck fa-flip-horizontal"></i> Voies associées</h3> <em> - <?php echo $table[$TheChosenOne-1][1]; ?></em>
						</div>
						<div class="widget-content" style="padding-top:10px;">
							<table id="featured-datatable2" class="table table-sorting table-striped table-hover datatable">
								<thead>
									<tr>
										<th>Nom du lien</th><th>Site de départ</th><th>Site d'arrivée</th><th>Capacité max</th>
									</tr>
								</thead>
								<tbody>
								<?php
									for($i=0;$i<count($lien);$i++)
									{
										echo"<tr><td>".$lien[$i][1]
										."</td><td>".$table[$lien[$i][2]-1][1]
										."</td><td>".$table[$lien[$i][3]-1][1]
										."</td><td>".$lien[$i][4]
										."</td></tr>";
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
					<!--VOIE ASSOCIEE-->
					
					<!--RELEVE SITE-->
					<div class="widget widget-table">
						<div class="widget-header">
							<h3><i class="fa fa-truck fa-flip-horizontal"></i> Relevés associées</h3> <em> - <?php echo $table[$TheChosenOne-1][1]; ?></em>
						</div>
						<div class="widget-content" style="padding-top:10px;">
							<table id="featured-datatable" class="table table-sorting table-striped table-hover datatable">
								<thead>
									<tr>
										<th>Site</th><th>Relevé n°</th><th>Heure d'enregistrement</th><th>Valeur</th><th></th>
									</tr>
								</thead>
								<tbody>
								<?php
									for($i=0;$i<count($record);$i++)
									{ echo
										 "<tr><td>".$table[$record[$i][1]-1][1]
										."</td><td>".strval(10000+$record[$i][0])
										."</td><td>".$record[$i][2]
										."</td><td>".$record[$i][3]
										."</td><td><a href='#' data-toggle='modal' data-target='#myModal".$record[$i][0]."'>".$this->Html->image('suppr.png')."</a></td></tr>"; 
										
										//Création du modal
										echo"
										<div class='modal fade' id='myModal".$record[$i][0]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
											<div class='modal-dialog'>
												<div class='modal-content'>
													<div class='modal-header'>
														<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
														<h4 class='modal-title' id='myModalLabel'>Suppression demandée</h4>
													</div>
													<div class='modal-body'>
														<p>Veuillez confirmer la suppression du relevé n°".strval(10000+$record[$i][0])."</p>
													</div>
													<div class='modal-footer'>
														<button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-times-circle'></i> Annuler</button>
														".$this->Html->link("<button type='button' class='btn btn-custom-primary'><i class='fa fa-check-circle'></i> Confirmer</button>"
															,"/sites/suppr_record/".$record[$i][0], ['escape' => false])."
													</div>
												</div>
											</div>
										</div>";
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
					<!--RELEVE SITE-->
					
					<!--GOOGLE MAP-->
					<div class="widget">
						<div class="widget-header">
							<h3><i class="fa fa-globe"></i> Google Map</h3> <em> - le marqueur est cliquable !</em>
						</div>
						<div class="widget-content no-padding">
							<div class="google-map">
								<div id="map-canvas"></div>
							</div>
						</div>
					</div>
					<!--GOOGLE MAP-->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- GOOGLE APP -->
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#featured-datatable2').DataTable();
	});
	
	function codeAddress() {
	
		var address = "<?php echo $table[$TheChosenOne-1][3].",".$table[$TheChosenOne-1][4]; ?>";
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var image = new google.maps.MarkerImage("/my_app_name/img/location-pin.png", null, null, null, new google.maps.Size(32, 32));

				var marker = new google.maps.Marker({
					map: map,
					icon: image,
					position: results[0].geometry.location
				});
				
				var contentString = '<div class="info-window"><h4 style="margin:0px"><?php echo $table[$TheChosenOne-1][1]." - ".$table[$TheChosenOne-1][2]." :: ".$table[$TheChosenOne-1][3].", ".$table[$TheChosenOne-1][4]; ?></h4></div>';

				var infowindow = new google.maps.InfoWindow({
					content: contentString,
					maxWidth: 400
				});

				marker.addListener('click', function () {
					infowindow.open(map, marker);
				});
				
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}
</script>
<!-- GOOGLE APP -->