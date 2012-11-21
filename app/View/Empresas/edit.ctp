<div class="empresas form">
<?php echo $this->Form->create('Empresa'); ?>
	<fieldset>
		<legend><?php echo __('Edit Empresa'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ruc');
		echo $this->Form->input('provincia');
		echo $this->Form->input('tipo');
		echo $this->Form->input('sector');
		echo $this->Form->input('Aplicacion');
		echo $this->Form->input('BaseDato');
		echo $this->Form->input('Lenguaje');
		echo $this->Form->input('SistemaOperativo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Empresa.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Empresa.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Colaboradores'), array('controller' => 'colaboradores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Colaborador'), array('controller' => 'colaboradores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aplicaciones'), array('controller' => 'aplicaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aplicacion'), array('controller' => 'aplicaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Base Datos'), array('controller' => 'base_datos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Base Dato'), array('controller' => 'base_datos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lenguajes'), array('controller' => 'lenguajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lenguaje'), array('controller' => 'lenguajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sistema Operativos'), array('controller' => 'sistema_operativos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sistema Operativo'), array('controller' => 'sistema_operativos', 'action' => 'add')); ?> </li>
	</ul>
</div>
