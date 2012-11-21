<div class="empresas index">
	<h2><?php echo __('Empresas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ruc'); ?></th>
			<th><?php echo $this->Paginator->sort('provincia'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('sector'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($empresas as $empresa): ?>
	<tr>
		<td><?php echo h($empresa['Empresa']['id']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['ruc']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['provincia']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($empresa['Empresa']['sector']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $empresa['Empresa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $empresa['Empresa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $empresa['Empresa']['id']), null, __('Are you sure you want to delete # %s?', $empresa['Empresa']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Empresa'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Colaboradores'), array('controller' => 'colaboradores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Colaborador'), array('controller' => 'colaboradores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aplicaciones'), array('controller' => 'aplicaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aplicacion'), array('controller' => 'aplicaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Base Datos'), array('controller' => 'basedatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Base Dato'), array('controller' => 'base_datos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lenguajes'), array('controller' => 'lenguajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lenguaje'), array('controller' => 'lenguajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sistema Operativos'), array('controller' => 'sistema_operativos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sistema Operativo'), array('controller' => 'sistema_operativos', 'action' => 'add')); ?> </li>
	</ul>
</div>
