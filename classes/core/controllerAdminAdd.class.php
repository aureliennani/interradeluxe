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
        @purpose    The Splash page of the Blog
     ***/
    class controllerAdminAdd extends controller{
        
        public function process(){
            $this->template('add.html');            
        }
    }
?>
