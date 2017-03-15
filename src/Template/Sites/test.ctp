<div class="main-header"  style="margin-bottom: 15px;">
	<h2>ACCUEIL</h2>
	<em>tout projet à un commencement</em>
</div>
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
					<input type="text" class="form-control" id="name" placeholder="Nom du site" style="margin-bottom:5px;">
					<input type="text" class="form-control" id="type" placeholder="Type du site" style="margin-bottom:5px;">
					<div class="col-sm-6" style="padding:0 4px 0 0;">
						<input type="text" class="form-control" id="localisation x" placeholder="Localisation x" style="margin-bottom:5px;">
					</div>
					<div class="col-sm-6" style="padding:0 0 0 4px;">
						<input type="text" class="form-control" id="localisation y" placeholder="Localisation y" style="margin-bottom:5px;">
					</div>
					<input type="text" class="form-control" id="stocks" placeholder="Stocks" style="margin-bottom:15px;">
					
					<div class="col-sm-6" style="padding:0 4px 0 0;">
						<button type="button" id="btn-quick-event" class="btn btn-secondary btn-block">Valider</button>
					</div>
					<div class="col-sm-6" style="padding:0 0 0 4px;">
						<button type="button" id="btn-quick-event" class="btn btn-custom-primary btn-block">Annuler</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	echo $this -> html -> link ($a, $b);

	echo $this -> form -> create(); 
	echo 