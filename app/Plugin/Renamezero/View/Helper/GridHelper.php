<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Router', 'Core');
App::import('Utility', 'Sanitize');
App::uses('Security', 'Utility');
class GridHelper extends AppHelper {

    var $helpers = array(
        'Html', 'Renamezero.HtmlExtend',
        'Paginator', 'Renamezero.Formato',
        'Renamezero.Archivo', 'Text',
    );
	private $output ='';
	const ACTION_SEPARATOR = ' ';
	const LINK_SEPARATOR = ' ';
	private $_operatorsSupported = array(
		'==', '>', '<', '>=', '<=', '===',
	);

	protected $_formats;

	/**
	 *
	 * Genera una tabla html al estilo clasico con headers y rows
	 * @param array $headers
	 * @param array $rows
	 * @param unknown_type $options
	 */
	public function classicGrid($headers, $rows, $options = array()) {
		$options = $this->_defaultOptions($options);
		$class = "sort";
		if (isset($options['class']) && $options['class'] != '') {
			$class .= ' ' . $options['class'];
		}
		$id = '';
		if (isset($options['class'])) {
			$class .= ' ' . $options['class'];
		}
		if (isset($options['id'])) {
			$id = " id=\"{$options['id']}\"";
		}
		$this->output = $this->getLinks($options);
		$this->output .= '<table width="98%" class="' . $class . '" ' . $id . '>';
		$this->output .= $this->getHeaders($headers, true);
		$this->output .= $this->getRows($rows);
		$this->output .= '</table>';
		if (isset($options['pagination']) && $options['pagination'] == true) {
			$this->output .= $this->getPagination();
		}
		return $this->output;
	}

