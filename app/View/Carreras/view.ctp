<div class="carreras view">
<h2><?php  echo __('Carrera'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Final'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['fecha_final']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Universidad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($carrera['Universidad']['id'], array('controller' => 'universidades', 'action' => 'view', $carrera['Universidad']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Carrera'), array('action' => 'edit', $carrera['Carrera']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carrera'), array('action' => 'delete', $carrera['Carrera']['id']), null, __('Are you sure you want to delete # %s?', $carrera['Carrera']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Titulos'), array('controller' => 'titulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Titulo'), array('controller' => 'titulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Titulos'); ?></h3>
	<?php if (!empty($carrera['Titulo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('RecursosHumano Id'); ?></th>
		<th><?php echo __('Carrera Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($carrera['Titulo'] as $titulo): ?>
		<tr>
			<td><?php echo $titulo['id']; ?></td>
			<td><?php echo $titulo['year']; ?></td>
			<td><?php echo $titulo['tipo']; ?></td>
			<td><?php echo $titulo['recursosHumano_id']; ?></td>
			<td><?php echo $titulo['carrera_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'titulos', 'action' => 'view', $titulo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'titulos', 'action' => 'edit', $titulo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'titulos', 'action' => 'delete', $titulo['id']), null, __('Are you sure you want to delete # %s?', $titulo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Titulo'), array('controller' => 'titulos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
