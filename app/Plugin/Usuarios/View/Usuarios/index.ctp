<h2><?php echo __('Listado de Usuarios del Sistema'); ?></h2>

 <?php 
$fields = array(
        array(
            'title' => __('ID', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('Correo-e', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'email',
        ),
        array(
            'title' => __('Rol', true),
            'sort' => true,
            'model' => 'Rol',
            'field' => 'nombre',
        ),
        array(
            'title' => __('Activo', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'activo',
        	'format' => 'yesNoOption',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
       		 'class' => 'actions',
        	'class' => 'actions',
            'actions' => array(
               array(
               	   'link' => '/usuarios/edit/',
                   'params' => array(
                       array('model' => 'Usuario', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
                array(
               	   'link' => '/usuarios/delete/',
                   'params' => array(
                       array('model' => 'Usuario', 'field' => 'id'),
                   ),
                   'type' => 'delete',
               ),
            )
          )
    );  
    $options = array('pagPosition'=>true );
    
    echo $this->Grid->generate($fields, $usuarios, $options); 
?>


