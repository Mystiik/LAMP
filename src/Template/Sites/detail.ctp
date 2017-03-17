<div class="main-header"  style="margin-bottom: 15px;">
	<h2>DETAIL</h2>
	<em>vous voulez des détails, vous allez être servi</em>
</div>
<div class="main-content">
	<div class="widget">
		<div class="widget-header" >
			<h3><i class="fa fa-bar-chart-o"></i> Statistique de sites</h3> <em> - Graphique linéaire avec plusieurs données (année en cours)</em>
		</div>
		
		<div class="widget-content"  style="padding: 10px;">
			<div class="row">
				<div class="col-sm-12">
					<select name="select2" id="select1" class="select2 FORM" style="margin-bottom:35px">
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
					
					<!--PROGRESS BAR-->
					<div class="widget widget-table">
						<div class="widget-header">
							<h3><i class="fa fa-table"></i>Statistique du site</h3> <em> - <?php echo $table[$TheChosenOne-1][1]; ?></em>
						</div>
						<div class="widget-content" style="padding-top:10px;">
							<div class="row">
								<div class="col-sm-6">
									<div class="progress">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
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
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
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
							<h3><i class="fa fa-truck fa-flip-horizontal"></i> Voie associée</h3> <em> - <?php echo $table[$TheChosenOne-1][1]; ?></em>
						</div>
						<div class="widget-content" style="padding-top:10px;">
							<table id="featured-datatable" class="table table-sorting table-striped table-hover datatable">
								<thead>
									<tr>
										<th>Nom du lien</th><th>Site de départ</th><th>Site d'arrivée</th><th>Capacité max</th>
									</tr>
								</thead>
								<tbody>
								<?php
									for($i=0;$i<count($lien);$i++)
									{ echo"<tr><td>".$lien[$i][1]."</td><td>".$table[$lien[$i][2]-1][1]."</td><td>".$table[$lien[$i][3]-1][1]."</td><td>".$lien[$i][4]."</td></tr>"; }
								?>
								</tbody>
							</table>
						</div>
					</div>
					
					
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