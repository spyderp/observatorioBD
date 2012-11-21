<?php
/**
* $Id$
* MEDUCACOMPA
*
* El software MEDUCA COMPRA es propiedad de la UTP. MEDUCA
* tiene los derechos de uso y personalización del mismo
* pero no puede comercializar o ceder a ninguna persona natural o jurídica,
* pública o privada, en ningún tiempo.
*
* @package Js
* @subpackage JqueryEngine
* @author Ricardo Portillo
* @copyright UTP
*/
App::uses('AppHelper', 'View/Helper');
App::uses('JsBaseEngineHelper', 'View/Helper');

class JqueryEngineHelper extends JsBaseEngineHelper  {
		public  $_optionMap = array(
		'request' => array(
			'type' => 'dataType',
			'before' => 'beforeSend',
			'method' => 'type',
		),);
		/**
 * Callback arguments lists
 *
 * @var string
 */
	public $_callbackArguments = array(
		'request' => array(
			'beforeSend' => 'XMLHttpRequest',
			'error' => 'XMLHttpRequest, textStatus, errorThrown',
			'success' => 'data, textStatus',
			'complete' => 'XMLHttpRequest, textStatus',
			'xhr' => ''
		)
	);
/**
 * The variable name of the jQuery Object, useful
 * when jQuery is put into noConflict() mode.
 *
 * @var string
 */
	public $jQueryObject = '$';
/**
 * Create javascript selector for a CSS rule
 *
 * @param string $selector The selector that is targeted
 * @return JqueryEngineHelper instance of $this. Allows chained methods.
 */
	public function get($selector) {
		if ($selector == 'window' || $selector == 'document') {
			$this->selection = $this->jQueryObject . '(' . $selector . ')';
		} else {
			$this->selection = $this->jQueryObject . '("' . $selector . '")';
		}
		return $this;
	}
/**
 * Add an event to the script cache. Operates on the currently selected elements.
 *
 * ### Options
 *
 * - 'wrap' - Whether you want the callback wrapped in an anonymous function. (defaults true)
 * - 'stop' - Whether you want the event to stopped. (defaults true)
 *
 * @param string $type Type of event to bind to the current dom id
 * @param string $callback The Javascript function you wish to trigger or the function literal
 * @param array $options Options for the event.
 * @return string completed event handler
 */
	public function event($type, $callback, $options = array()) {
		$defaults = array('wrap' => true, 'stop' => true);
		$options = array_merge($defaults, $options);

		$function = 'function () {%s}';
		if ($options['wrap'] && $options['stop']) {
			$callback .= "\nreturn false;";
		}
		if ($options['wrap']) {
			$callback = sprintf($function, $callback);
		}
		return sprintf('%s.on("%s", %s);', $this->selection, $type, $callback);
	}
/**
 * Create a domReady event. For jQuery. This method does not
 * bind a 'traditional event' as `$(document).bind('ready', fn)`
 * Works in an entirely different fashion than  `$(document).ready()`
 * The first will not run the function when eval()'d as part of a response
 * The second will.  Because of the way that ajax pagination is done
 * `$().ready()` is used.
 *
 * @param string $functionBody The code to run on domReady
 * @return string completed domReady method
 */
	public function domReady($functionBody) {
		return $functionBody;
	}
	
/**
 * Create an iteration over the current selection result.
 *
 * @param string $method The method you want to apply to the selection
 * @param string $callback The function body you wish to apply during the iteration.
 * @return string completed iteration
 * @access public
 */
	function each($callback) {
		return $this->selection . '.each(function () {' . sprintf('$(this).%s',  $callback) . '});';
	}
/**
 * Create an $.ajax() call.
 *
 * If the 'update' key is set, success callback will be overridden.
 *
 * @param string|array $url
 * @param array $options See JsHelper::request() for options.
 * @return string The completed ajax call.
 * @see JsBaseEngineHelper::request() for options list.
 */
	public function request($url, $options = array()) {
		$url = $this->url($url);
		$options = $this->_mapOptions('request', $options);
		if (isset($options['data']) && is_array($options['data'])) {
			$options['data'] = $this->_toQuerystring($options['data']);
		}
		$options['url'] = $url;
		if (isset($options['update'])) {
			$wrapCallbacks = isset($options['wrapCallbacks']) ? $options['wrapCallbacks'] : true;
			$success = '';
			if (isset($options['success']) && !empty($options['success'])) {
				$success .= $options['success'];
			}
			$success .= $this->jQueryObject . '("' . $options['update'] . '").html(data);';
			if (!$wrapCallbacks) {
				$success = 'function (data, textStatus) {' . $success . '}';
			}
			$options['dataType'] = 'html';
			$options['success'] = $success;
			unset($options['update']);
		}
		$callbacks = array('success', 'error', 'beforeSend', 'complete');
		if (!empty($options['dataExpression'])) {
			$callbacks[] = 'data';
			unset($options['dataExpression']);
		}
		$options = $this->_prepareCallbacks('request', $options);
		$options = $this->_parseOptions($options, $callbacks);
		return $this->jQueryObject . '.ajax({' . $options . '});';
	}
/**
 * Create an iteration over the current selection result.
 *
 * @param string $method The method you want to apply to the selection
 * @param string $callback The function body you wish to apply during the iteration.
 * @return string completed iteration
 * @access public
 */
	function codebox($callback) {
		//return $this->selection . '.each(function () {' . $callback . '});';
		return sprintf('%s.%s', $this->selection, $callback);
	}
	function codebox2($callback) {
		//return $this->selection . '.each(function () {' . $callback . '});';
		return sprintf('%s', $callback);
	}
	public function effect($name, $options = array()){}
	public function drag($options = array()){}
	public function drop($options = array()){}
	public function sortable($options = array()){}
	public function slider($options = array()){}
	public function serializeForm($options = array()){}
}
