

<?php echo $this->Form->create('Usuario', array('action' => 'login')) ?>
	<?php  echo $this->Form->input('email', array('label' => __('Correo', true))); ?>
	<hr>
	<?php echo $this->Form->input('password', array('label' => __('Contraseña', true))); ?>
	<hr>
	<?php 
	echo $this->Form->submit('Enviar', array('div'=>false));
	echo $this->Html->link(__('¿Olvidó su contraseña?', true), array('plugin' => 'password_recovery', 'controller' => 'passwordrecoverys', 'action' => 'reset'), array('class'=>'newPassword'));
	echo $this->form->end();
	?>

	 


