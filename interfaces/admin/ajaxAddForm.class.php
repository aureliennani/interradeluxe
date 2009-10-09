<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    class ajaxAddForm extends ajax{

        public function process(){              
            $this->R->form = $this->smarty->fetch('add.html');
        }
    }
