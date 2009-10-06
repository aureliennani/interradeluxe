<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/

    error_reporting(E_ALL);

    ## Autoloader ##
    #
    /**
     * __autoload() -- automatic class loader
     * 
     * @param string $className
     * @return void
     **/
    function __autoload($className){
        /*
            The order of priority lies as follows:
                /classes/
            
            Each of the above locations is checked for the existense of
            the desired class. In case none is found the application will
            be halted.
            
            Please note, that external libraries cannot be overridden, thus
            their location in the 'lib' directory
        */
        //first check for an override in the solution's classes dir
        if(file_exists($GLOBALS['_CONFIG']['root'].'classes/core/'.$className.'.class.php')){
            require_once $GLOBALS['_CONFIG']['root'].'classes/core/'.$className.'.class.php';
            return;
        }    
        
        if(file_exists($GLOBALS['_CONFIG']['root'].'classes/'.$className.'.class.php')){
            require_once $GLOBALS['_CONFIG']['root'].'classes/'.$className.'.class.php';
            return;
        }        
        
        echo "Fatal Error: class \"" . $className . "\" not found!";
        exit;
    }
    #
    ##

    ## Step 1 - Init Config ##
    #
    //parse the solution's configuration file and assign it to
    //a global array called $_CONFIG
    try{
        //make sure there is no notification
        if(!isset($GLOBALS['_CONFIG']['root'])){
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
    # @2do -- if caching is on, I should open a db connection on demand only
    #
    try{
        $db = new PDO($GLOBALS['_CONFIG']['dbtype'].':host='.$GLOBALS['_CONFIG']['dbhost'].';dbname='.$GLOBALS['_CONFIG']['dbname'],$GLOBALS['_CONFIG']['dbuser'],$GLOBALS['_CONFIG']['dbpass'],array());
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $db->exec("SET NAMES 'utf8'");
    }catch (exception $e){
        echo $e->getMessage();
        exit;
    }
    #
    ##
    
    
    ## Step 3 - INIT Smarty ##
    #
    //import Template Parsing Libraries
    require_once $GLOBALS['_CONFIG']['root'].'lib/smarty/Smarty.class.php';
    require_once $GLOBALS['_CONFIG']['root'].'classes/mySmarty.class.php';
    
    //cast Template Parser
    $smarty = new mySmarty(); //mySmarty configures the Smarty template endinge with InTerra's settings
    #
    ##
    
    
    ## Step 4 - INIT System ##
    #
    if($GLOBALS['_CONFIG']['locale']){
        setlocale(LC_TIME,$GLOBALS['_CONFIG']['locale']);
    }
    #
    ##
    
    
    ## Step 5 - INIT Session ##
    #
    session_start();    // @2do move to db based sessions
    #
    ##
?>