


					<div class="col-sm-4">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading btn-success btn-block" style="background-color: #5cb85c;">
									<h4 class="panel-title text-center">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color:white; text-decoration:none;">
											<i class="fa fa-plus-circle" style="position:relative; top:-1px;"></i><i class="fa fa-plus-circle"></i> AJOUTER UN RELEVE
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<!--DEBUT FORM-->
										
										<?= $this->Form->input('',array('type'=>'number',
																		'class'=>'form-control',
																		'id'=>'new_stock',
																		'placeholder'=>'Stock',
																		'min'=>'0',
																		'style'=>'margin-bottom:15px;')) ?>
										<?= $this->Form->input('Ajouter une date :', array(
																		'type'=>'date',
																		'id'=>'date_relevé',
																		'minYear' => date('Y') - 60, 
																		'maxYear' => date('Y') - 0)) ?>									
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