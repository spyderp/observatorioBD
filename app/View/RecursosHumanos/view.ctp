<div class="recursosHumanos view">
<h2><?php  echo __('Recursos Humano'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recursosHumano['RecursosHumano']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Egreso'); ?></dt>
		<dd>
			<?php echo h($recursosHumano['RecursosHumano']['egreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo h($recursosHumano['RecursosHumano']['sexo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nacionalidad'); ?></dt>
		<dd>
			<?php echo h($recursosHumano['RecursosHumano']['nacionalidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo h($recursosHumano['RecursosHumano']['provincia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($recursosHumano['RecursosHumano']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula'); ?></dt>
		<dd>
			<?php echo h($recursosHumano['RecursosHumano']['cedula']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recursos Humano'), array('action' => 'edit', $recursosHumano['RecursosHumano']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recursos Humano'), array('action' => 'delete', $recursosHumano['RecursosHumano']['id']), null, __('Are you sure you want to delete # %s?', $recursosHumano['RecursosHumano']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Idiomas'), array('controller' => 'idiomas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Idioma'), array('controller' => 'idiomas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Idiomas'); ?></h3>
	<?php if (!empty($recursosHumano['Idioma'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recursosHumano['Idioma'] as $idioma): ?>
		<tr>
			<td><?php echo $idioma['id']; ?></td>
			<td><?php echo $idioma['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'idiomas', 'action' => 'view', $idioma['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'idiomas', 'action' => 'edit', $idioma['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'idiomas', 'action' => 'delete', $idioma['id']), null, __('Are you sure you want to delete # %s?', $idioma['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Idioma'), array('controller' => 'idiomas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
