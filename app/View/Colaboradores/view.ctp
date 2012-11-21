<div class="colaboradores view">
<h2><?php  echo __('Colaborador'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($colaborador['Colaborador']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($colaborador['Colaborador']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($colaborador['Colaborador']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa'); ?></dt>
		<dd>
			<?php echo $this->Html->link($colaborador['Empresa']['id'], array('controller' => 'empresas', 'action' => 'view', $colaborador['Empresa']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Colaborador'), array('action' => 'edit', $colaborador['Colaborador']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Colaborador'), array('action' => 'delete', $colaborador['Colaborador']['id']), null, __('Are you sure you want to delete # %s?', $colaborador['Colaborador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Colaboradores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Colaborador'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Empresas'), array('controller' => 'empresas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Empresa'), array('controller' => 'empresas', 'action' => 'add')); ?> </li>
	</ul>
</div>
