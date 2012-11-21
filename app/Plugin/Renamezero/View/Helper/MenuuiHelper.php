<?php
App::uses('AppHelper', 'View/Helper');
class MenuuiHelper extends AppHelper {
	var $helpers = array('Html');
	private $_tree;
	public function __construct() {
        $this->_tree = simplexml_load_file(Configure::read('MenuPublic'));
    }
     public function buildMenu($rol=0) {
		$menus = $this->parse($this->_tree);
        $output = '';
        
        if (empty($menus)) return '';
        
        //Create the top level
        foreach ($menus as $menu) {
        	if($menu['private']== 'false'){
        	 $output .= '<li>' . $this->Html->link($menu['label'], array('controller' => $menu->controller, 'action' => $menu->action, 'plugin' =>  $menu->pluggin)) . '</li>';
        	}elseif(!empty($rol)){
        		if($rol[0]==2 AND $menu['private']=='true'){
        			$output .= '<li>' .$this->Html->link($menu['label'], array('controller' => $menu->controller, 'action' => $menu->action, 'plugin' => $menu->pluggin)) . '</li>';
        		}
      		}
        }
       
        if (!empty($output)) $output = '<ul>' . $output . '</ul>';
		return $output;
     }
     public function parse($menus) {
     	$valor=$this->params['controller'];
     	return $menus->$valor->menu;
     }
}