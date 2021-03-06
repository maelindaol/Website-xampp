//////////////////////////////MOSTRAR - OCULTAR CARRITO///////////////////////////////

const carritoBoton = document.querySelector('.carrito-boton');
const carritoFondo = document.querySelector('.carrito-fondo');
let carritoVisible = false;

carritoBoton.addEventListener('click', () => {
    
    carritoVisible = !carritoVisible;

    if(carritoVisible){
        carritoFondo.style.visibility = "visible";
    }
    else{
        carritoFondo.style.visibility = "hidden";
    }
});

//--------------------------------QUITAR PRODUCTOS-----------------------------------
const botonesQuitar = document.getElementsByClassName('boton-quitar');

Array.from(botonesQuitar).forEach(boton => {
    boton.addEventListener('click',removerRenglon);
});

function removerRenglon(evento) {
    evento.target.parentElement.remove()
    actualizarTotal();   
}
//-----------------------------ACTUALIZACIÓN DEL TOTAL--------------------------------
function actualizarTotal() {
    const precios = document.querySelectorAll('.renglon .precio');
    const total = document.querySelector('.total .precio-total');
    let sumaTotal = 0;

    Array.from(precios).forEach(precio => {
        sumaTotal += parseFloat(precio.innerHTML.substring(1));
    });

    total.innerHTML = '$'+sumaTotal.toFixed(2);

}

actualizarTotal();

///////////////////////Botones Agregar postre//////////////////////

const botonesAgregar = document.querySelectorAll('.producto-tarjeta .boton');
Array.from(botonesAgregar).forEach(boton=>{
    boton.addEventListener('click',evento=>{
        const nombre =evento.target.parentElement.querySelector('.nombre');
        const precio =evento.target.parentElement.querySelector('.precio');

        agregarAlCarrito(nombre.innerHTML,precio.innerHTML);
    })
});

function agregarAlCarrito(nombre, precio) {

    const productos = document.querySelector('.productos');

    let reglon=document.createElement('div');
    reglon.classList.add('renglon');
    reglon.innerHTML=
    `<p class="postre">${nombre}</p>
    <p class="precio">$${precio}</p>
    <button class="boton-quitar">Quitar</button>`;

    productos.append(reglon);

    const boton=reglon.querySelector('.boton-quitar');
    boton.addEventListener('click',removerRenglon);
    actualizarTotal();  

    alert("Producto agregado");

}

const boton=document.querySelector('.carrito-ventana .boton');
boton.addEventListener('click',()=>{
    alert('Gracias por su compra!');
    const productos=document.querySelector('.productos');

    while (productos.hasChildNodes()) {
        productos.removeChild(productos.firstChild);      
    }
    actualizarTotal();
});