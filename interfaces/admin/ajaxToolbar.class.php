<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    class ajaxToolbar extends ajax{

        public function process(){              

            //output
            header("Content-type:text/xml"); 
            $this->smarty->display('xml/toolbar.xml');
            
        }
    }
