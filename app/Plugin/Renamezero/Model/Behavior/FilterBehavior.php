<?php
/**
*
* @package diticui
* @subpackage behaviors
* @author Ricardo Haynes
* @copyright UTP
*/
App::uses('SessionComponent','Core');
App::import('Diticui.Filter', 'Helper');
class FilterBehavior extends ModelBehavior {    
    /**
     * Funcion para construir el filtro
     */
    public function Querysetup($modelo, $parametros){
        if(isset($_REQUEST['data'])){
            return $this->_getConditions($parametros->data[$modelo->name], $modelo);
        }else{
            unset($parametros->params['named']['page']);
			unset($parametros->params['named']['sort']);
			unset($parametros->params['named']['direction']);
			return $this->_getConditions($parametros->params['named'], $modelo);
        }
    }
	
	private function _getConditions($fields, $modelo) {
		$condicion = array();       
        $operador = null;
		foreach($fields as $indice => $valor){
                $campo    = split('-',$indice);
                if(count($campo) > 1){                    
                    $operador = $valor;
                    continue;
                }
                $getfield = $indice;
                    /*if(($campo[1] != 'operator') && ($campo[1] != '')){
                        $getfield .= '_'.$campo[1];
                    }*/
                    if($fields[$getfield] != ''){
                        switch($operador){
                            case 1:
                                $condicion[] = array($modelo->name.'.'.$getfield => $fields[$getfield]);
                                break;
                            case 2:
                                $condicion[] = array($modelo->name.'.'.$getfield.' LIKE ' => '%'.$fields[$getfield].'%');
                                break;
                           case 3:
                                $condicion[] = array($modelo->name.'.'.$getfield.' BETWEEN ? AND ?' => array($fields[$getfield],$fields[$getfield.'1']));
                                break;
                            case 4:
                                $condicion[] = array($modelo->name.'.'.$getfield.' > ' => $fields[$getfield]);
                                break;
                            case 5:
                                $condicion[] = array($modelo->name.'.'.$getfield.' < ' => $fields[$getfield]);
                                break;         
                            default:
		                        if($valor != '' && (!array_key_exists($indice.'_operator' , $fields))){
		                            $condicion[] = array($modelo->name.'.'.$indice => $fields[$indice]);
		                        }                   
                        }
                        $operador = null;
                    }
              /*  }else{
                   //Vefiricar si no tiene operador y si no esta vacio
                   if(! ereg('1',$indice)){
                        if($valor != '' && (!array_key_exists($indice.'_operator' , $fields))){
                            $condicion[] = array($modelo->name.'.'.$indice => $fields[$indice]);
                        }
                   }
                   
                }*/
            }            
            return $condicion;
	}
}