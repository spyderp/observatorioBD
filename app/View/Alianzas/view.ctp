<div class="alianzas view">
<h2><?php  echo __('Alianza'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alianza['Alianza']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($alianza['Alianza']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($alianza['Alianza']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alianza'), array('action' => 'edit', $alianza['Alianza']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alianza'), array('action' => 'delete', $alianza['Alianza']['id']), null, __('Are you sure you want to delete # %s?', $alianza['Alianza']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alianzas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alianza'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Universidades'); ?></h3>
	<?php if (!empty($alianza['Universidad'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Nivel'); ?></th>
		<th><?php echo __('Activo Hasta'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Modalidad'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($alianza['Universidad'] as $universidad): ?>
		<tr>
			<td><?php echo $universidad['id']; ?></td>
			<td><?php echo $universidad['nombre']; ?></td>
			<td><?php echo $universidad['nivel']; ?></td>
			<td><?php echo $universidad['activo_hasta']; ?></td>
			<td><?php echo $universidad['estado']; ?></td>
			<td><?php echo $universidad['modalidad']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'universidades', 'action' => 'view', $universidad['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'universidades', 'action' => 'edit', $universidad['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'universidades', 'action' => 'delete', $universidad['id']), null, __('Are you sure you want to delete # %s?', $universidad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
