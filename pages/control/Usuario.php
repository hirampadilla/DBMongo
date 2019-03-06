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

        public function update($Oldusername,$NewJson){
            //para que funcione sin restricciones es necesario utilizar un campo unico no se puede
            //actualizar con referencia al id por alguna razon pero es necesario cambiar con el nombre anterior.
            //al ser este un campo unico no es dificil hacerlo

            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            try {

                $collectionUsers->replaceOne(
                    ["username.name" => $Oldusername],
                    [
                        "username"=>["name"=>$NewJson["name"]],
                        "pass"=>password_hash($NewJson["pass"],PASSWORD_DEFAULT)
                    ]                   
                );  
       
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
        public function destroy($username){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            try {
                $collectionUsers->deleteOne([
                    "username.name"=> $username
                ]);
                return true;
            } catch (\Throwable $th) {
                //throw $th;
                return false;
            }
        }

        public function login($username, $pass){
            $con = new Conexion();
            $collectionUsers = $con->getUsuarios();
            $result = $collectionUsers->find(["username.name"=>$username]);
            foreach($result as $us){
                $pass_v=password_verify($pass, $us['pass']);
                return $pass_v;
            }
        }
        //------------------------------FINAL---------------------------//
    }
?>