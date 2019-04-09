<?php 
    namespace control;
    include('connection.php');
    class Payment{
        protected $fecha;
        protected $emisor;
        protected $receptor;
        protected $cantidad;
        protected $motivo;

        public function findPattern($pattern){
            $con = new Conexion();
            $collectionPayment = $con->getPagos();
            $regex = $con->regex($pattern);
            $result=$collectionPayment->find(   array(
                '$or' => array(
                    ["receptor" => $regex],
                    ["emisor" => $regex],
                    ["cantidad" => $regex],
                )
            ));
            return $result;
        }

        private function register($json){
            $con = new Conexion();
            $collectionPayments = $con->getPagos();
            try{
                $collectionPayments->insertOne($json);
            }catch (\MongoDB\Driver\Exception\Exception $e) {
                return false;
            }
            return true;
        }

        public function setPayment($fecha,$emisor,$receptor,$cantidad,$motivo){
            $this->fecha=$fecha;
            $this->emisor=$emisor;
            $this->receptor=$receptor;
            $this->cantidad=$cantidad;
            $this->motivo=$motivo;
            $json=[
               "fecha" => $this->fecha,
               "emisor" => $this->emisor,
               "receptor" => $this->receptor,
               "cantidad" => $this->cantidad,
               "motivo" => $this->motivo,
            ];
            return $this->register($json);
        }        
        public function findPayment($json){
            $con = new Conexion();
            $collectionPayments = $con->getPagos();
            $result=$collectionPayments::find($json);
            return $result;
        }
        public function findPaymentByID($ID){
            $con = new Conexion();
            $collectionPayments = $con->getPagos();
            $result = $collectionPayments->find(["_id" => $ID]);

            return $result;
        }

        public function update($Oldusername,$NewJson){
            //para que funcione sin restricciones es necesario utilizar un campo unico no se puede
            //actualizar con referencia al id por alguna razon pero es necesario cambiar con el nombre anterior.
            //al ser este un campo unico no es dificil hacerlo

            $con = new Conexion();
            $collectionPayments = $con->getPagos();
            try {

                $collectionPayments->replaceOne(
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
        public function destroy($_id){
            $con = new Conexion();
            $collectionPayments = $con->getPagos();
            try {
                $pay = $collectionPayment::findOne(["_id"=>$_id]);
                $collectionPayments->deleteOne([
                    "fecha" => $pay->fecha ,
                    "emisor"=>$pay->emisor ,
                    "receptor"=>$pay->receptor,
                    "cantidad"=>$pay->cantidad,
                    "motivo"=> $pay->motivo
                ]);

                return true;
            } catch (\Throwable $th) {
                //throw $th;
                return false;
            }
        }
/*
        public function login($username, $pass){
            $con = new Conexion();
            $collectionPayments = $con->getPagos();
            $result = $collectionPayments->find(["username.name"=>$username]);
            foreach($result as $us){
                $pass_v=password_verify($pass, $us['pass']);
                return $pass_v;
            }
        }*/
        //------------------------------FINAL---------------------------//
    }
?>