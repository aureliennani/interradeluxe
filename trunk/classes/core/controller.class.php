<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>    
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    
    /***
        @purpose    Abstract Controller Class. 
     ***/
    abstract class controller{
        
        protected $db; //pdo db handler
        protected $smarty;
        protected $user;
        
        public function __construct($db,$smarty,$user){
            $this->db     = $db;
            $this->smarty = $smarty;
            $this->user   = $user;
        }
        
        public abstract function process();        
        
        public function display($template='index.html'){
            $this->process();
            $this->smarty->display($template);
        }   
    }
?>
