<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/


    ## Step 1 - Init Config ##
    #
    //parse the solution's configuration file and assign it to
    //a global array called $_CONFIG
    try{
        //make sure there is no notification
        if(!$GLOBALS['_CONFIG']['root']){
            $GLOBALS['_CONFIG']['root'] = null;
        }        
        
        //load default settings
        if(file_exists($GLOBALS['_CONFIG']['root'].'settings/config.ini')){
            $GLOBALS['_CONFIG'] = parse_ini_file($GLOBALS['_CONFIG']['root'].'settings/config.ini');
        }else{ // no joy
            throw new exception('No System Default Configuration Data File Defined (<b>settings/config.ini</b> not found). Can not continue. Use the template provided to create a fresh one!');
        }        
    }catch (exception $e){
        echo $e->getMessage();
        exit;
    }        
    #
    ##
    
    
    ## Step 2 - Open DB Connection ##
    #
    
    #
    ##
    
    
    ## Step 3 - INIT Smarty ##
    #
    //import Template Parsing Libraries
    require_once $GLOBALS['_CONFIG']['root'].'lib/smarty/Smarty.class.php';
    
    //cast Template Parser
    $smarty = new mySmarty();    
    #
    ##
    
    
    ## Step 4 - INIT System ##
    #
    if($GLOBALS['_CONFIG']['locale']){
        setlocale(LC_TIME,$GLOBALS['_CONFIG']['locale']);
    }
    #
    ##
?>