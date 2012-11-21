<?php
$this->Js->get('.click-tool-permission');
$this->Js->event('click', '
var valor=$(this).val();
var checked_status = this.checked; 
$("."+valor).each(function()
{
this.checked = checked_status; 
});
return true; 
');
	echo $this->Formato->titulo(__('Agregar Rol', true));
	echo $this->Form->create('Rol');
	echo $this->Form->input('id');
	echo $this->Form->input('nombre');
	echo $this->Permission->buildTablePermission($this->data);
	echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
	echo $this->Form->end();
?>