	/**
	 *
	 * Genera un tabla html
	 * @param array $fields
	 * 			Arreglo que contiene cada uno de los campos
	 * 			que se van a mostrar en el grid. Puede tener
	 * 			el siguiente formato para campos sencillos:
	 * 			<ul>
	 * 				<li>title (string): título del header</li>
	 * 				<li>model (string): modelo buscado en el arreglo de data</li>
	 * 				<li>field (string): campo buscado en el arreglo de data</li>
	 *				<li>format (string): formato para mostrar el campo. Puede ser fecha, moneda.</li>
	 *				<li>sort (boolean): indica si se debe ordernar por el campo o no. true o false.</li>
	 * 				<li>class (string): clase que se va a colocar en el td del campo</li>
	 * 			</ul>
	 * 			Ejemplo:
	 * 					<pre>array(
     *                      'title'=>'#',
     *                      'model'=>'Provincia',
     *                      'class'=>'idtd',
     *                      'field'=>'id',
     *                      'format'=>'',
     *                      'sort' => true,
     *                  ),
     *                  array(
     *                      'title'=>'Nombre',
     *                      'model'=>'Provincia',
     *                      'class'=>'',
     *                      'field'=>'nombre',
     *                      'format'=>'',
     *                  	 'sort' => true,
     *                  ), </pre>
	 * 			Formato para enlaces de acciones:
	 * 			<ul>
	 * 				<li>title (string): título del header</li>
	 * 				<li>type (string): debe ser actions</li>
	 * 				<li>actions (array): contiene las acciones que
	 * 					se van a colocar dentro del campo td
	 * 					<ul>
	 * 						<li>link (mixed): puede ser un array o una cadena.
	 * 							Es el enlace al que se va a redirigir.
	 * 						</li>
	 * 						<li>params (array): es un array con los indices "model"
	 * 							indicando el model a buscar en la fila (data) y otro
	 * 							campo "field".</li>
	 * 						<li>type: indica si es edit, delete, view o block. utilizar other
	 * 							para otro tipo de campo.
	 * 						</li>
	 * 						<li>constraint: restricción para no mostrar el link</li>
	 * 					</ul>
	 * 				</li>
	 * 			</ul>
	 * 			Ejemplo:
	 * 					<pre> array(
     *                          'title' => __('Acciones', true),
     *                          'sort' => false,
     *                          'type' => 'actions',
     *                          'actions' => array(
     *                              array(
     *                              	'link' => '/administracion/provincias/edit/',
     *                                  'params' => array(
     *                                   	array('model' => 'Provincia', 'field' => 'id'),
     *                                  ),
     *                                  'type' => 'edit',
     *                              ),
     *                              array(
     *                                 	'link' => '/usuarios/block/',
     *                                  'params' => array(
     *                                       	array('model' => 'Usuario', 'field' => 'id'),
     *                               	 ),
     *                                   'type' => 'block',
     *                                   'constraint' => array(
     *                                        'value_left' => array('model' => 'Usuario', 'field' => 'estado'),
     *                                        'operator' => '==',
     *                                        'value_right' => 1,
     *                                   ),
     *                               ),
     *                               array(
     *                                  'link' => '/administracion/provincias/delete/',
     *                                  'params' => array(
     *                                      array('model' => 'Provincia', 'field' => 'id'),
     *                                  ),
     *                                  'type' => 'delete',
     *                              ),
     *                          ),
     *                      )   </pre>
	 *
	 * @param array $dbData
	 * @param array $options
	 * @return string
	 */
    function generate($fields, $dbData, $options = array()){
		$options = $this->_defaultOptions($options);
    	$class = "sort";
		if (isset($options['class']) && $options['class'] != '') {
			$class .= ' ' . $options['class'];
		}
	    $this->output = $this->getLinks($options);
   		if ($options['pagination']&& ($options['pagPosition']=='top' || $options['pagPosition']=='double')) {
	 	    $this->output .= $this->getPagination();
	 	}
	    $this->output .= '<table width="98%" class="' . $class . '">';
	 	$this->output .= $this->getHeaders($fields);
	 	$row = 0;
	 	if (is_array($dbData) && !empty($dbData)) {
	 		foreach ($dbData as $dbrow):
		 		$rowclass = ($row > 0) ? 'even' : 'odd';
		 		if (isset($options['rowClass'])) {
		 			$rowclass .= $this->getRowClasses($options['rowClass'], $dbrow);
		 		}
		 		$row = !$row;
		 	    $this->output.='<tr class="' . $rowclass . '">';
		 		foreach ($fields as $optiontd):
		 			$clase="";
	     			if(isset($optiontd['class']) && $optiontd['class']!="") {
	    	 				$clase='class="'.$optiontd['class'].'"';
	                }
	                $width="";
	 				if(isset($optiontd['width']) && $optiontd['width']!="") {
	    	 				$width='width="'.$optiontd['width'].'"';
	                }
	 				$align="";
	 				if(isset($optiontd['align']) && $optiontd['align']!="") {
	    	 				$align='align="'.$optiontd['align'].'"';
	                }
	 				$valign="";
	 				if(isset($optiontd['valign']) && $optiontd['valign']!="") {
	    	 				$valign='valign="'.$optiontd['valign'].'"';
	                }
		 			if (isset($optiontd['type']) && $optiontd['type'] == 'actions') {
		 			    $this->output .= "<td $clase $width $align $valign>" . $this->getActions($optiontd, $dbrow) . "</td>";
		 			}else {
	    	 			if(isset($optiontd['format']) && is_string($optiontd['format'])):
	    	 				if($optiontd['model']!=false){
	    	 					$valor=$this->Formato->$optiontd['format']($dbrow[$optiontd['model']][$optiontd['field']]);
	    	 				}else{
	    	 					$valor=$this->Formato->$optiontd['format']($dbrow[$optiontd['field']]);
	    	 				}
                        elseif (isset($optiontd['format']) && is_array($optiontd['format'])):
                            $value = ($optiontd['model']!=false) ? $dbrow[$optiontd['model']][$optiontd['field']] : $dbrow[$optiontd['field']];
                            $optiontd['format']['arguments'] = array_merge(array($value), $optiontd['format']['arguments']);
                            $valor = call_user_func_array(array($this->$optiontd['format']['class'], $optiontd['format']['method']),
                                     $optiontd['format']['arguments']);
	    	 			else:
	    	 				if($optiontd['model']!=false){
	    	 					$valor=$dbrow[$optiontd['model']][$optiontd['field']];
	    	 				}else{
	    	 					$valor=$dbrow[$optiontd['field']];
	    	 				}
	    	 			endif;
	    	 			$this->output.="<td $clase $width $align $valign>".$valor."</td>";
		 			}
		 		endforeach;
		 		$this->output.='</tr>';
		 	endforeach;
	 	}else if (isset($options['emptyMessage'])) {
	 		$this->output .= '<tr><td align="center" colspan="' . count($fields) . '"><b>' . $options['emptyMessage'] . '</b></td></tr>';
	 	}
	 	$this->output .='</tbody> </table>';
	 	if ($options['pagination']&& ($options['pagPosition']=='botton' || $options['pagPosition']=='double')) {
	 	    $this->output .= $this->getPagination();
	 	}
		echo $this->output;
	}
	function generate2($fields, $dbData, $options = array()){
		$options = $this->_defaultOptions($options);
    	$class = "sort";
		if (isset($options['class']) && $options['class'] != '') {
			$class .= ' ' . $options['class'];
		}
	    $this->output = $this->getLinks($options);
	    $this->output .= '<table width="98%" class="' . $class . '">';
	 	$this->output .= $this->getHeaders($fields);
	 	$row = 0;
	 	if (is_array($dbData)) {
	 		foreach ($dbData as $dbrow):
		 		$rowclass = ($row > 0) ? 'even' : 'odd';
		 		$row = !$row;
		 	    $this->output.='<tr class="' . $rowclass . '">';
		 		foreach ($fields as $optiontd):
		 			$clase="";
	     			if(isset($optiontd['class']) && $optiontd['class']!="") {
	    	 				$clase='class="'.$optiontd['class'].'"';
	                }
		 			if (isset($optiontd['type']) && $optiontd['type'] == 'actions') {
		 			    $this->output .= '<td ' . $clase .'>' . $this->getActions($optiontd, $dbrow) . '</td>';
		 			}else {
	    	 			if(isset($optiontd['format']) && is_string($optiontd['format'])):
	    	 				if($optiontd['model']!=false){
	    	 					$valor=$this->Formato->$optiontd['format']($dbrow[$optiontd['model']][$optiontd['field']]);
	    	 				}else{
	    	 					$valor=$this->Formato->$optiontd['format']($dbrow[$optiontd['field']]);
	    	 				}
	    	 			elseif (isset($optiontd['format']) && is_array($optiontd['format'])):
                            $value = ($optiontd['model']!=false) ? $dbrow[$optiontd['model']][$optiontd['field']] : $dbrow[$optiontd['field']];
                            $optiontd['format']['arguments'] = array_merge(array($value), $optiontd['format']['arguments']);
                            $valor = call_user_func_array(array($this->$optiontd['format']['class'], $optiontd['format']['method']),
                                     $optiontd['format']['arguments']);
	    	 			else:
	    	 				if($optiontd['model']!=false){
	    	 					$valor=$dbrow[$optiontd['model']][$optiontd['field']];
	    	 				}else{
	    	 					$valor=$dbrow[$optiontd['field']];
	    	 				}
	    	 			endif;
	    	 			$this->output.="<td $clase >".$valor."</td>";
		 			}
		 		endforeach;
		 		$this->output.='</tr>';
		 	endforeach;
	 	}
	 	$this->output .='</tbody> </table>';
	 	if ($options['pagination']) {
	 	    $this->output .= $this->getPagination();
	 	}
		return $this->output;
	}

