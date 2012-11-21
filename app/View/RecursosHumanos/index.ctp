<div class="recursosHumanos index">
	<h2><?php echo __('Recursos Humanos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('egreso'); ?></th>
			<th><?php echo $this->Paginator->sort('sexo'); ?></th>
			<th><?php echo $this->Paginator->sort('nacionalidad'); ?></th>
			<th><?php echo $this->Paginator->sort('provincia'); ?></th>
			<th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th><?php echo $this->Paginator->sort('cedula'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($recursosHumanos as $recursosHumano): ?>
	<tr>
		<td><?php echo h($recursosHumano['RecursosHumano']['id']); ?>&nbsp;</td>
		<td><?php echo h($recursosHumano['RecursosHumano']['egreso']); ?>&nbsp;</td>
		<td><?php echo h($recursosHumano['RecursosHumano']['sexo']); ?>&nbsp;</td>
		<td><?php echo h($recursosHumano['RecursosHumano']['nacionalidad']); ?>&nbsp;</td>
		<td><?php echo h($recursosHumano['RecursosHumano']['provincia']); ?>&nbsp;</td>
		<td><?php echo h($recursosHumano['RecursosHumano']['activo']); ?>&nbsp;</td>
		<td><?php echo h($recursosHumano['RecursosHumano']['cedula']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recursosHumano['RecursosHumano']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recursosHumano['RecursosHumano']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recursosHumano['RecursosHumano']['id']), null, __('Are you sure you want to delete # %s?', $recursosHumano['RecursosHumano']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Idiomas'), array('controller' => 'idiomas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Idioma'), array('controller' => 'idiomas', 'action' => 'add')); ?> </li>
	</ul>
</div>
