<div class="detallesUniversidades form">
<?php 

for($i=date('Y');$i>2000;$i--){
	$anos[]=$i;
}
echo $this->Form->create('DetallesUniversidad'); ?>
	<fieldset>
		<legend><?php echo __('Add Detalles Universidad'); ?></legend>
	<?php
		echo $this->Form->input('ano_egreso');
		echo $this->Form->input('ano_decersion');
		echo $this->Form->input('year', array('label'=>'Año', 'options'=>$anos));
		echo $this->Form->input('universidad_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Detalles Universidades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
