<div class="carreras form">
<?php echo $this->Form->create('Carrera'); ?>
	<fieldset>
		<legend><?php echo __('Add Carrera'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('area');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_final');
		echo $this->Form->input('universidad_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Carreras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Titulos'), array('controller' => 'titulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Titulo'), array('controller' => 'titulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
