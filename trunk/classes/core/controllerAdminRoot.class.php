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
        @purpose    The Splash page of the Blog
     ***/
    class controllerAdminRoot extends controller{
        
        public function process(){
            if(!isset($_SESSION['admin']) or $_SESSION['admin'] == false){
                $this->processLogin();
            }else{
                $this->template('main.html');
            }
        }
        
        
        protected function processLogin(){
            $this->template('login.html');
                
            //check login credentials
            if($_POST){            
                sleep(1); //simple measure against bruteforcing my password, allow 1 call per second only @2do improve this
                
                $user = $this->db->query("SELECT * FROM credentials WHERE email = ".$this->db->quote($_POST['mail']))->fetch();
                if($user and $user['pswd'] == $_POST['pass']){
                    
                    //mark the login of the user
                    $this->db->exec("UPDATE credentials SET
                                                last_login = NOW()
                                                WHERE uid = ".(int)$user['uid']);
                                                
                    $_SESSION['admin'] = $user;
                    header('Location: '.$GLOBALS['_CONFIG']['url'].'admin/');
                    exit;
                }
                
                $this->smarty->assign('nogo',true);
            }
        }
    }
?>
