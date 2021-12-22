<?php
    include "Db.php";

    $db = new Db();

    if(isset($_POST["tarea"])){
        $db->agregarTarea($_POST["tarea"]);
        echo $db->mostrarTareasPendientes();
    }
    else if(isset($_POST["tareaRealizada"]) && $_POST["tareaRealizada"] == true){
        $db->tareaRealizada($_POST["id"]);
    }
    else if(isset($_POST["mostrarTareasRealizadas"])){
        echo $db->mostrarTareasRealizadas();
    }
    else{
        echo $db->mostrarTareasPendientes();
    }
?>