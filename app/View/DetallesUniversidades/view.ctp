<div class="detallesUniversidades view">
<h2><?php  echo __('Detalles Universidad'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detallesUniversidad['DetallesUniversidad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ano Egreso'); ?></dt>
		<dd>
			<?php echo h($detallesUniversidad['DetallesUniversidad']['ano_egreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ano Decersion'); ?></dt>
		<dd>
			<?php echo h($detallesUniversidad['DetallesUniversidad']['ano_decersion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($detallesUniversidad['DetallesUniversidad']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Universidad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detallesUniversidad['Universidad']['id'], array('controller' => 'universidades', 'action' => 'view', $detallesUniversidad['Universidad']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detalles Universidad'), array('action' => 'edit', $detallesUniversidad['DetallesUniversidad']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detalles Universidad'), array('action' => 'delete', $detallesUniversidad['DetallesUniversidad']['id']), null, __('Are you sure you want to delete # %s?', $detallesUniversidad['DetallesUniversidad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalles Universidades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalles Universidad'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Universidades'), array('controller' => 'universidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Universidad'), array('controller' => 'universidades', 'action' => 'add')); ?> </li>
	</ul>
</div>
