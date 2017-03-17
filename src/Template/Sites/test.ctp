<?= $this->Form->input('Producteur', array(
	'id'=>'type_produ',
	'type'=>'checkbox', 
	'format' => array('before', 'input', 'between', 'label', 'after', 'error' ) ) ); ?>
   
<?= $this->Form->input('Consommateur', array(
	'id'=>'type_conso',
	'type'=>'checkbox', 
	'format' => array('before', 'input', 'between', 'label', 'after', 'error' ) ) ); ?>