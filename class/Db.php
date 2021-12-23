<?php
    class Db {

        private $pdo;

        public function __construct()
        {
            try{
                $this->pdo = new PDO("mysql:host=localhost:3307;dbname=todolistdb;", "root", "");
            }
            catch(PDOException $e){
                die("Error al conectar con la base de datos: " . $e->getMessage());
            }catch(Exception $e){
                die("Error generico: " . $e->getMessage());
            }
        }

        public function agregarTarea($tarea){
            $sql = $this->pdo->prepare("INSERT INTO to_do_list_table(tarea, tarea_hecha) VALUES (:tarea, 0)");

            $sql->bindParam(":tarea", $tarea, PDO::PARAM_STR);

            $sql->execute();
        }

        public function eliminarTarea($id){
            $sql = $this->pdo->prepare("DELETE FROM to_do_list_table WHERE id=:id");

            $sql->bindParam(":id", $id);

            $sql->execute();
        }

        public function tareaRealizada($id){
            $sql = $this->pdo->prepare("UPDATE to_do_list_table SET tarea_hecha=1 WHERE id=:id");

            $sql->bindParam(":id", $id, PDO::PARAM_INT);

            $sql->execute();
        }

        public function mostrarTareasPendientes(){
            $sql = $this->pdo->query("SELECT id, tarea FROM to_do_list_table WHERE tarea_hecha=0");

            $tareas =  $sql->fetchAll(PDO::FETCH_ASSOC);

            return $this->armarStringTareasPendientes($tareas);
        }

        public function armarStringTareasPendientes($tareas){
            if(count($tareas) > 0){
                $cadena = null;
                $cadena = '<ul class="lista">';
                for($i = 0; $i < count($tareas); $i++){
                    $id = null;
                    $cadena .= '<li class="lista__li">';
                    foreach($tareas[$i] as $key => $value){
                        if($key == "id"){
                            $id = $value;
                        }
                        if($key == "tarea"){
                            $cadena .= '<p id=' . $id . ' class="tarea-no-realizada">' . $value . '</p>' . '<i class="fas fa-check"></i>';
                        }
                    }
                    $cadena .= "</li>";
                }
                $cadena .= "</ul>";
                return $cadena;
            }
            else{
                return null;
            }
        }

        public function mostrarTareasRealizadas(){
            $sql = $this->pdo->query("SELECT id, tarea FROM to_do_list_table WHERE tarea_hecha=1");

            $tareas =  $sql->fetchAll(PDO::FETCH_ASSOC);

            return $this->armarStringTareasRealizadas($tareas);
        }

        public function armarStringTareasRealizadas($tareas){
            if(count($tareas) > 0){
                $cadena = null;
                $cadena = '<ul class="lista">';
                for($i = 0; $i < count($tareas); $i++){
                    $id = null;
                    $cadena .= '<li class="lista__li">';
                    foreach($tareas[$i] as $key => $value){
                        if($key == "id"){
                            $id = $value;
                        }
                        if($key == "tarea"){
                            $cadena .= '<p id=' . $id . ' class="tarea-no-realizada">' . $value . '</p>' . '<i class="fas fa-check disableButton"></i>';
                        }
                    }
                    $cadena .= "</li>";
                }
                $cadena .= "</ul>";
                return $cadena;
            }
            else{
                return null;
            }
        }
    }
?>