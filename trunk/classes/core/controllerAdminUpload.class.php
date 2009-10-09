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
            
            echo "<script type=\"text/javascript\">var CKEditorFuncNum = window.location.href.replace(/.*CKEditorFuncNum=(\d+).*/,\"$1\")||alert('Error: lost CKEditorFuncNum param from url'+window.location.href)||1;
window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, 'http://essentialmind.com/templates/main/images/tellmore.png');</script>";
            exit;
        }
    }
?>
