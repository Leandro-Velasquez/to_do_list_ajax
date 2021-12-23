const formulario = document.querySelector(".form");
const viewList = document.querySelector(".view-list");
formulario.addEventListener("submit", (e) => {
    e.preventDefault();

    const datosFormulario = new FormData(formulario);

    const xml = new XMLHttpRequest();

    xml.open("POST", "./class/procesar_tarea.php", true);
    xml.addEventListener("load", (e) => {
        if(xml.status == 200){
            formulario.reset();
            mostrarTareas();
        }
    });
    xml.send(datosFormulario);
});

const mostrarTareas = () => {
    const xml = new XMLHttpRequest();

    xml.open("GET", "./class/procesar_tarea.php", true);
    xml.addEventListener("load", () => {
        if(xml.status == 200){
            viewList.innerHTML = xml.responseText;
            checkTarea();
        }
    });
    xml.send();
}

mostrarTareas();

const checkTarea = () => {
    const lista = document.querySelector(".lista");
    lista.addEventListener("click", (e) => {
        if(e.target.className == "fas fa-check"){            
            const xml = new XMLHttpRequest();
            xml.open("POST", "./class/procesar_tarea.php", true);
            xml.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xml.addEventListener("load", () => {
                mostrarTareas();
            })
            xml.send("tareaRealizada=true&id=" + e.target.parentElement.children[0].id);
        }
    })
}

const aplicarFiltro = () => {
    const radioTareasPendientes = document.getElementById("tareas-pendientes");
    const radioTareasRealizadas = document.getElementById("tareas-realizadas");
    const buttonFiltro = document.querySelector(".opciones-vista__button");
    buttonFiltro.addEventListener("click", () => {
        if(radioTareasRealizadas.checked == true){
            const xml = new XMLHttpRequest();
            xml.open("POST", "./class/procesar_tarea.php", true);
            xml.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xml.addEventListener("load", () => {
                viewList.innerHTML = xml.responseText;
            })
            xml.send(`mostrarTareasRealizadas=${radioTareasRealizadas.checked}`);
        }
        else{
            const xml = new XMLHttpRequest();
            xml.open("POST", "./class/procesar_tarea.php", true);
            xml.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xml.addEventListener("load", () => {
                viewList.innerHTML = xml.responseText;
            })
            xml.send(`mostrarTareasPendientes=${radioTareasPendientes.checked}`);
        }
    })
}
aplicarFiltro();