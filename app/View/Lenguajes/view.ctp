<div class="lenguajes view">
<h2><?php  echo __('Lenguaj'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lenguaj['Lenguaj']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($lenguaj['Lenguaj']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lenguaj'), array('action' => 'edit', $lenguaj['Lenguaj']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lenguaj'), array('action' => 'delete', $lenguaj['Lenguaj']['id']), null, __('Are you sure you want to delete # %s?', $lenguaj['Lenguaj']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lenguajes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lenguaj'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Empresas'); ?></h3>
	<?php if (!empty($lenguaj['Empresa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ruc'); ?></th>
		<th><?php echo __('Provincia'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Sector'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($lenguaj['Empresa'] as $empresa): ?>
		<tr>
			<td><?php echo $empresa['id']; ?></td>
			<td><?php echo $empresa['ruc']; ?></td>
			<td><?php echo $empresa['provincia']; ?></td>
			<td><?php echo $empresa['tipo']; ?></td>
			<td><?php echo $empresa['sector']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'empresas', 'action' => 'view', $empresa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'empresas', 'action' => 'edit', $empresa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'empresas', 'action' => 'delete', $empresa['id']), null, __('Are you sure you want to delete # %s?', $empresa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
