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
            //process adding new entry
            $this->db->query("INSERT INTO articles SET
                                            title       = ".$this->db->quote($_POST['title']).",
                                            content     = ".$this->db->quote($_POST['content']).",
                                            url         = ".$this->db->quote('booga_dooga_'.rand(1,10000000)).",
                                            created     = NOW(),
                                            modified    = NOW(),
                                            author      = 1");
            
            
            //redirect
            header('Location: /admin/');
            exit;
        }
    }
?>
