<div class="main-header"  style="margin-bottom: 15px;">
	<h2>LISTE</h2>
	<em>de nombreux sites à votre disposition</em>
</div>
<div class="main-content">
	<div class="widget">
		<div class="widget-content"  style="padding: 10px;">
			<div id="external-events">
				<div class="row">
					<div class="col-sm-6">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="btn-success btn-block">
									<h4 class="panel-title text-center">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color:white; text-decoration:none;">
											<i class="fa fa-plus-circle" style="position:relative; top:-1px;"></i><i class="fa fa-plus-circle"></i> AJOUTER UN SITE
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<!--DEBUT FORM-->
										<?= $this->Form->create('Formulaire', array('type'=>'post', 'id'=>'new_site', 'url' => ['controller' => 'Sites', 'action' => 'liste']))?>
										<?= $this->Form->input('name',array('type'=>'text',
																					'class'=>'form-control',
																					'id'=>'name',
																					'label'=>False,
																					'placeholder'=>'Nom du site',
																					'required'=>'required',
																					'style'=>'margin-bottom:5px;')) ?>
										<?= $this->Form->input('type', array('type'=>'select',
																			'class'=>'select2',
																			'id'=>'type',
																			'label'=>False,
																			'options' => ['consommateur'=>'Consommateur','producteur'=>'Producteur'],) ); ?>
										<div class="col-sm-6" style="padding:6px 4px 0 0;">
											<?= $this->Form->input('locx',array('type'=>'number',
																						'class'=>'form-control',
																						'id'=>'locx',
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
																							'label'=>False,
																							'placeholder'=>'Localisation y',
																							'required'=>'required',
																							'style'=>'margin-bottom:5px;')) ?>
										</div>
										<?= $this->Form->input('stock',array('type'=>'number',
																						'class'=>'form-control',
																						'id'=>'stock',
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
				</div>
			</div>
			
			<div class="widget widget-table">
				<div class="widget-header">
					<h3><i class="fa fa-table"></i> Table dynamique</h3> <em> - <a href="http://datatables.net/" target="_blank">jQuery DataTables</a> avec fonction de tri, recherche directe et pagination</em></div>
				<div class="widget-content">
					<table id="featured-datatable" class="table table-sorting table-striped table-hover datatable">
						<thead>
							<tr>
								<th>Nom</th><th>Type</th><th>Localisation X</th><th>Localisation Y</th><th>Stock</th><th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							for($i=0;$i<count($table);$i++)
							{
								//Création de la table
								echo"<tr><td>".$table[$i][1]
								."</td><td>".$table[$i][2]
								."</td><td>".$table[$i][3]
								."</td><td>".$table[$i][4]
								."</td><td>".$table[$i][5]
								."</td><td><a href='#' data-toggle='modal' data-target='#myModal".$table[$i][0]."'>".$this->Html->image('suppr.png')."</a></td></tr>"; 
								
								
								//Création du modal
								echo"
								<div class='modal fade' id='myModal".$table[$i][0]."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
									<div class='modal-dialog'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
												<h4 class='modal-title' id='myModalLabel'>Suppression demandée</h4>
											</div>
											<div class='modal-body'>
												<p>Veuillez confirmer la suppression du site ".$table[$i][1]."</p>
											</div>
											<div class='modal-footer'>
												<button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-times-circle'></i> Annuler</button>
												".$this->Html->link("<button type='button' class='btn btn-custom-primary'><i class='fa fa-check-circle'></i> Confirmer</button>"
													,"/sites/suppr_site/".$table[$i][0], ['escape' => false])."
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
		</div>
		
		<!-- END FEATURED DATA TABLE -->
	</div>
</div>