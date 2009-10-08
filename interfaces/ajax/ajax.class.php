<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    abstract class ajax{
        
        protected $R;
        protected $db;
        protected $smarty;
        
        function ajax($db, $R, mySmarty $smarty=null){
            $this->db       = $db;
            $this->R        = $R;
            $this->smarty   = $smarty;
        }
        
        
        abstract protected function process();
        
        
        function reply(){
            if($this->R){
                $this->R->status = 'ok';
            }
            $this->process();
        }
        
        
        /***
            @purpose    Deprecated, probably wont need this as we are utf-8
         ***/
        public function unescape($str) {
            global $GLOBALS;
            $str = str_replace("%0A","\n\r",$str);
            
            $str = rawurldecode($str);
            preg_match_all("/(?:%u.{4})|&#x.{4};|&#\d+;|.+/U",$str,$r);
            $ar = $r[0];
            foreach($ar as $k=>$v) {
                if(substr($v,0,2) == "%u")
                    $ar[$k] = iconv("UCS-2BE","UTF-8",pack("H4",substr($v,-4)));
                elseif(substr($v,0,3) == "&#x")
                    $ar[$k] = iconv("UCS-2BE","UTF-8",pack("H4",substr($v,3,-1)));
                elseif(substr($v,0,2) == "&#") {
                    $ar[$k] = iconv("UCS-2BE","UTF-8",pack("n",substr($v,2,-1)));
                }
            }
            $title = join("",$ar);

            return $title;
        }      
    }
?>
