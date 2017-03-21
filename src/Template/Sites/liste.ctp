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
								<div class="panel-heading btn-success btn-block" style="background-color: #5cb85c;">
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
																					'style'=>'margin-bottom:5px;')) ?>
										<?= $this->Form->input('type',array('type'=>'text',
																					'class'=>'form-control',
																					'id'=>'type',
																					'label'=>False,
																					'placeholder'=>'Type du site (producteur/consommateur)',
																					'style'=>'margin-bottom:5px;')) ?>
										<div class="col-sm-6" style="padding:0 4px 0 0;">
											<?= $this->Form->input('locx',array('type'=>'text',
																						'class'=>'form-control',
																						'id'=>'locx',
																						'label'=>False,
																						'placeholder'=>'Localisation x',
																						'style'=>'margin-bottom:5px;')) ?>
										</div>
										<div class="col-sm-6" style="padding:0 0 0 4px;">
											<?= $this->Form->input('locy',array('type'=>'text',
																							'class'=>'form-control',
																							'id'=>'locy',
																							'label'=>False,
																							'placeholder'=>'Localisation y',
																							'style'=>'margin-bottom:5px;')) ?>
										</div>
										<?= $this->Form->input('stock',array('type'=>'text',
																						'class'=>'form-control',
																						'id'=>'stock',
																						'label'=>False,
																						'placeholder'=>'Stock',
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
								<th>Nom</th><th>Type</th><th>Localisation X</th><th>Localisation Y</th><th>Stock</th><th></th><th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($table as $line)
							{ echo"<tr><td>".$line->name
							."</td><td>".$line->type
							."</td><td>".$line->location_x
							."</td><td>".$line->location_y
							."</td><td>".$line->stock
							."</td><td>".$this->Html->link($this->Html->image('suppr.png'), "/sites/delete/parametre",['escape' => false])
							."</td><td>".$this->Html->link($this->Html->image('modif.jpg'), "/sites/modifier/parametre",['escape' => false]);}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<!-- END FEATURED DATA TABLE -->
	</div>
</div>