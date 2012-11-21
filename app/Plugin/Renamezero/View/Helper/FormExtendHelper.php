<?php
App::uses('AppHelper', 'View/Helper');
class FormExtendHelper extends AppHelper {
	var $helpers = array('Form');
	
	public function checkboxes($field, $options) {
		if (!isset($options['model'])) {
			list($model, $field) = explode(".", $field);
		}else {
			$model = $options['model'];
		}
		$options = array_merge($this->_default(), $options);
		$output = '<fieldset><legend>' . $options['label'] . '</legend>';
		$counter = 0;
		foreach ($options['options'] as $value => $label) {
			$checked = in_array($value, $options['values']);
			$output .= $this->Form->input($model . '.' . $counter . '.' . $field, 
						array('label' => $label, 'value' => $value, 'type' => 'checkbox', 'checked' => $checked));
			$counter++;
		}
		return $output . '</fieldset>';
	}
	
	public function cancelButton($title = 'Cancelar', $action = array('action' => 'index'), $options = array()) {
		$options = array_merge(array('onclick' => "window.location='" . $this->url($action, true) . "'",
					  'type' => 'button', 'class' => 'cancelButton'), $options);
		return '<div class="submit">' . $this->Form->button(__($title, true), $options) . '</div>';
	}
	
	public function yesNoSelect($field, $options = array()) {
		$options['options'] = array(
			'1' => __('Sí', true),
			'0' => __('No', true),
		);
		$options['type'] = 'select';
		return $this->Form->input($field, $options);
	} 
	
	protected function _default() {
		return array(
			'label' => '',
			'options' => array(),
			'values' => array(),
		);
	}
}