	function getRowClasses($rowClassDefinition, $row) {
		$classes = '';
		if (is_array($rowClassDefinition['constraints'])) {
			foreach ($rowClassDefinition['constraints'] as $constraint) {
				if ($this->_checkConstraintAction(array('constraint' => $constraint), $row)) {
					$classes .= ' ' . $constraint['class'];
				}
			}
		}
		return $classes;
	}

	/**
	 *
	 * Retorna los headers de la tabla
	 * @param array $fields
	 * @return string
	 */
	function getHeaders($fields, $classic = false) {
        $output = '<thead><tr>';
	    foreach ($fields as $titleth):
            if (is_array($titleth)) {
	 		    $title = (isset($titleth['sort']) && $titleth['sort'] == 'true') ? $this->_getSort($titleth) : $titleth['title'];
	 		    $class = (isset($titleth['class'])) ? "class=\"{$titleth['class']}\"" : '';
	 			$style = (isset($titleth['style'])) ? "style=\"{$titleth['style']}\"" : '';
	 			$output .= '<th ' . $class .' ' . $style . '>' . $title . '</th>';
	 		}else {
	 			$output .= '<th>' . $titleth . '</th>';
	 		}
	 	endforeach;
	 	$output .= '</tr></thead>';
	 	return $output;
	}

