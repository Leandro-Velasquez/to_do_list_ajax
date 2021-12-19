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
        }
    });
    xml.send();
}

mostrarTareas();