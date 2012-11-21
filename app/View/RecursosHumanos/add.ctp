<div class="recursosHumanos form">
<?php echo $this->Form->create('RecursosHumano'); ?>
	<fieldset>
		<legend><?php echo __('Add Recursos Humano'); ?></legend>
	<?php
		echo $this->Form->input('egreso');
		echo $this->Form->input('sexo');
		echo $this->Form->input('nacionalidad');
		echo $this->Form->input('provincia');
		echo $this->Form->input('activo');
		echo $this->Form->input('cedula');
		echo $this->Form->input('Idioma');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Idiomas'), array('controller' => 'idiomas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Idioma'), array('controller' => 'idiomas', 'action' => 'add')); ?> </li>
	</ul>
</div>
