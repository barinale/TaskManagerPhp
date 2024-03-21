<?php
include_once('./classes/task.php');
include_once('./includes/database.php');
    class taskModel{
        public static function addTask(Task $task){
            $connextion = database::connect();
            $stm = $connextion->prepare('insert into task (taskName) values(?)');
            $stm->bind_param('s',$task->taskName);
            $stm->execute();
            $stm->close();
        }
        public static function getTask(){
            $connextion = database::query('select * from task');
            return $connextion;
        }

        public static function UpdateTask($id,$name){
            try{
            $connextion = database::connect();
            $stm = $connextion->prepare('UPDATE task SET taskName = ?  WHERE id = ?');
            $stm->bind_param('si',$name,$id);
            if($stm->execute()){
                $stm->close();
                $JSON = json_encode(["Update",$name]);
                    return $JSON;
                }
                else{
                $stm->close();
                   return ["Error"];
                }
        }catch(Exception $e){
            $JSON = json_encode(["Error"]);
            return $JSON;
        }
    
    }
    }