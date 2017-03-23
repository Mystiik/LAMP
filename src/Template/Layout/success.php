<?php
	
	if(isset($success))
	{
		//Création du modal
		echo"
		<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title' id='myModalLabel'>Succès !</h4>
				</div>
				<div class='modal-body'>
					<p>L'action que vous avez demandée a été effectuée avec brio !</p>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa fa-check-circle'></i> Génial !</button>
				</div>
			</div>
		</div>
		</div>
		
		<script type='text/javascript'>
			$('#myModal').modal('show');
		</script>
		";
	}
?>