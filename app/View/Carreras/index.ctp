<div class="carreras index">
	<h2><?php echo __('Carreras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('area'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_final'); ?></th>
			<th><?php echo $this->Paginator->sort('Universidad.nombre'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($carreras as $carrera): ?>
	<tr>
		<td><?php echo h($carrera['Carrera']['id']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['area']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['fecha_final']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($carrera['Universidad']['nombre'], array('controller' => 'universidades', 'action' => 'view', $carrera['Universidad']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $carrera['Carrera']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $carrera['Carrera']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $carrera['Carrera']['id']), null, __('Are you sure you want to delete # %s?', $carrera['Carrera']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Carrera'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Titulos'), array('controller' => 'titulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Titulo'), array('controller' => 'titulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
