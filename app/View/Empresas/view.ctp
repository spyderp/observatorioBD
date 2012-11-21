<div class="empresas view">
<h2><?php  echo __('Empresa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ruc'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['provincia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sector'); ?></dt>
		<dd>
			<?php echo h($empresa['Empresa']['sector']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Empresa'), array('action' => 'edit', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Empresa'), array('action' => 'delete', $empresa['Empresa']['id']), null, __('Are you sure you want to delete # %s?', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Colaboradores'), array('controller' => 'colaboradores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Colaborador'), array('controller' => 'colaboradores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aplicaciones'), array('controller' => 'aplicaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aplicacion'), array('controller' => 'aplicaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Base Datos'), array('controller' => 'base_datos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Base Dato'), array('controller' => 'base_datos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lenguajes'), array('controller' => 'lenguajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lenguaje'), array('controller' => 'lenguajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sistema Operativos'), array('controller' => 'sistema_operativos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sistema Operativo'), array('controller' => 'sistema_operativos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Colaboradores'); ?></h3>
	<?php if (!empty($empresa['Colaborador'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Colaborador'] as $colaborador): ?>
		<tr>
			<td><?php echo $colaborador['id']; ?></td>
			<td><?php echo $colaborador['cantidad']; ?></td>
			<td><?php echo $colaborador['year']; ?></td>
			<td><?php echo $colaborador['empresa_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'colaboradores', 'action' => 'view', $colaborador['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'colaboradores', 'action' => 'edit', $colaborador['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'colaboradores', 'action' => 'delete', $colaborador['id']), null, __('Are you sure you want to delete # %s?', $colaborador['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Colaborador'), array('controller' => 'colaboradores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Aplicaciones'); ?></h3>
	<?php if (!empty($empresa['Aplicacion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Aplicacion'] as $aplicacion): ?>
		<tr>
			<td><?php echo $aplicacion['id']; ?></td>
			<td><?php echo $aplicacion['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'aplicaciones', 'action' => 'view', $aplicacion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'aplicaciones', 'action' => 'edit', $aplicacion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aplicaciones', 'action' => 'delete', $aplicacion['id']), null, __('Are you sure you want to delete # %s?', $aplicacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Aplicacion'), array('controller' => 'aplicaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Base Datos'); ?></h3>
	<?php if (!empty($empresa['BaseDato'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['BaseDato'] as $baseDato): ?>
		<tr>
			<td><?php echo $baseDato['id']; ?></td>
			<td><?php echo $baseDato['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'base_datos', 'action' => 'view', $baseDato['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'base_datos', 'action' => 'edit', $baseDato['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'base_datos', 'action' => 'delete', $baseDato['id']), null, __('Are you sure you want to delete # %s?', $baseDato['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Base Dato'), array('controller' => 'base_datos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Lenguajes'); ?></h3>
	<?php if (!empty($empresa['Lenguaje'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['Lenguaje'] as $lenguaje): ?>
		<tr>
			<td><?php echo $lenguaje['id']; ?></td>
			<td><?php echo $lenguaje['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lenguajes', 'action' => 'view', $lenguaje['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lenguajes', 'action' => 'edit', $lenguaje['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lenguajes', 'action' => 'delete', $lenguaje['id']), null, __('Are you sure you want to delete # %s?', $lenguaje['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lenguaje'), array('controller' => 'lenguajes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sistema Operativos'); ?></h3>
	<?php if (!empty($empresa['SistemaOperativo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($empresa['SistemaOperativo'] as $sistemaOperativo): ?>
		<tr>
			<td><?php echo $sistemaOperativo['id']; ?></td>
			<td><?php echo $sistemaOperativo['nombre']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sistema_operativos', 'action' => 'view', $sistemaOperativo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sistema_operativos', 'action' => 'edit', $sistemaOperativo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sistema_operativos', 'action' => 'delete', $sistemaOperativo['id']), null, __('Are you sure you want to delete # %s?', $sistemaOperativo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sistema Operativo'), array('controller' => 'sistema_operativos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
