<?php

class ArchivosController extends RenamezeroAppController {
    var $name = 'Archivos';
    var $helpers = array('Diticui.ArchivoAdjunto');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('descargar');
    }
    
    public function descargar($id = null, $key = null) {
    	if (is_null($id) || is_null($key)) {
    		$this->cakeError('404', array(array('code' => '404', 'name' => 'No se encuetra este archivo', 'message' => 'El archivo solicitado no existe')));
    	}
    	if ($this->Session->read($key) != md5($id + Configure::read('Security.cipherSeed'))) {
    		$this->cakeError('404', array(array('code' => '404', 'name' => 'No se encuetra este archivo', 'message' => 'El archivo solicitado no existe')));
    	}
    	
    	$data = $this->Archivo->read(null, Sanitize::clean($id));
    	if ($data == false) {
    		$this->cakeError('404', array(array('code' => '404', 'name' => 'No se encuetra este archivo', 'message' => 'El archivo solicitado no existe')));
    	}
    	$this->view = 'Media';
    	Configure::write('debug', 0);
    	$params = array(
    		'id' => $data['Archivo']['codificado'],
    		'name' => rtrim($data['Archivo']['nombre'], '.' . $data['Archivo']['extension']),
    		'extension' => $data['Archivo']['extension'],
    		'mimeType' => array($data['Archivo']['extension'] => $data['Archivo']['tipo']),
    		'path' => Configure::read('FilePathRepository') . DS,
    		'download' => true,
    	);
    	header("Content-type: " . $params['mimeType']);
    	$this->set($params);
    }
    
}