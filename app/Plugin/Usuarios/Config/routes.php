<?php
	Router::connect('/accesoSistema', array( 'plugin'=>'usuarios', 'controller' => 'usuarios', 'action' => 'login'));
	Router::connect('/activarCuenta/*', array( 'plugin'=>'usuarios', 'controller' => 'usuarios', 'action' => 'activar'));
	Router::connect('/usuarios/:action', array( 'plugin'=>'usuarios', 'controller' => 'usuarios'));
	Router::connect('/roles', array( 'plugin'=>'usuarios', 'controller' => 'roles', 'action'=>'index'));
	Router::connect('/roles/:action', array( 'plugin'=>'usuarios', 'controller' => 'roles'));
	
?>