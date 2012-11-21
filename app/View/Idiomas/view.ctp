<div class="idiomas view">
<h2><?php  echo __('Idioma'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($idioma['Idioma']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($idioma['Idioma']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Idioma'), array('action' => 'edit', $idioma['Idioma']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Idioma'), array('action' => 'delete', $idioma['Idioma']['id']), null, __('Are you sure you want to delete # %s?', $idioma['Idioma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Idiomas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Idioma'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('controller' => 'recursos_humanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('controller' => 'recursos_humanos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Recursos Humanos'); ?></h3>
	<?php if (!empty($idioma['RecursosHumano'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Egreso'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Nacionalidad'); ?></th>
		<th><?php echo __('Provincia'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Cedula'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($idioma['RecursosHumano'] as $recursosHumano): ?>
		<tr>
			<td><?php echo $recursosHumano['id']; ?></td>
			<td><?php echo $recursosHumano['egreso']; ?></td>
			<td><?php echo $recursosHumano['sexo']; ?></td>
			<td><?php echo $recursosHumano['nacionalidad']; ?></td>
			<td><?php echo $recursosHumano['provincia']; ?></td>
			<td><?php echo $recursosHumano['activo']; ?></td>
			<td><?php echo $recursosHumano['cedula']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recursos_humanos', 'action' => 'view', $recursosHumano['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recursos_humanos', 'action' => 'edit', $recursosHumano['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recursos_humanos', 'action' => 'delete', $recursosHumano['id']), null, __('Are you sure you want to delete # %s?', $recursosHumano['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recursos Humano'), array('controller' => 'recursos_humanos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
