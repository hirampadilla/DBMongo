<?php 
    namespace control;
    include('connection.php');
    class Usuario{
        private $username;
        protected $pass;
        private function register($json){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            $collectionUsers->insertOne($json);

        }

        public function setUser($username,$pass){
            $this->username=$username;
            $this->pass=password_hash($pass, PASSWORD_DEFAULT);
            $json=[
               "username" => ["name"=>$this->username, "unique"=>true],
               "pass" => $this->pass
            ];
            $this->register($json);
        }        
        public function findUser($username){

        }
        public function findUserByID($objectID){

        }
        public function update($SerchJSON,$json){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            $collectionUsers->updateOne($SerchJSON,$json);
        }
        public function login($username, $pass){
            $con = new Conexion();
            
            return true;
        }
    }
?>