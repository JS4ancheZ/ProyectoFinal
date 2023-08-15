<?php
    class Database { 
        public $db;   // handle of the db connexion    
        private static $dns = "mysql:host=localhost;dbname=colegio"; 
        private static $user = "root"; 
        private static $pass = "";     
        private static $instance;

        public function __construct ()  
        {        
            $this->db = new PDO(self::$dns,self::$user,self::$pass);       
        } 

        // Se crea la instancia de la clase Database.
        // Se instancia la clase para iniciarla y poder acceder a las propiedades.
        public static function getInstance()
        { 
            if(!isset(self::$instance)) 
            { 
                $object= __CLASS__; 
                self::$instance=new $object; 
            } 
            return self::$instance; 
        } 


      
        public function DatosEstudiantes() { 
            $conexion = Database::getInstance(); 
            $sql  ="SELECT id,nombres,apellidos,email,telefono,identificacion,fnacimiento,direccion from estudiantes ";
            $result = $conexion->db->prepare($sql);    
            $result->execute(); 
            return $result; 
        } 

        public function CrearEstudiante($nombres,$apellidos,$email,$telefono,$identificacion,$fnacimiento,$direccion) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO estudiantes (nombres,apellidos,email,telefono,identificacion,fnacimiento,direccion) VALUES (:nombres,:apellidos,:email,:telefono,:identificacion,:fnacimiento,:direccion)");
                $result->execute(
                                    array(
                                        ':nombres'=>$nombres,
                                        ':apellidos'=>$apellidos,
                                        ':email'=>$email,
                                        ':telefono'=>$telefono,
                                        ':identificacion'=>$identificacion,
                                        ':fnacimiento'=>$fnacimiento,
                                        ':direccion'=>$direccion
                                    )
                                );
                return "2";
            } catch(PDOException $e) {
                return "0";
            }
        }

        public function editEstudiante($id) { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,nombres,apellidos,email,telefono,identificacion,fnacimiento,direccion from estudiantes where id=:id"; 
            $result = $conexion->db->prepare($sql);     
            $params = array("id" => $id); 
            $result->execute($params);
            return $result; 
        } 

        public function updateEstudiante($id,$nombres,$apellidos,$email,$telefono,$identificacion,$fnacimiento,$direccion) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("UPDATE estudiantes set nombres=:nombres,apellidos=:apellidos,email=:email,telefono=:telefono,identificacion=:identificacion,fnacimiento=:fnacimiento,direccion=:direccion where id=:id ");
                $result->execute(
                                    array(
                                        ':nombres'=>    $nombres,
                                        ':apellidos'=>  $apellidos,
                                        ':email'=>      $email,
                                        ':telefono'=>   $telefono,
                                        ':identificacion'=>$identificacion,
                                        ':fnacimiento'=>$fnacimiento,
                                        ':direccion'=>$direccion,
                                        ':id'=>$id
                                    )
                                );
                return "3";
            } catch(PDOException $e) {
                return "0";
            }
        }
        
        public function EliminarEstudiante($id){
            try{
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("DELETE FROM estudiantes WHERE id=?");
                $result->execute(array($id));

                return "1";
            }catch (PDOException $e) {
                return "0";
            }
        }


        public function DatosMaterias() { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,nombre,horario,docente,descripcion from materias"; 
            $result = $conexion->db->prepare($sql);    
            $result->execute(); 
            return $result; 
        } 

        public function EliminarMateria($id){
            try{
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("DELETE FROM materias WHERE id=?");
                $result->execute(array($id));

                return "1";
            }catch (PDOException $e) {
                return "0";
            }
        }

        public function CrearMateria($nombre,$horario,$docente,$descripcion) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("INSERT INTO materias (nombre,horario,docente,descripcion) VALUES (:nombre,:horario,:docente,:descripcion)");
                $result->execute(
                                    array(
                                        ':nombre'=>$nombre,
                                        ':horario'=>$horario,
                                        ':docente'=>$docente,
                                        ':descripcion'=>$descripcion
                                    )
                                );
                return "2";
            } catch(PDOException $e) {
                return "0";
            }
        } 

        public function editMateria($id) { 
            $conexion = Database::getInstance(); 
            $sql="SELECT id,nombre,horario,docente,descripcion from materias where id=:id"; 
            $result = $conexion->db->prepare($sql);     
            $params = array("id" => $id); 
            $result->execute($params);
            return $result; 
        } 

        public function updateMateria($nombre,$horario,$docente,$descripcion,$id) { 

            try {
                $conexion = Database::getInstance(); 
                $result = $conexion->db->prepare("UPDATE materias set nombre=:nombre, horario=:horario, docente=:docente, descripcion=:descripcion where id=:id ");
                $result->execute(
                                    array(
                                        ':nombre'=>$nombre,
                                        ':horario'=>$horario,
                                        ':docente'=>$docente,
                                        ':descripcion'=>$descripcion,
                                        ':id'=>$id
                                    )
                                );
                return "3";
            } catch(PDOException $e) {
                return "0";
            }
        }
        

    }

?>