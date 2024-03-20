<?php
    
    include_once('./Controller/TaskController.php');
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['method'])){
        $method = isset($_POST['method']) ? $_POST['method'] : '';
        $TaskController = new TaskController();
        if($method=='AddTask'){
            $TaskController->Add();
            header('Location: ./dashboard.php');
        }
    }

   if(isset($_POST['Task']) && isset($_POST['id']) && $_SERVER['REQUEST_METHOD']=="POST"){
        $TaskCOntroller = new TaskController();
        $Result = $TaskCOntroller->update($_POST['id'],$_POST['Task']);
        echo $Result;
    }

   