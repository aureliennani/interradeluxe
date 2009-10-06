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
        @purpose    A Smarty Configurator
     ***/
    class mySmarty extends Smarty{
        
        
        /**
        * Constructor
        * 
        * @param boolean $admin - true in case work is done on the admin side
        * @return void
        **/
        public function __construct(){
            // -- / Start Init Smarty / --
            // init smarty
            parent::__construct();
            
            // -- Control Templates
            // check whether new templates need recompilation
            $this->compile_check    = $GLOBALS['_CONFIG']['smartyccheck'];
            
            // -- Various paths
            // if the call is placed from the client, then load the
            // client template set, otherwise load the admin templates
            $this->template_dir     = array();            
            if(isset($_GET['admin'])){
                $this->template_dir[]   = $GLOBALS['_CONFIG']['root'].'templates/_admin';
                $this->compile_dir      = $GLOBALS['_CONFIG']['root'].'cache/templates_c/_admin';
            }else{
                $this->template_dir[]   = $GLOBALS['_CONFIG']['root'].'templates/'.$GLOBALS['_CONFIG']['template'].'/';
                $this->template_dir[]   = $GLOBALS['_CONFIG']['root'].'templates/_system';
                $this->compile_dir      = $GLOBALS['_CONFIG']['root'].'cache/templates_c';
            }
            
            $this->config_dir       = array();
            $this->config_dir[]     = $GLOBALS['_CONFIG']['root'].'templates/_lang';
            
            //client pages may be cached
            $this->caching          = $GLOBALS['_CONFIG']['smartycache'];
            
            //lifetime of cache in seconds
            $this->cache_lifetime   = $GLOBALS['_CONFIG']['smartylife'];
            
            //send a modified header?
            $this->cache_modified_check = true;
            
            //set the cache firectory
            $this->cache_dir        = $GLOBALS['_CONFIG']['root'].'cache/content';
            
            //plugins added            
            $this->plugins_dir[]    = $GLOBALS['_CONFIG']['root'].'smartyplugins';
            
            
            //this is to be changed, we do not want to rely on this
            //outsource all error messages to a separate file and all
            //system data to a separate file
            //$this->setLangFile('main.txt');
            
            // -- Other Settings
            // enable the use of subdirs?
            $this->use_sub_dirs     = $GLOBALS['_CONFIG']['smartysubdirs'];            
            // -- / Finish Settings / --
            
            
            //register custom blocks
            // $this->register_block("dynamic", "smarty_block_dynamic", false);
            // -- / End Init Smarty / --
            
            $this->assignDefaults();
        }
        
        
        /**
        * @purpose  Assign default smarty variables
        **/
        public function assignDefaults(){
            $data = array();
            $data['root']    = $GLOBALS['_CONFIG']['url'];
            $data['admin']   = $GLOBALS['_CONFIG']['url'].'templates/_admin/';
            $data['title']   = $GLOBALS['_CONFIG']['title'];
            $data['version'] = '0.001';
            
            $this->assign('DATA',$data);            
        }
    }
?>
