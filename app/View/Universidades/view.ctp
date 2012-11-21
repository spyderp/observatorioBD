<div class="universidades view">
<h2><?php  echo __('Universidad'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nivel'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['nivel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo Hasta'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['activo_hasta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modalidad'); ?></dt>
		<dd>
			<?php echo h($universidad['Universidad']['modalidad']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Universidad'), array('action' => 'edit', $universidad['Universidad']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Universidad'), array('action' => 'delete', $universidad['Universidad']['id']), null, __('Are you sure you want to delete # %s?', $universidad['Universidad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalles Universidades'), array('controller' => 'detalles_universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalles Universidad'), array('controller' => 'detalles_universidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alianzas'), array('controller' => 'alianzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alianza'), array('controller' => 'alianzas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Carreras'); ?></h3>
	<?php if (!empty($universidad['Carrera'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Area'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Fecha Final'); ?></th>
		<th><?php echo __('Universidad Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($universidad['Carrera'] as $carrera): ?>
		<tr>
			<td><?php echo $carrera['id']; ?></td>
			<td><?php echo $carrera['nombre']; ?></td>
			<td><?php echo $carrera['area']; ?></td>
			<td><?php echo $carrera['fecha_inicio']; ?></td>
			<td><?php echo $carrera['fecha_final']; ?></td>
			<td><?php echo $carrera['universidad_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'carreras', 'action' => 'view', $carrera['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'carreras', 'action' => 'edit', $carrera['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'carreras', 'action' => 'delete', $carrera['id']), null, __('Are you sure you want to delete # %s?', $carrera['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Detalles Universidades'); ?></h3>
	<?php if (!empty($universidad['DetallesUniversidad'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ano Egreso'); ?></th>
		<th><?php echo __('Ano Decersion'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Universidad Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($universidad['DetallesUniversidad'] as $detallesUniversidad): ?>
		<tr>
			<td><?php echo $detallesUniversidad['id']; ?></td>
			<td><?php echo $detallesUniversidad['ano_egreso']; ?></td>
			<td><?php echo $detallesUniversidad['ano_decersion']; ?></td>
			<td><?php echo $detallesUniversidad['year']; ?></td>
			<td><?php echo $detallesUniversidad['universidad_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'detalles_universidades', 'action' => 'view', $detallesUniversidad['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'detalles_universidades', 'action' => 'edit', $detallesUniversidad['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'detalles_universidades', 'action' => 'delete', $detallesUniversidad['id']), null, __('Are you sure you want to delete # %s?', $detallesUniversidad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Detalles Universidad'), array('controller' => 'detalles_universidades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Alianzas'); ?></h3>
	<?php if (!empty($universidad['Alianza'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($universidad['Alianza'] as $alianza): ?>
		<tr>
			<td><?php echo $alianza['id']; ?></td>
			<td><?php echo $alianza['nombre']; ?></td>
			<td><?php echo $alianza['tipo']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'alianzas', 'action' => 'view', $alianza['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'alianzas', 'action' => 'edit', $alianza['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'alianzas', 'action' => 'delete', $alianza['id']), null, __('Are you sure you want to delete # %s?', $alianza['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Alianza'), array('controller' => 'alianzas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