	protected function _getSort($field) {
		return $this->Paginator->sort( $field['model'] . '.' . $field['field'], $field['title']);
	}

	/**
	 *
	 * Retorna todas las filaas
	 * @param array $rows
	 */
	function getRows($rows) {
		$output = '<tbody>';
		$rowClass = 0;
		foreach ($rows as $row) {
			$class = ($rowClass > 0) ? 'even' : 'odd';
			$output .= '<tr class="' . $class . '">';
			$rowClass = !$rowClass;
			foreach ($row as $field) {
				if (is_array($field)) {
					$class = (isset($field['class'])) ? "class=\"{$field['class']}\"" : '';
	 				$style = (isset($field['style'])) ? "style=\"{$field['style']}\"" : '';
	 				$output .= '<td ' . $class .' ' . $style . '>' . $field['value'] . '</td>';
				}else {
					$output .= '<td>' . $field . '</td>';
				}
			}
			$output .= '</tr>';
		}
		$output .= '</tbody>';
		return $output;
	}

	/**
	 *
	 * Retorna enlaces que saldrán arriba de la tabla
	 * @param array $options
	 * @return string
	 */
	function getLinks($options = array()) {
        $output = '';
	    if (!empty($options['links'])) {
	    	$separator = (isset($options['links']['separator'])) ? $options['links']['separator'] : self::LINK_SEPARATOR;
	    	unset($options['links']['separator']);
	        foreach ($options['links'] as $link) {
	            $link['type'] = (isset($link['type'])) ? $link['type'] : '';
	        	switch ($link['type']) {
	                case 'add':
	                    $output .= $this->HtmlExtend->link($link['title'],
	                               $link['link'],
	                                array('class'=>'link-add', 'title'=>__('Agregar nuevo registro',true)));
	                	break;
	                case 'search':
	                    $output .= $this->HtmlExtend->link($link['title'],
	                               $link['link'],
	                                array('class'=>'link-search', 'title'=>__('Realizar una busqueda',true)));
	                    break;
	                default:
	                	$output .= $separator . $this->HtmlExtend->link($link['title'], $link['link'], $link['options']);
	            }
	        }
	    }
	    if ($output != '') {
	        $output = '<div id="tblbuttonbox" style="width:98%;"><div id="buttom">' .
	                    ltrim($output, $separator) . '</div></div><br /><br />';
	    }
	    return $output;
	}

