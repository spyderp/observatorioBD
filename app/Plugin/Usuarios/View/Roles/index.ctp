<?php
     echo $this->Formato->titulo(__('Roles del Sistema', true)); 
     $fields = array(
        array(
            'title' => __('Id', true),
            'sort' => true,
            'model' => 'Rol',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('Nombre', true),
            'sort' => true,
            'model' => 'Rol',
            'field' => 'nombre',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
        	'class'=>'actions',
            'actions' => array(
               array(
               	   'link' => '/roles/edit/',
                   'params' => array(
                       array('model' => 'Rol', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
               array(
                   'link' => '/roles/delete/',
                   'params' => array(
                       array('model' => 'Rol', 'field' => 'id'),
                   ),
                   'type' => 'delete',
                   'constraint' => array(
                       'value_left' => array('model' => 'Rol', 'field' => 'id'),
                   	   'operator' => '>',
                   	   'value_right' => Rol::STATIC_ROLES,
                   ),
               ),
            )
          )
    );  
    $options = array(
    	'pagination'=>false,
        'links' => array(
            array('type' => 'add', 'title' => __('Agregar Rol', true), 'link' => '/roles/add'),
        ),
    );
    echo $this->Grid->generate($fields, $roles, $options);  
?>