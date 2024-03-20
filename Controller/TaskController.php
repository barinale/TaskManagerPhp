<?php
include_once('./classes/task.php');
include_once('./Model/taskModel.php');
    class TaskController{
        public function Add(){
            $taskName = isset($_REQUEST['method'])?$_REQUEST['method']:'';
            if($taskName!==''){

                $task = new task($_REQUEST['name']);
                taskModel::addTask($task);
            }
        }
        public function getTask(){
            return taskModel::getTask();
        }
        public function Update($id,$name){
            return taskModel::UpdateTask($id,$name);
        }
    }