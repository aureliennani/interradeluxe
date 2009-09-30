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
        
        }
        
        public abstract function process();        
        
    }
?>
