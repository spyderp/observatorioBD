<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Diticui.Recaptchalib', 'Lib');
class ReCaptchaHelper extends AppHelper {
    
    private $_error = null;
    var $helpers = array('Html');
    
    public function setError($error) {
        $this->_error = $error;
    }
    
    public function getError() {
        return $this->_error;
    }
    
    public function getHtml($theme = 'clean') {
        $this->Html->scriptBlock('var RecaptchaOptions={theme:"' . $theme . '"};', array('inline' => false));
    	return recaptcha_get_html(Configure::read('reCaptchaPubliKey'), $this->getError());
    }
}