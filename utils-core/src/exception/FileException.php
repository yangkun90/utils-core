<?php
/* * @Author: 杨坤  */
namespace YkCmsTp\exception;
class FileException extends \Exception
{
    public $code = 413;
    public $msg  = '文件体积过大';
    public $error_code = '60000';
    
    public function __construct($params = [])
    {
        isset($params['code']) && $this->code = $params['code'];
        isset($params['message']) && $this->message = $params['message'];
        isset($params['error_code']) && $this->error_code = $params['error_code'];
        if(class_exists('\YkCmsTp5\exception\BaseException')){
            throw  new \YkCmsTp5\exception\BaseException([
                'code' => $this->code,
                'msg' => $this->message,
                'error_code' => $this->error_code,
            ]);
        }
        parent::__construct($this->error_code.$this->message,$this->code);
    }
}
