<?php
session_start();
include_once('./includes/database.php');
$result = database::query('SELECT * FROM USERS');
while($row = $result->fetch_assoc()){
    if($row['email']==$_REQUEST['email'] && $row['password']==$_REQUEST['password']){
        echo "hello";
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        break;
    }

}
var_dump($_SESSION);
if(isset($_SESSION['name'])){
    header("Location: ./dashboard.php");
    exit();
}else{
    header('Location: ./index.php?error=somethingWrong');
    exit();
}
