<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>    
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    
    class controllerAdminUpload extends controller{
        
        public function process(){
            
            //print_r($_GET);
            $output = '<html><body><script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(1, "http://googleads.g.doubleclick.net/pagead/imgad?id=CM7c4-ndnsW11AEQoAEYwgQyCDd-5qDON_kX");</script></body></html>';
            echo $output;
            exit;

        }
    }
?>
