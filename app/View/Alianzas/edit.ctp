<div class="alianzas form">
<?php echo $this->Form->create('Alianza'); ?>
	<fieldset>
		<legend><?php echo __('Edit Alianza'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('tipo');
		echo $this->Form->input('Universidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Alianza.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Alianza.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Alianzas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
