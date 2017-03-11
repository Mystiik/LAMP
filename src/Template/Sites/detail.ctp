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
						for($i=0;$i<count($table);$i++)
						{
							if($TheChosenOne==$i) {$selec="selected";} else {$selec="";}
							echo "<option value='$i' $selec>".$table[$i][1]." - ".$table[$i][2]." :: ".$table[$i][3].",".$table[$i][4]."</option>";
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
							index = document.getElementById('select1').selectedIndex;
							
							hiddeninput.value = index;
							
							hiddenform.submit();
						});
					</script>
					
					<!--VOIE ASSOCIEE-->
					<div class="widget widget-table">
						<div class="widget-header">
							<h3><i class="fa fa-table"></i> Voie associée</h3> <em> - <?php echo $table[$TheChosenOne][1]; ?></em></div>
						<div class="widget-content" style="padding-top:10px;">
							<table id="featured-datatable" class="table table-sorting table-striped table-hover datatable">
								<thead>
									<tr>
										<th>Nom du lien</th><th>Site de départ</th><th>Site d'arrivée</th><th>Capacité max</th>
									</tr>
								</thead>
								<tbody>
								<?php
									for($i=0;$i<count($table);$i++)
									{ echo"<tr><td>".$table[$i][1]."</td><td>".$table[$i][2]."</td><td>".$table[$i][3]."</td><td>".$table[$i][4]."</td></tr>"; }
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
					
					
					<div class="widget widget-chart-toggle-series">
						<div class="widget-header">
							<h3><i class="fa fa-bar-chart-o"></i> Flot Chart: On/Off Data Series</h3> <em> - toggle on/off data series on the chart by using checkboxes on the right</em>
						</div>
						<div class="widget-content">
							<div class="row">
								<div class="col-md-10">
									<!-- king-chart-stat.js -> chartToggleSeries -->
									<div class="demo-flot-chart" id="demo-toggle-series-chart"></div>
								</div>
								<div class="col-md-2">
									<!-- must be id="choices" -->
									<div id="choices"></div>
								</div>
							</div>
						</div>
					</div>
					
					
					
					
					<div class="col-md-3">
						<div class="easy-pie-chart green" data-percent="85">
							<span class="percent">85</span>
						</div>
						<p class="text-center">Task Completion</p>
					</div>
					<div class="col-md-3">
						<div class="easy-pie-chart blue" data-percent="400">
							<span class="percent">400</span>
						</div>
						<p class="text-center">Overall Project Completion</p>
					</div>
					<div class="col-md-3">
						<div class="easy-pie-chart yellow" data-percent="65">
							<span class="percent">65</span>
						</div>
						<p class="text-center">Disk Space Used</p>
					</div>
					<div class="col-md-3">
						<div class="easy-pie-chart red" data-percent="87">
							<span class="percent">87</span>
						</div>
						<p class="text-center">Bandwidth Used</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function codeAddress() {
	
		var address = "<?php echo $table[$TheChosenOne][3].",".$table[$TheChosenOne][4]; ?>";
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var image = new google.maps.MarkerImage("/my_app_name/img/location-pin.png", null, null, null, new google.maps.Size(32, 32));

				var marker = new google.maps.Marker({
					map: map,
					icon: image,
					position: results[0].geometry.location
					
				});
				
				var contentString = '<div class="info-window"><h4 style="margin:0px"><?php echo $producteur[$TheChosenOne][1]." - ".$producteur[$TheChosenOne][2]." :: ".$producteur[$TheChosenOne][3].", ".$producteur[$TheChosenOne][4]; ?></h4></div>';

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



