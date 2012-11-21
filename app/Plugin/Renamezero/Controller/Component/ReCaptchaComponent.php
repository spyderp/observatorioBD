<?php
App::import('Lib', 'Renamezero.Recaptchalib');
class ReCaptchaComponent extends Component {
    
    protected $Controller;
    protected $_error = '';
    
    public function startup(&$controller) {
        $this->Controller = $controller;
    } 
    
    /**
     * 
     * Valida si el captcha introducido es correcto
     * @return boolean 
     */
    public function validCaptcha() {
        if (!isset($this->Controller->params["form"]["recaptcha_challenge_field"])) return true;
        
    	$resp = recaptcha_check_answer (Configure::read('reCaptchaPrivateKey'),
                                        $_SERVER["REMOTE_ADDR"],
                                        $this->Controller->params["form"]["recaptcha_challenge_field"],
                                        $this->Controller->params["form"]["recaptcha_response_field"]);
        if (!$resp->is_valid)  {
            $this->_error = $resp->error;
            return false;
        }                
        return true;                      
    }
    
    public function getError() {
        return $this->_error;
    }
}