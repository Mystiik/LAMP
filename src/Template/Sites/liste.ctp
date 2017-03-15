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
										<input type="text" class="form-control" id="quick-event-name" placeholder="new event title">
										<button type="button" id="btn-quick-event" class="btn btn-custom-primary btn-block"><i class="fa fa-plus-square"></i> Create</button>
									</div>
								</div>
							</div>
						</div>
					</div>
			
					<div class="col-sm-6">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading btn-danger btn-block" style="background-color: #DB3833;">
									<h4 class="panel-title text-center">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color:white; text-decoration:none;">
											<i class="fa fa-minus-circle" style="position:relative; top:-1px;"></i><i class="fa fa-plus-circle"></i> RETIRER UN SITE
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<input type="text" class="form-control" id="quick-event-name" placeholder="new event title">
										<button type="button" id="btn-quick-event" class="btn btn-custom-primary btn-block"><i class="fa fa-plus-square"></i> Create</button>
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
								<th>Nom</th><th>Type</th><th>Localisation X</th><th>Localisation Y</th><th>Stock</th>
							</tr>
						</thead>
						<tbody>
						<?php
							for($i=0;$i<count($table);$i++)
							{ echo"<tr><td>".$table[$i][1]."</td><td>".$table[$i][2]."</td><td>".$table[$i][3]."</td><td>".$table[$i][4]."</td><td>".$table[$i][5]."</td></tr>"; }
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- END FEATURED DATA TABLE -->
	</div>
</div>