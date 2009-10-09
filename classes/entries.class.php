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
    class entries implements Iterator, ArrayAccess, Countable{
        
        protected $db;      // reference to an open database connection PDO
        protected $data;    // general data holder
        
        protected $entries = array();  // all the entries fetched by the current filter
        private   $valid   = FALSE;    // track to keep end of the fields array
        
        
        public function __construct($db){
            $this->db = $db;
            $this->init();
        }
        
        
        /***
            @purpose    initializes the object with neccessary data based in whatever filter criteria is added
            @return     (bool) was the init successful
         ***/
        public function init(){
            $this->entries = $this->db->query("SELECT 
                                                        articles.*,
                                                        credentials.first_name,
                                                        credentials.last_name
                                                    FROM articles
                                                    LEFT JOIN credentials ON articles.author = credentials.uid")->fetchAll();
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
        
        
        /* ----- SPL ITERATOR MAGIC BELOW ----- */        
        /** 
        * Return the array "pointer" to the first element 
        * PHP's reset() returns false if the array has no elements 
        */         
        public function rewind(){ 
            $this->valid = (FALSE !== reset($this->entries)); 
        } 
       
        public function current(){ 
            return current($this->entries); 
        } 
       
        public function key(){ 
            return key($this->entries); 
        } 
       
        public function next(){ 
            $this->valid = (FALSE !== next($this->entries)); 
        } 
       
        public function valid(){ 
            return $this->valid; 
        } 
        
        
        
        /* ----- SPL ArrayAccess Magic Below ----- */
        public function offsetSet($key, $value) { 
            if (array_key_exists($key,$this->entries) ) { 
                $this->entries[$key] = $value; 
            } 
        } 
       
        public function offsetGet($key) { 
            if ( array_key_exists($key,$this->entries) ) { 
                return $this->entries[$key]; 
            } 
        } 
       
        public function offsetUnset($key) { 
            if (array_key_exists($key,$this->entries) ) { 
                unset($this->entries[$key]); 
            } 
        } 

        public function offsetExists($offset) { 
            return array_key_exists($offset,$this->entries); 
        } 
        
        
        public function count(){
            return count($this->entries);
        }
    }
?>
