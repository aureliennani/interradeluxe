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
        
            if($_REQUEST['aid']){
                //cast entry object
                $entry = new entry($this->db,$_REQUEST['aid']);                
            }else{
                $entry = new stdClass();
            }
            
            $this->smarty->assign('entry',$entry);
            $this->R->form = $this->smarty->fetch('add.html');
        }
    }
