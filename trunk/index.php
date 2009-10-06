<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>    
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    require_once('init.inc.php');
    require_once($GLOBALS['_CONFIG']['root'].'classes/core/controller.class.php');

    #### Prepare #######
    #
    //security audit
    if(isset($_GET['controller'])){
        $_GET['controller'] = str_replace('/','',$_GET['controller']);
        $_GET['controller'] = str_replace('.','',$_GET['controller']);
        $_GET['controller'] = str_replace('\\','',$_GET['controller']);
        $_GET['controller'] = str_replace(' ','',$_GET['controller']);
    }
    
    //check for empty case
    if(empty($_GET['controller'])){
        if(!isset($_GET['admin'])){
            $_GET['controller'] = 'root';
        }else{
            $_GET['controller'] = 'adminRoot';
            $smarty->caching    = false;        //no cache for admin side
        }
    }       
    
    //check for existence (otherwise 404)
    if(!file_exists($GLOBALS['_CONFIG']['root'].'classes/core/controller'.ucfirst($_GET['controller']).'.class.php')){
        $_GET['controller'] = '404';
        $cacheID = '404';
    }else{        
        //cache id
        if(isset($_SERVER['REDIRECT_URL'])){
            $cacheID = str_replace('/','|',substr(substr($_SERVER['REDIRECT_URL'],0,-1),1));
        }else{
            $cacheID = '___root___';
        }
    }
    #
    #### /Prepare ######
    
    ## This is the Heart and Sould ##
    #
    try{
        #### Create ########
        #
        //call controller
        $cName = 'controller'.ucfirst($_GET['controller']);
        include_once($GLOBALS['_CONFIG']['root'].'classes/core/'.$cName.'.class.php');
        $controller = new $cName($db, $smarty);
        #
        #### /Create #######
            
        #### Display #######
        #
        //display the page ;)
        $controller->display('index.html',$cacheID);
        #
        #### /Display ######
        
    }catch (exception $e){
        echo $e->getMessage();
        exit;
    }
    #
    ## Yaaaa! ##
?>