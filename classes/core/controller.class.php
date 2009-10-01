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
        
        public function __construct($db,$smarty){
            $this->db     = $db;
            $this->smarty = $smarty;            
        }
        
        
        public abstract function process();        
        
        
        /*
            @purpose    Central controller processor
         */
        public function display($template='index.html'){
            $this->process();            
            $this->smarty->display($template);
        }
        
        
        /*
            @purpose    Assign default controller action
         */
        protected function template($template){
            $this->smarty->assign('template',$template);
        }
    }
?>
