<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    
    //prepare
    $GLOBALS['_CONFIG']['root'] = substr(dirname(__FILE__),0,-15);
    
    //config
    require_once $GLOBALS['_CONFIG']['root'].'classes/ajax.class.php';
    require_once $GLOBALS['_CONFIG']['root'].'interfaces/ajax/ajax.class.php';
    require_once $GLOBALS['_CONFIG']['root'].'init.inc.php';
    
    $R = new AjaxResponseWddx;
    
    //see what action to call
    if(!$_REQUEST['action'] or !file_exists('ajax'.ucfirst($_REQUEST['action']).'.class.php')){
        $ajaxAaction = 'ajax';
    }else{
        $ajaxAaction = 'ajax'.ucfirst($_REQUEST['action']);
        require_once $ajaxAaction.'.class.php';
    }
    
    //send reply to the requesting party
    $ajax = new $ajaxAaction($db,$R,$smarty);
    $ajax->reply();
?>
