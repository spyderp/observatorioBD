<div class="titulos view">
<h2><?php  echo __('Titulo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($titulo['Titulo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($titulo['Titulo']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($titulo['Titulo']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recursos Humano'); ?></dt>
		<dd>
			<?php echo $this->Html->link($titulo['RecursosHumano']['id'], array('controller' => 'recursos_humanos', 'action' => 'view', $titulo['RecursosHumano']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Carrera'); ?></dt>
		<dd>
			<?php echo $this->Html->link($titulo['Carrera']['id'], array('controller' => 'carreras', 'action' => 'view', $titulo['Carrera']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Titulo'), array('action' => 'edit', $titulo['Titulo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Titulo'), array('action' => 'delete', $titulo['Titulo']['id']), null, __('Are you sure you want to delete # %s?', $titulo['Titulo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Titulos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Titulo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recursos Humanos'), array('controller' => 'recursos_humanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recursos Humano'), array('controller' => 'recursos_humanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
	</ul>
</div>
