<?php
App::uses('Usuario.UsuariosAppController', 'Controller');
App::import('Utility', 'Sanitize');
class RolesController extends UsuariosAppController {
    public $helpers = array('Usuarios.Permission', 'Renamezero.FormExtend', 'Renamezero.Formato');
	/*function beforeFilter() {
   		$this->Auth->allow('add', 'index', 'edit');
   		parent::beforeFilter();
	}*/
    /**
     * 
     * Modificación en paginación
     * @var array
     */
    var $paginate = array(
    	'Rol' => array(
        	'fields' => array(
            'Rol.id', 'Rol.nombre',
        ),
        'recursive' => 0,
        'order' => array('Rol.id' => 'ASC'),
    ));
    

    /**
     * 
     * Muestra listado de roles
     */
    public function index() {
    	$this->set('roles', $this->paginate('Rol'));
    }
    
    /**
     * 
     * Agrega un rol al sistema. Lleva a cabo la validación del mismo.
     */
    public function add() {
        if(!empty($this->request->data)) {
            if($this->Rol->saveAll($this->request->data)) {
                $this->_setMessage(__('El rol se ha guardado satisfactoriamente', true));
                $this->log(sprintf(__('Rol con id %s creado por %s', true), $this->request->data['Rol']['id'], $this->Auth->user('nombre_usuario')), 'info');
                $this->redirect(array('action' => 'index'));
            }elseif ($this->Rol->getInvalidPrivileges()) {
            	$this->_setMessage(__('Debe escoger al menos un privilegio', true), self::ERROR);
            }else {
            	$this->_setMessage(
				    __('Existe un error al guardar el rol. Verifique los datos introducidos', true),
				   self::ERROR);
            }
        }
        $this->request->data['Rol']['permissions'] = $this->Rol->setPrivileges();
    }
    
    /**
     * 
     * Edita un rol del sistema
     * @param integer $id
     */
    public function edit($id = null) {
        if (!$id) {
            $this->_setMessage(__('El rol no existe', true), self::ERROR);
            $this->log(sprintf(__('Error tratando de editar el rol con id %s, %s', true), $id, $this->Auth->user('nombre_usuario')), 'error');
            $this->redirect(array('action' => 'index'));
        }
        if(!empty($this->request->data)) {
            if($this->Rol->saveAll($this->request->data)) {
                $this->log(sprintf(__('Rol con id %s modificado por %s', true), $this->request->data['Rol']['id'], $this->Auth->user('nombre_usuario')), 'info');
                $this->_setMessage(__('El rol ha sido modificado satisfactoriamente', true));
                $this->redirect(array('action' => 'index'));
            }elseif ($this->Rol->getInvalidPrivileges()) {
            	$this->_setMessage(__('Debe escoger al menos un privilegio', true), self::ERROR);
            }else {
                $this->_setMessage(
				    __('Existe un error al guardar el rol. Verifique los datos introducidos', true),
				   self::ERROR);
            }
        }
        if (empty($this->request->data)) {
        	echo Sanitize::paranoid($id);
            $this->request->data = $this->Rol->read(null, $id);
        }
        $this->request->data['Rol']['permissions'] = $this->Rol->setPrivileges();
    }
     
    /**
     * 
     * Elimina un rol del sistema.
     * @param $id
     */
    public function delete($id = null) {
        if (!$id) {
            $this->_setMessage(__('El rol no existe', true));
            $this->log(sprintf(__('Error tratando de eliminar el rol con id %s, %s', true), $id, $this->Auth->user('nombre_usuario')), 'error');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Rol->delete(Sanitize::clean($id), true)) {
            $this->_setMessage(__('El rol ha sido eliminado satisfactoriamente', true));
            $this->log(sprintf(__('Rol con id %s eliminado por %s', true), $id, $this->Auth->user('nombre_usuario')), 'info');
            $this->redirect(array('action' => 'index'));
        }
        else {
            $this->_setMessage(__('Ocurrió un error al eliminar el rol. Puede ser que este rol tenga usuarios asignados', true), self::ERROR);
            $this->redirect(array('action' => 'index'));
        }
    }
}