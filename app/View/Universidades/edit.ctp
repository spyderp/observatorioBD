<div class="universidades form">
<?php echo $this->Form->create('Universidad'); ?>
	<fieldset>
		<legend><?php echo __('Edit Universidad'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('nivel');
		echo $this->Form->input('activo_hasta');
		echo $this->Form->input('estado');
		echo $this->Form->input('modalidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Universidad.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Universidad.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalles Universidades'), array('controller' => 'detalles_universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalles Universidad'), array('controller' => 'detalles_universidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alianzas'), array('controller' => 'alianzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alianza'), array('controller' => 'alianzas', 'action' => 'add')); ?> </li>
	</ul>
</div>
