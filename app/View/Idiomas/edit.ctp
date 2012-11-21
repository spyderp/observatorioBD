<div class="idiomas form">
<?php echo $this->Form->create('Idioma'); ?>
	<fieldset>
		<legend><?php echo __('Edit Idioma'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Idioma.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Idioma.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Idiomas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('controller' => 'recursos_humanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('controller' => 'recursos_humanos', 'action' => 'add')); ?> </li>
	</ul>
</div>
