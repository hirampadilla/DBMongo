<?php 
    namespace control;
    include('connection.php');
    class Usuario{
        private $username;
        protected $pass;

        private function register($json){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            try{
                $collectionUsers->insertOne($json);
            }catch (\MongoDB\Driver\Exception\Exception $e) {
                echo $e->getMessage(), "\n <strong>Usuario ya existe</strong>";
                return false;
            }
            return true;
        }
        
        public function setUser($username,$pass){
            $this->username=$username;
            $this->pass=password_hash($pass, PASSWORD_DEFAULT);
            $json=[
               "username" => ["name"=>$this->username, "unique"=>true],
               "pass" => $this->pass
            ];
            return $this->register($json);
        }        
        public function findUser($username){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            $result=$collectionUsers->find($username);
            return $result;
        }
        public function findUserByID($ID){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            $result = $collectionUsers->find(["_id" => $ID]);

            return $result;
        }
        public function update($idJSON,$NewJson){
            
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            $olduser= $this->findUserByID($idJSON);
            echo "<br>";
            print_r($olduser);
            try {
                $collectionUsers->updateOne(['_id'=>$olduser],$NewJson);
            } catch (\Throwable $th) {
                echo $th;
            }
            return true;
        }

        public function login($username, $pass){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            $result = $collectionUsers->find(["username.name"=>$username]);
            foreach($result as $us){
                print_r($us);
                $pass_v=password_verify($pass, $us['pass']);
                return $pass_v;
            }
        }
        //------------------------------FINAL---------------------------//
    }
?>