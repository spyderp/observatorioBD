<div class="usuarios form">
<?php echo $this->Form->create('Usuario', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Agregar  Usuario'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password', array('label'=>'Contraseña'));
		echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>'Repetir Contraseña'));
		echo $this->Form->input('activo');
	?>
	</fieldset>
<?php echo $this->FormExtend->checkboxes('Rol.id', array('label' => __('Roles', true), 'options' => $roles, 'values' => $rol_id));
echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
echo $this->Form->end(); ?>
</div>