<div class="idiomas index">
	<h2><?php echo __('Idiomas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($idiomas as $idioma): ?>
	<tr>
		<td><?php echo h($idioma['Idioma']['id']); ?>&nbsp;</td>
		<td><?php echo h($idioma['Idioma']['nombre']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $idioma['Idioma']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $idioma['Idioma']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $idioma['Idioma']['id']), null, __('Are you sure you want to delete # %s?', $idioma['Idioma']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Idioma'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('controller' => 'recursos_humanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('controller' => 'recursos_humanos', 'action' => 'add')); ?> </li>
	</ul>
</div>
