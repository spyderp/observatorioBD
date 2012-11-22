

<?php echo $this->Form->create('Usuario', array('action' => 'login')) ?>
	<?php  echo $this->Form->input('email', array('label' => __('Correo', true))); ?>
	<hr>
	<?php echo $this->Form->input('password', array('label' => __('Contraseña', true))); ?>
	<hr>
	<?php 
	echo $this->Form->submit('Enviar', array('div'=>false));
	echo $this->form->end();
	?>

	 


