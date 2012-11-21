<?php
App::uses('AppHelper', 'View/Helper');
App::import('Model', 'Usuarios.Rol');
class HtmlExtendHelper extends AppHelper {
    var $helpers = array('Html', 'Session');
    protected $_links;
    private $_actionsAllowed = array('login', 'logout', 'descargar');
    
    
    function link($title, $url = null, $options = array(), $confirmMessage = false) {
        static $privileges;
        $baseUrl = (is_null($url)) ? $title : $url;
        if (is_string($baseUrl)) {
            $baseUrl = Router::parse($url);
        }
        //Usuario administrador
        if (is_null($privileges)) {
            $privileges = array();
            $roles = $this->_View->viewVars['rolesUsuario'];
            if (is_string($roles)) {
                $roles = explode(',', $roles);
            }elseif (!is_array($roles)) {
                return '';
            }
            foreach ($roles as $rol) {
                $tmp = Rol::getPrivilegesByRol($rol);
                if (!empty($tmp)) {
                    $privileges = array_merge($privileges, $tmp);    
                }
            }    
        }
        if (in_array($baseUrl['controller'] . '/' . $baseUrl['action'], $privileges)) {
            return $this->Html->link($title, $url, $options, $confirmMessage);    
        }
        
        return '';
    }
    function checkRol($url){
    	 static $privileges;
    	 $baseUrl = Router::parse($url);
    	 if (is_null($privileges)) {
            $privileges = array();
            $roles = $this->_View->viewVars['rolesUsuario'];
            if (is_string($roles)) {
                $roles = explode(',', $roles);
            }elseif (!is_array($roles)) {
                return '';
            }
            foreach ($roles as $rol) {
                $tmp = Rol::getPrivilegesByRol($rol);
                if (!empty($tmp)) {
                    $privileges = array_merge($privileges, $tmp);    
                }
            }    
        }
    	if (!in_array($baseUrl['controller'] . '/' . $baseUrl['action'], $privileges)) {
            return false;
        }
        return true;
    }
}