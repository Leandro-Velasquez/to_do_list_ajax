const formulario = document.querySelector(".form");
formulario.addEventListener("submit", (e) => {
    e.preventDefault();

    const datosFormulario = new FormData(formulario);

    const xml = new XMLHttpRequest();

    xml.open("POST", "./class/procesar_tarea.php", true);
    xml.addEventListener("load", (e) => {
        if(xml.status == 200){
            formulario.reset();
        }
    })
    xml.send(datosFormulario);
});
