<div class="titulos index">
	<h2><?php echo __('Titulos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('recursosHumano_id'); ?></th>
			<th><?php echo $this->Paginator->sort('carrera_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($titulos as $titulo): ?>
	<tr>
		<td><?php echo h($titulo['Titulo']['id']); ?>&nbsp;</td>
		<td><?php echo h($titulo['Titulo']['year']); ?>&nbsp;</td>
		<td><?php echo h($titulo['Titulo']['tipo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($titulo['RecursosHumano']['id'], array('controller' => 'recursos_humanos', 'action' => 'view', $titulo['RecursosHumano']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($titulo['Carrera']['id'], array('controller' => 'carreras', 'action' => 'view', $titulo['Carrera']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $titulo['Titulo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $titulo['Titulo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $titulo['Titulo']['id']), null, __('Are you sure you want to delete # %s?', $titulo['Titulo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Titulo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('controller' => 'recursos_humanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('controller' => 'recursos_humanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
	</ul>
</div>
