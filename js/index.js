
document.addEventListener("DOMContentLoaded", () => {
//Ejecuta este código solamente cuando la página ya terminó de cargar el HTML
    console.log("pedido.js cargado");

    document.getElementById("generarPedido").addEventListener("click", () => {

        console.log("Click");

        window.location.href = "pedido.php";

    });

});