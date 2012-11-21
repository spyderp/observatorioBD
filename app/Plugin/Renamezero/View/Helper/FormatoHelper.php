<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Inflector', 'Core');
class FormatoHelper extends AppHelper {
	/**
	 * 
	 *
	 * @var $output: variable que guarda todo los datos html y ser impreso al finalizar la ejecuión de la clase
	 */
	var $helpers = array('Diticui.Jqueryui', 'Html', 'Usuarios.HtmlExtend', 'Paginator', 'Xml', 'Number');
	private $output ='';
	
	protected $_formats;
	
	/**
	 * 
	 * Guarda toda la data dentro de una variable para ser impresa al finalizar la función
	 * @param $htmlData: variable que contiene la información enviada para dar formato;
	 */
	function recarga($htmlData){
		$this->output.=$htmlData;
	}
	/**
	 * 
	 * dar formato a titulos
	 * @param $htmlData
	 */
	function titulo($htmlData, $class=''){
		if ($class != '') {
			$class = 'class="' . $class . '"';	
		}
		return "<h2 $class>".$htmlData."</h2>";
		
	}
	
	function titulo3($htmlData, $class = '') {
		if ($class != '') {
			$class = 'class="' . $class . '"';	
		}
		return "<h3 $class>".$htmlData."</h3>";
	}
	
	function titulo2($htmlData, $class=''){
		return '<h1 class="'.$class.'">'.$htmlData.'</h1>';
	}
	function parrafo($htmlData){
		return '<p>'.$htmlData.'</p>';
	}
	function show(){
		return $this->output;
	}
	function __destructor(){
		if($this->output!=''){
		echo $this->output;
		}
	}
	
	function yesNoOption($option = 1) {
	    return (intval($option) > 0) ? __('Sí', true) : __('No', true);
	}
	/*ESTADO DE  LA SOLICITUD SE PUEDE QUITAR SI SE USA ESTE MODULO EN OTRO LADO*/
	function getEstado($option = PENDIENTES, $title=false) {
		$estado=array(array('title'=>'stop.png', 'legend'=>'Invalido'),
						array('title'=>'control_repeat_blue.png', 'legend'=>'Pendiente de Asignar agente'), 
						array('title'=>'hourglass_go.png', 'legend'=>'En Progreso '), 
						array('title'=>'accept.png', 'legend'=>'Terminado'), 
						array('title'=>'folder_table.png', 'legend'=>'Cerrado / Archivado '), 
						array('title'=>'note.png', 'legend'=>'Reasignado'), 
						array('title'=>'atencion.png', 'legend'=>'En Atencion') );
	    if($title){
	    	$resultado=$this->Html->image($estado[$option]['title'], array('title'=>$estado[$option]['legend'])).' '.$estado[$option]['legend'];
	    }else{
	    	$resultado=$this->Html->image($estado[$option]['title'], array('title'=>$estado[$option]['legend']));
	    }
		return $resultado;
	}
	
	public function errorsToXml($validationErrors) {		
		$errors = '';
		if (!empty($validationErrors)) {
			$errors .= '<errors>';
			foreach ($validationErrors as $model => $fields) {
				foreach ($fields as $key => $message) {
					//$errors .= '<field id="'. $model . Inflector::camelize($key) .'">' . $message . '</field>';
					
					$errors .= $this->Xml->elem('field', array('id' => $this->_getFieldId($model, $key)), $message);
				}
			}
			$errors .= '</errors>';
		}
		return $errors;
	}
	
	private function _getFieldId($model, $key) {
		if (!strpos($key, '.')) {
			return $model . Inflector::camelize($key);
		}else {
			return substr($key, 0, strpos($key, '.')) . Inflector::camelize(substr($key, strpos($key, '.') + 1));
		}
	}
	
	public function nToBr($str, $replace = '<br />') {
		return str_replace("\n", $replace, str_replace('\n', $replace, $str));
	}

    public function estado($estado) {
        static $estados;
        if (is_null($estados)) {
            $estados = getEstados(true);    
        }
        if (!isset($estados[$estado])) {
            return null;
        }
        return $estados[$estado];
    }
    public function money($data){
    	return $this->Number->currency($data);
    }
    function dateMonth($month=1){
    	$meses=array(1=>'Enero', 2=>'Febrero', 3=>'Marzo', 4=>'Abril', 5=>'Mayo', 6=>'Junio', 7=>'Julio', 8=>'Agosto', 9=>'Septiembre', 10=>'Octubre', 11=>'Noviembre', 12=>'Diciembre');
    	return $meses[$month];
    }
	public function logBox($name=null){
	 	App::import('File');
	 	//$file=new File('var/www/shditic/app/webroot/files/Changelog-'.$name.'-cakephp.txt', false);
	 	$file=new File(WWW_ROOT.'/files/Changelog-'.$name.'-cakephp.txt', false);
	 	$file->open();
	 	echo $this->titulo2('Log de Cambios '.$name, 'logChange');
	 	echo $this->Html->div('logBox', utf8_encode($file->read()));
	 	$file->exists();
	 }
	 public function json($string){
	 	$array=json_decode($string, true);
	 	return $this->$array['formato']($array['option']);
	 }
	 public function imagen($option){
	 	return $this->Html->image($option['img'], array('alt'=>$option['alt'], 'title'=>$option['alt']));
	 }
}
