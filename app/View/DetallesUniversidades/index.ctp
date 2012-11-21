<div class="detallesUniversidades index">
	<h2><?php echo __('Detalles Universidades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ano_egreso', 'Egresado'); ?></th>
			<th><?php echo $this->Paginator->sort('ano_decersion', 'Dicersión'); ?></th>
			<th><?php echo $this->Paginator->sort('year', 'Año'); ?></th>
			<th><?php echo $this->Paginator->sort('universidad_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($detallesUniversidades as $detallesUniversidad): ?>
	<tr>
		<td><?php echo h($detallesUniversidad['DetallesUniversidad']['id']); ?>&nbsp;</td>
		<td><?php echo h($detallesUniversidad['DetallesUniversidad']['ano_egreso']); ?>&nbsp;</td>
		<td><?php echo h($detallesUniversidad['DetallesUniversidad']['ano_decersion']); ?>&nbsp;</td>
		<td><?php echo h($detallesUniversidad['DetallesUniversidad']['year']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detallesUniversidad['Universidad']['nombre'], array('controller' => 'universidades', 'action' => 'view', $detallesUniversidad['Universidad']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $detallesUniversidad['DetallesUniversidad']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $detallesUniversidad['DetallesUniversidad']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $detallesUniversidad['DetallesUniversidad']['id']), null, __('Are you sure you want to delete # %s?', $detallesUniversidad['DetallesUniversidad']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Detalles Universidad'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
