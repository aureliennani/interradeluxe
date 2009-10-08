<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    abstract class AjaxResponse implements IteratorAggregate{
    
        protected $result;    
        private $errorLabel;
    
        function __construct(){
        	$this->clear();
    
            $this->errorLabel = sha1(microtime());
            ini_set('error_prepend_string', $this->errorLabel.ini_get('error_prepend_string'));
            ini_set('error_append_string', ini_get('error_append_string').$this->errorLabel);
    
            ob_start(array($this, "ob_handler"));
            
        }
    
    
        function clear(){
            $this->result = array();
        }
    
    
        function ob_handler($buf){
            if(!empty($buf))
            {
                $regexp = '~'.$this->errorLabel.'(.*?)'.$this->errorLabel.'~msi';
                if(preg_match_all($regexp, $buf, $mtch))
                {
                    $errors = array();
                    foreach($mtch[1] as $error) $errors[] = trim(strip_tags($error));
                    $this->result['_ERROR'] = implode("\n\n", $errors);
                    $buf = str_replace($this->errorLabel, '', $buf);
                }

                $this->result['_OUTPUT'] = $buf;
            }
    
            list($result, $headers) = $this->serializeResult();
    
            foreach($headers as $name => $content) header("$name: $content");
            return $result;
        }
    
    
        abstract protected function serializeResult();
    
        function getIterator() { return new ArrayIterator($this->result); }
    
    
        function __get($name) { return $this->result[$name]; }
        function __set($name, $value) { $this->result[$name] = $value; }                            	    	    	
    }
    
    
    
    class AjaxResponseWddx extends AjaxResponse{    	    	
    
        protected function serializeResult(){
            
            //checking if the WDDX module is installed
    	    if(function_exists('wddx_serialize_value')){
    	        $text = '<?xml version="1.0" encoding="UTF-8"?>'.wddx_serialize_value($this->result);
    	    }
    	    
    	    
            return array(
                $text, //this is IMPORTANT leave the decode intact!!!
                array(
                    "Content-type"		=> "text/xml",
                    "Charset"           => "utf-8"
    //				"Content-length"	=> strlen($text),
                )
            );
        }
    }
?>
