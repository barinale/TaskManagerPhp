<?php   
include_once('./Model/userModel.php');
include_once('./classes/user.php');
include_once('./includes/database.php');
    class UserController{

        public function Add(){
            $name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
            $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
            if($name !=='' && $email !==''){
                $user = new User($name,$email);
                // try{
                userModel::addNewUser($user);
                // }catch(Exception $e){
                //     echo "something Went Wrong Try Again";
                // }
            }else{
                echo "fields are empty";
                echo "</br>";
                
                echo $name;
                echo "</br>";
                echo $email;
            }
            
            
            
        }
        public function getUsers(){
            return userModel::getUsers();
        }
        public function gertUser(int $id){
            return userModel::getuser($id);    
        }
        public static function updateUser(string $name,string $email,int $id){
           return userModel::update($name,$email,$id);
        }
        
    }