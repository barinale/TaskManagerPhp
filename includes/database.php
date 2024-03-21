<?php
    class database{
        private static $host = "localhost";
        private static $username ="root";
        private static $password = "";
        private static $database="taskManager";


        private static $connection;

        public static function connect(){
            if(!self::$connection){
                self::$connection = new mysqli(self::$host,self::$username,self::$password,self::$database);
                if(self::$connection->connect_error)
                    {
                    die('there is Error'.self::$connection->connect_error);
                    }   
                }
            return self::$connection;
        }


        public static function query($qeury){
            $connect = self::connect();
            return $connect->query($qeury);
        }
        
   
        public static function closes(){
            self::$connection->close();
        }
    }