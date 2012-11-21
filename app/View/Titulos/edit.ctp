<div class="titulos form">
<?php echo $this->Form->create('Titulo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Titulo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo', array('options'=>array('Licenciatura', 'Postgrado', 'Maestria')));
		echo $this->Form->input('recursosHumano_id');
		echo $this->Form->input('carrera_id');
		echo $this->Form->input('year', array('label'=>'Año', 'options'=>$anos));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Titulo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Titulo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Titulos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('controller' => 'recursos_humanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('controller' => 'recursos_humanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
	</ul>
</div>
