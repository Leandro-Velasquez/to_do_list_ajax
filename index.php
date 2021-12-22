<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="css/styles.css?9">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="to-do">
        <form class="form" method="POST">
            <input class="form__input-text" name="tarea" type="text" autocomplete="off">
            <input class="form__input-button" type="submit" value="Agregar">
        </form>
        <div class="opciones-vista">
            <div>
                <input id="tareas-pendientes" class="opciones-vista__radio" name="ver-tareas" type="radio" checked>
                <label class="opciones-vista__label" for="tareas-pendientes">Tareas pendientes</label>
                <input id="tareas-realizadas" class="opciones-vista__radio" name="ver-tareas" type="radio">
                <label class="opciones-vista__label" for="tareas-realizadas">Tareas realizadas</label>
            </div>
            <input class="opciones-vista__button" type="submit" value="Aplicar filtro">
        </div>
        <div class="view-list">
            
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>