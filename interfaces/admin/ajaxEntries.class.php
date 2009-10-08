<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    class ajaxEntries extends ajax{

        public function process(){              

            $entries = new entries($this->db);
            $this->smarty->assign('entries', $entries);
        
            //output
            header("Content-type:text/xml"); 
            $this->smarty->display('xml/items.xml');
        }
    }
