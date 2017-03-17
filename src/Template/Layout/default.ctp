<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="KingAdmin - Bootstrap Admin Dashboard Theme">
		<meta name="author" content="The Develovers">
		<title>
			<?= $this->fetch('title') ?>
		</title>
		<?= $this->Html->meta('icon') ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('assets') ?>
		<!-- CSS -->
		<?= $this->Html->css('style.css') ?>
		<?= $this->Html->css('bootstrap.min.css') ?>
		<?= $this->Html->css('font-awesome.min.css') ?>
		<?= $this->Html->css('main.min.css') ?>
		<!--[if lte IE 9]>
			<?= $this->Html->css('main-ie.css') ?>
			<?= $this->Html->css('main-ie-part2.css') ?>
		<![endif]-->
		<!-- JS -->
		<?= $this->Html->script('jquery/jquery-2.1.0.min.js') ?>
		<?= $this->Html->script('bootstrap/bootstrap.js') ?>
		<?= $this->Html->script('plugins/modernizr/modernizr.js') ?>
		<?= $this->Html->script('plugins/bootstrap-tour/bootstrap-tour.custom.js') ?>
		<?= $this->Html->script('plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>
		<?= $this->Html->script('king-common.js') ?>
		<?= $this->Html->script('plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>
		<?= $this->Html->script('plugins/stat/flot/jquery.flot.min.js') ?>
		<?= $this->Html->script('plugins/stat/flot/jquery.flot.pie.min.js') ?>
		<?= $this->Html->script('king-chart-stat.js') ?>
		
		<?= $this->Html->script('plugins/datatable/jquery.dataTables.min.js') ?>
		<?= $this->Html->script('plugins/datatable/exts/dataTables.colVis.bootstrap.js') ?>
		<?= $this->Html->script('plugins/datatable/exts/dataTables.colReorder.min.js') ?>
		<?= $this->Html->script('plugins/datatable/exts/dataTables.tableTools.min.js') ?>
		<?= $this->Html->script('plugins/datatable/dataTables.bootstrap.js') ?>
		<?= $this->Html->script('plugins/jqgrid/jquery.jqGrid.min.js') ?>
		<?= $this->Html->script('plugins/jqgrid/i18n/grid.locale-en.js') ?>
		<?= $this->Html->script('plugins/jqgrid/jquery.jqGrid.fluid.js') ?>
		<?= $this->Html->script('plugins/bootstrap-datepicker/bootstrap-datepicker.js') ?>
		<?= $this->Html->script('plugins/select2/select2.min.js') ?>
		<?= $this->Html->script('king-table.js') ?>
		<?= $this->Html->script('plugins/google-map/google-map.js') ?>
		<?= $this->Html->script('plugins/stat/flot/jquery.flot.resize.min.js') ?>
		<?= $this->Html->script('plugins/stat/flot/jquery.flot.tooltip.min.js') ?>
		<?= $this->Html->script('plugins/stat/flot/jquery.flot.selection.min.js') ?>
		<?= $this->Html->script('plugins/stat/flot/jquery.flot.time.min.js') ?>
		
		
	</head>
	
	<body class="sidebar-fixed topnav-fixed dashboard4">
		<div id="wrapper" class="wrapper">
			<?php include("top_bar.php"); ?>
			<?php include("left_bar.php"); ?>
			
			<div id="main-content-wrapper" class="content-wrapper">
				<div class="content">
					<?= $this->fetch('content') ?>
				</div>
				
				</br></br>
				<footer class="footer">
					<p>Gr2 02 AF | Options implémentées: A,C,D,E,F</p>
					<p>Guillaume NICOLAS, Vincent RAVAINE, Guillaume LEMOINE, Selma GOURIMI</p>
					<p>&copy; 2017 Web-energie</p>
				</footer>
			</div>
		</div>
		
		<?= $this->Flash->render() ?>
		
	</body>
</html>