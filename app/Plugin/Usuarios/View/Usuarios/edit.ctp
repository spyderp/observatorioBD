<h2><?php echo __('Editar Usuario'); ?></h2>
<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
	<fieldset>
		<legend><?php echo __('Datos a editar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email', array('disable'=>true));
		echo $this->Form->input('password', array('label'=>'Contraseña'));
		echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>'Repetir Contraseña'));
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php
	echo $this->FormExtend->checkboxes('Rol.id', array('label' => __('Roles', true), 'options' => $roles, 'values' => $rol_id));
echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
echo $this->Form->end(); ?>
</div>

