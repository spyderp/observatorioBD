<div class="colaboradores index">
	<h2><?php echo __('Colaboradores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cantidad'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($colaboradores as $colaborador): ?>
	<tr>
		<td><?php echo h($colaborador['Colaborador']['id']); ?>&nbsp;</td>
		<td><?php echo h($colaborador['Colaborador']['cantidad']); ?>&nbsp;</td>
		<td><?php echo h($colaborador['Colaborador']['year']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($colaborador['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $colaborador['Empresa']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $colaborador['Colaborador']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $colaborador['Colaborador']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $colaborador['Colaborador']['id']), null, __('Are you sure you want to delete # %s?', $colaborador['Colaborador']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Colaborador'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
