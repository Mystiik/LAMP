<div class="main-header"  style="margin-bottom: 15px;">
	<h2>ACHEMINEMENT</h2>
	<em>vous ce que vous voulez, où vous voulez</em>
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
					
					
					
					<!--CHART-->
					<div class="widget widget-chart-toggle-series">
						<div class="widget-header">
							<h3><i class="fa fa-battery-three-quarters"></i>Etat des stocks du dernier mois</h3> <em> - consommation et production journalière du site</em>
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
					<!--CHART-->
					
					
				</div>
			</div>
		</div>
	</div>
</div>


<!-- RELEVE DU MOIS -->
<script type="text/javascript">
// init interactive flot chart: toggle on/off data series
$(document).ready(function(){	
	function chartToggleSeries(placeholder) {

		var datasets = {
			"Stock": {
				label: "Stock",
				data: [
				
				<?php
					$stock = 1000;
					for($i=0;$i<count($record);$i++)
					{
						if($i!=0) { echo","; }
						echo"[gt('".$record[$i][2]."'), ".$stock."]";
						
						$stock+=$record[$i][3];
					}
				?>
				]
			}
		};

		// hard-code color indices to prevent them from shifting as countries are turned on/off
		var i = 0;
		$.each(datasets, function(key, val) {
			val.color = i;
			++i;
		});

		// insert checkboxes 
		var choiceContainer = $("#choices");
		$.each( datasets, function( key, val ) {

			choiceContainer.append(
				"<label class='fancy-checkbox custom-bgcolor-green'><input type='checkbox' name='" + key + "' checked='checked' id='id" + key + "'><span for='id" + key + "'>" + val.label + "</span></label>"
			);
		});

		choiceContainer.find("input").click( function() {
			plotAccordingToChoices(placeholder, datasets);
		});

		plotAccordingToChoices(placeholder, datasets);
	}
	
	if( $('#demo-toggle-series-chart').length > 0 ) {
		chartToggleSeries( $('#demo-toggle-series-chart') );
	}
	
	function plotAccordingToChoices(placeholder, datasets) {

		var data = [];

		$("#choices").find("input:checked").each(function () {
			var key = $(this).attr("name");
			if (key && datasets[key]) {
				data.push(datasets[key]);
			}
		});

		if (data.length > 0) {
			$.plot( placeholder, data, {
				series: {
					lines: {
						show: true,
						lineWidth: 2, 
						fill: true
					},
					points: {
						show: true, 
						lineWidth: 3,
						fill: true,
						fillColor: "#fafafa"
					},
					shadowSize: 0
				},

				grid: {
					hoverable: true, 
					clickable: true,
					borderWidth: 0,
					tickColor: "#E4E4E4",
				},
				xaxis: {
				mode: "time",
				timezone: "browser",
				minTickSize: [1, "day"],
				timeformat: "%d/%m/%y",
				font: { color: "#555" },
				tickColor: "#fafafa",
				autoscaleMargin: 0.02
				},
				yaxis: {
					min: 0,
					
				},
				colors: ["#5cb85c", "#5399D6", "#d7ea2b", "#f30", "#E7A13D"],
				legend: {
					labelBoxBorderColor: "transparent",
					backgroundColor: "transparent",
					noColumns: 4
				},
				tooltip: true,
				tooltipOpts: {
					xDateFormat: "%d/%m/%Y %H:%M:%S"
				}
			});
		}
	}
	
	// get day function
	function gt(d) {
		return new Date(d).getTime();
	}
});
</script>
<!-- RELEVE DU MOIS -->
