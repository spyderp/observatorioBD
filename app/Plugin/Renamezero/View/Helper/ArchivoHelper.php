<?php
App::uses('AppHelper', 'View/Helper');
App::uses('SessionComponent', 'Core');
class ArchivoHelper extends AppHelper {

	var $helpers = array('Html', 'Form');
	var $SessionComponent = null;
	private $_fileMaxSize = null;

	public function link($id, $title = '', $options = array()) {
		$key = uniqid();
		SessionComponent::write($key, md5($id + Configure::read('Security.cipherSeed')));
		return $this->Html->link($title, '/archivos/descargar/' . $id . '/' . $key, $options);
	}
	public function input($label = 'Archivo', $options = array()) {
		$options['label'] = $label;
		$options['after'] = '<div>' . __("Tamaño máximo permitido por archivo: ", true) . $this->bytes2size($this->_getFileMaxSize());
		$options['after'] .= ". " . __('Extensiones permitidas: ', true) . implode(',', Configure::read('FileExtensionWhiteList')) . '</div>';
		$options['type'] = 'file';
		$options['div'] = 'input file required';
		return $this->Form->input('Archivo.archivo', $options);
	}

	private function _getFileMaxSize() {
		if (!is_null($this->_fileMaxSize)) {
			return $this->_fileMaxSize;
		}
		return ($this->_fileMaxSize = min($this->filesize2bytes(ini_get('upload_max_filesize')), $this->filesize2bytes(ini_get('post_max_size')), $this->filesize2bytes(Configure::read('FileMaxSize'))));
	}

	/**
	 * Converts human readable file size (e.g. 10 MB, 200.20 GB) into bytes.
	 *
	 * @param string $str
	 * @return int the result is in bytes
	 * @author Svetoslav Marinov
	 * @author http://slavi.biz
	 */
	function filesize2bytes($str) {
		$bytes = 0;

		$bytes_array = array(
        'B' => 1,
        'KB' => 1024,
        'MB' => 1024 * 1024,
    	'M' => 1024 * 1024,
        'GB' => 1024 * 1024 * 1024,
    	'G' => 1024 * 1024 * 1024,
        'TB' => 1024 * 1024 * 1024 * 1024,
        'PB' => 1024 * 1024 * 1024 * 1024 * 1024,
		);

		$bytes = floatval($str);

		if (preg_match('#([KMGTP]?B|M|G)$#si', $str, $matches) && !empty($bytes_array[$matches[1]])) {
			$bytes *= $bytes_array[$matches[1]];
		}

		$bytes = intval(round($bytes, 2));

		return $bytes;
	}

	/**
	 *
	 * Converts bytes to human readable file size
	 * @param string $bytes
	 */
	function bytes2size($bytes)
	{
		$symbols = array('B', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb');
		$exp = floor(log($bytes)/log(1024));

		return sprintf("%.2f " . $symbols[$exp], ($bytes/pow(1024, floor($exp))));
	}
}