<?= $this->Form->create();?>
	
<select name="Type" id="type" class="select2">
	<option value="Consommateur">Consommateur</option>
	<option value="Producteur">Producteur</option>
</select>

<?= $this->Form->input('Type : ', array(
	'class'=>'select2',
	'id'=>'type_site',
	'type'=>'select', 
	'options' => ['consommateur'=>'Consommateur','producteur'=>'Poducteur'],
) ); ?>



<?= $this->Form->submit();?>
	<?= $this->Form->end();?>