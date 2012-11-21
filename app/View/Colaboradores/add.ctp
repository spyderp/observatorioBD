<div class="colaboradores form">
<?php echo $this->Form->create('Colaborador'); ?>
	<fieldset>
		<legend><?php echo __('Add Colaborador'); ?></legend>
	<?php
		echo $this->Form->input('cantidad');
		echo $this->Form->input('year');
		echo $this->Form->input('empresa_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Colaboradores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
