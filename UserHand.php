<?php
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $method = isset($_POST['method']) ? $_POST['method'] : '';
        include_once('./Controller/UserController.php');
        $userController = new UserController();
        if($method=='AddUser'){
            $userController->Add();
            header('Location: ./dashboard.php');
        }

    }
    else if($_SERVER['REQUEST_METHOD']=="GET" && isset($_REQUEST['id']) && isset    ($_REQUEST['action'])){
        header('Location: ./updateUsers.php?id='.$_REQUEST['id']);
        
    }