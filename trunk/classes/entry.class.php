<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>    
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     ********************************************************/
    
    /***
        @purpose    The Splash page of the Blog
     ***/
    class entry{
        
        protected $db;      // reference to an open database connection PDO
        protected $data;    // general data holder
        
        
        public function __construct($db,$id=null){
            $this->db = $db;
            
            if($id){
                $this->init($id);
            }
        }
        
        
        /***
            @purpose    initializes the object with neccessary data based in whatever filter criteria is added
            @return     (bool) was the init successful
         ***/
        public function init($id){
            $this->data = $this->db->query("SELECT 
                                                        articles.*,
                                                        credentials.first_name,
                                                        credentials.last_name
                                                    FROM articles
                                                    LEFT JOIN credentials ON articles.author = credentials.uid
                                                    WHERE articles.aid = ".(int)$id." LIMIT 1")->fetch();
            return true;
        }
        
        
        
        ##### SPL ########################################################
        
        /* ----- PHP5 Magic Methods Below ----- */
        
        /***
            @purpose:   Magic getter
         ***/
        public function __get($key){
            return $this->data[$key];
        }
        
        /***
            @purpose:   Magic setter
         ***/
        public function __set($key, $val){
            $this->data[$key] = $val;
        }
    }
?>
