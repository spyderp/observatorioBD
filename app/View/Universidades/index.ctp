<div class="universidades index">
	<h2><?php echo __('Universidades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('nivel'); ?></th>
			<th><?php echo $this->Paginator->sort('activo_hasta'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('modalidad'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($universidades as $universidad): ?>
	<tr>
		<td><?php echo h($universidad['Universidad']['id']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['nivel']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['activo_hasta']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['estado']); ?>&nbsp;</td>
		<td><?php echo h($universidad['Universidad']['modalidad']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $universidad['Universidad']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $universidad['Universidad']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $universidad['Universidad']['id']), null, __('Are you sure you want to delete # %s?', $universidad['Universidad']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Universidad'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalles Universidades'), array('controller' => 'detalles_universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalles Universidad'), array('controller' => 'detalles_universidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alianzas'), array('controller' => 'alianzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alianza'), array('controller' => 'alianzas', 'action' => 'add')); ?> </li>
	</ul>
</div>
