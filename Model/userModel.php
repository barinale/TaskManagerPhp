<?php
include_once('./includes/database.php');
include_once('./classes/user.php');
    class userModel{
        public static function addNewUser(User $user){
            $conextion = database::connect();
            $stm =$conextion->prepare('insert into users values(?,?,?,?)');
            
            $stm->bind_param("isss",$user->id,$user->name,$user->email,$user->password);
            $stm->execute();     
            $stm->close();
        }   
        public static function getUsers(){
            $conextion = database::query("SELECT * FROM USERS");
            return $conextion;
        }
        public static function getuser(int $id){
            $conextion = database::connect();
            $stm =$conextion->prepare('select * from users where id=(?)');
            $stm->bind_param('i',$id);
            $stm->execute();
            $result = $stm->get_result();
            $user = $result->fetch_assoc();
            $stm->close();
            $conextion->close();
            
            return $user;
        }
        public static function update(string $name,string $email,int $id){
            $connextion = database::connect();
            $stm = $connextion->prepare('UPDATE users SET name = ? ,email = ? WHERE id = ?');
            $stm->bind_param('ssi',$name,$email,$id);
            if($stm->execute()){
            $stm->close();

                return "Update seccues";
            }else{
            $stm->close();

               return "not updating";
            }
            
        }
    }