	/**
	 *
	 * Retorna las acciones que puede tener el grid
	 * @param array $field
	 * @param array $row
	 * @return string
	 */
	function getActions($field = array(), $row) {
	    $output = '';
	    if (!is_array($field['actions'])) return;
	    $separator = (isset($field['actions']['separator'])) ? $field['actions']['separator'] : self::ACTION_SEPARATOR;
	    unset($field['actions']['separator']);
	    foreach ($field['actions'] as $action) {
	        //Verificar si existe alguna restricción para mostrar el enlace

	    	if (!$this->_checkConstraintAction($action, $row)) continue;

	        if (is_string($action['link'])) {
	          $link = Router::parse($action['link']);
	        }

	        $title = (isset($action['title'])) ? $action['title'] : '';
	        if (isset($action['params'])) {
	            foreach ($action['params'] as $param) {
	                if($param['model']!=false && $param['model']!='param'){
	                		if(isset($row[$param['model']][$param['field']])){
								if(isset($action['encript'])){
									$link[] =base64_encode(Security::cipher($row[$param['model']][$param['field']], Configure::read('Security.cipherSeed')));
								}else{
	                				$link[] = $row[$param['model']][$param['field']];
								}
	                		}
	                }elseif($param['model']=='param'){
	                	$link[] = $param['field'];
	                }else{
	                	$link[] = $row[$param['field']];
	                }

	            }
	        }
	        if (isset($action['url'])) {
	        	$link['?'] = $this->parseUrl($action['url'], $row);
	        	if (isset($link['url']) && $link['url']['ext'] != 'html') {
	        		$link['action'] .= '.' . $link['url']['ext'];
	        	}
	        }
	        unset($link['url']);
	        $message = (isset($action['type']) && $action['type'] == 'delete') ? __('Desea eliminar este registro', true) : '';
	        $class = '';
	        $options = array();
	    	$alt = '';
	        if (isset($action['type']) && $action['type'] != 'other') {
	            switch ($action['type']) {
	                case 'edit':
	                    $class = 'link-tbl edit';
	                    $title = '';
	                     $alt=__('Edición de datos',true);
	                    break;
	                case 'delete':
	                    $class = 'link-tbl del';
	                    $title = '';
	                     $alt=__('Borrar datos',true);
	                    break;
	                case 'view':
	                    $class = 'link-tbl view';
	                    $title = '';
	                     $alt=__('Ver datos',true);
	                    break;
	                case 'block':
	                    $class = 'link-tbl block';
	                    $title = '';
	                    $alt=__('Bloquear datos',true);
	                    break;
	                case 'archivo':
	                	$options['class'] = $action['class'];
						$options['title'] = (isset($action['alt'])) ? $action['alt'] : '';
	            		$options['alt'] = (isset($action['alt'])) ? $action['alt'] : '';
	            		if(isset($row[$action['params'][0]['model']][$action['params'][0]['field']])){
	            			if($action['params'][0]['model']!=false){
	                			$output .= $separator . $this->Archivo->link($row[$action['params'][0]['model']][$action['params'][0]['field']], $title, $options);
	            			}else{
	            				$output .= $separator . $this->Archivo->link($row[$action['params'][0]['field']], $title, $options);
	            			}
	            		}
	                	continue 2;
	                	break;
	            }
	        }else {
	            $class = isset($action['class']) ? 'link-tbl '.$action['class'] : '';
				$title = (isset($action['title'])) ? $action['title'] : '';
	            $alt = (isset($action['alt'])) ? $action['alt'] : '';
	            $message = (isset($action['message'])) ? $action['message'] : $message;
	        }
	        $options['class'] = $class;
			$options['title'] =  $alt;
	        $options['alt'] = $alt;
	        $options['target'] = (isset($action['target'])) ? $action['target'] : '_self';
	        $linkObject = (isset($action['public']) && $action['public'] == true) ? 'Html' : 'HtmlExtend';
	        $output .= $separator . $this->$linkObject->link($title, $link, $options, $message);
	    }

	    return ltrim($output, $separator);
	}

	public function parseUrl($url, $row) {
		if (!is_array($url)) return '';
		$result = array();
		foreach ($url as $key => $field) {
			if (is_array($field)) {
                $value = $row[$field['model']][$field['field']];
			}else {
				$value = $field;
			}
			$result[$key] = $value;
		}
		return $result;
	}

	private function _checkConstraintAction($action, $row) {
	    if (!isset($action['constraint'])) return true;
	    if (is_array($action['constraint']['value_left'])) {
	        $valueLeft = $row[$action['constraint']['value_left']['model']][$action['constraint']['value_left']['field']];
	    }else {
	        $valueLeft = $action['constraint']['value_left'];
	    }
	    if (is_array($action['constraint']['value_right'])) {
	        $valueRight = $row[$action['constraint']['value_right']['model']][$action['constraint']['value_right']['field']];
	    }else {
	        $valueRight = $action['constraint']['value_right'];
	    }
	    //Verificar si los valores tienen data
        $result = null;
	    if (is_null($valueLeft) || is_null($valueRight) || !in_array($action['constraint']['operator'], $this->_operatorsSupported)) return true;
	    eval('$result = (boolean) (' . Sanitize::clean($valueLeft) . $action['constraint']['operator'] . Sanitize::clean($valueRight) . ');');
	    return $result;
	}

	function _defaultOptions($options) {
	    return array_merge(array('links' => array(), 'pagination' => true, 'sort' => false), $options);
	}

	/**
	 *
	 * Retorna un bloque de paginacion
	 * @return string
	 */
	function getPagination() {
	    $output = '<div id="pagbox" style="width: 98%"><div id="counter">';
		$output.= $this->Paginator->counter(array('format' => '  %page% de  %pages% / Total de resultados: %count% '));
		$output.= '</div><div id="paginator">';
		$output.= $this->Paginator->first('', array('class' => 'first'));
		$output.= $this->Paginator->prev('', null, null, array('class' => 'link-pag-prev'));
		$output.= $this->Paginator->numbers(array('separator'=>null));
		$output.= $this->Paginator->next('', null, null, array('class' => 'link-pag-next'));
		$output.= $this->Paginator->last('', array('class' => 'last'));
		$output.= '</div></div><br />';
		return $output;
	}
}

