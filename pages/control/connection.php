<?php
    namespace control;
    require '../../vendor/autoload.php'; // include Composer's autoloader

    class Conexion {
        //Conectar al servidor
        private $connection;
        private $db;
        private $usuarios;
        private $persona;
        private $pagos;

        // private $collection;
        public function __construct(){
            $this->connection = new \MongoDB\Client("mongodb://localhost:27017");
            $this->db = $this->connection->proy_final;
            $this->usuarios= $this->db->usuarios; 
            $this->persona= $this->db->persona; 
            $this->pagos=$this->bd->pagos;
            // echo "Valores encontrados: \n<br>";
            // foreach ($result as $entry) {
            // echo "<strong>Username: </strong>".$entry["name"], ': ', "<strong>pass:</strong>".$entry['pass'],"\n <br>";
            // }
        }
        public function getUsuarios(){
            return $this->usuarios;
        }
        public function getPersonas(){
            return $this->personas;
        }
        public function getPagos(){
            return $this->pagos;
        }
        public function getConnection(){
            return $this->connection;
        }
       public function getDB(){
           return $this->db;
       }

    }
    $con= new Conexion();
?>