<?php 
    include_once('./includes/database.php');
    class User{
        public int $id;
        public string $password;
        public function __construct(public string $name,public string $email){
            $this->getId();
            $this->password="";
        }
        private function getId(){
                $reslut = database::query('SELECT * FROM USERS ORDER BY id DESC LIMIT 1;');
                $id = $reslut->fetch_assoc()['id'];
                $this->id = $id+1;
            
            }

       
      
    }


    // include_once('./includes/database.php');
    