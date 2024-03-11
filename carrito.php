<?php
echo '<script>alert("carrito de compras")</script>';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
</head>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        //variables
        const baseDeDatos = [
            {
                id: 1,
                nombre: 'xbox series x',
                precio: 8000,
                imagen: 'https://cdn1.smartprix.com/rx-iakBq55Vm-w1200-h1200/microsoft-xbox-serie.jpg'
            },
            {
                id: 2,
                nombre: 'xbox series s (Carbon Black)',
                precio: 10000,
                image: 'https://t2.tudocdn.net/671728?w=1920'
            },
            {
                id: 3,
                nombre: 'xbox series s',
                precio: 7000,
                image: 'https://d660b7b9o0mxk.cloudfront.net/_img_productos/xbox-series-s-512gb-all-digital-foto1.jpg'
            },
            {
                id: 4,
                nombre: 'PlayStation 5 Slim',
                precio: 12000,
                image: 'https://cdn.exputer.com/wp-content/uploads/2023/10/PS5-Slim-vs.-PS5-Fat.jpg'
            },
            {
                id: 5,
                nombre: 'PlayStation 5 Slim digital',
                precio: 9200,
                image: 'https://th.bing.com/th/id/OIP.ecoaTE6S6m3LFTwJCnRH5wAAAA?rs=1&pid=ImgDetMain'
            },
            {
                id: 6,
                nombre: 'PlayStation 5',
                precio: 12000,
                image: 'https://th.bing.com/th/id/R.fa7a969e9a811210c64da337fa8385bd?rik=h%2fLuq6eKY37kGg&pid=ImgRaw&r=0'
            },
            {
                id: 7,
                nombre: 'PlayStation 5 Digital',
                precio: 16000,
                image: 'https://titanprocurementlimited.com/wp-content/uploads/2020/10/61JbCra7GL._SL1500_.jpg'
            },
            {
                id: 8,
                nombre: 'Nintendo Switch OLED',
                precio: 15700,
                image: 'https://cdn02.nintendo-europe.com/media/images/08_content_images/systems_5/nintendo_switch_3/nintendo_switch_oled/CI_NSwitch_main.jpg'
            },
            {
                id: 9,
                nombre: 'Nintendo Switch',
                precio: 8000,
                image: 'https://th.bing.com/th/id/OIP.XCCok6ApjGjDhiGkxt7wsQHaEF?rs=1&pid=ImgDetMain'
            },
            {
                id: 10,
                nombre: 'Nintendo Switch lite',
                precio: 3000,
                image: 'https://techcrunch.com/wp-content/uploads/2019/08/CMB_7883.jpg?resize=680'
            }
        ];

        let carrito = [];
        const divisa = '$';
        const DOMitems = document.querySelector('#items');
        const DOMcarrito = document.querySelector('#carrito');
        const DOMtotal = document.querySelector('#total');
        const DOMbotonVaciar = document.querySelector('#boton-vaciar');

        //funciones
        function renderizarProductos(){
            baseDeDatos.forEach((info) => {
                //estructura
                const miNodo = document.createElement('div');
                miNodo.classList.add('card','col-sm-4');
                //body
                const miNodoCardBody = document.createElement('div');
                miNodoCardBody.classList.add('card-body');
                //titulo
                const miNodoTitle = document.createElement('h5');
                miNodoTitle.classList.add('card-title');
                miNodoTitle.textContent = info.nombre;
                //imagen
                const miNodoImagen = document.createElement('img');
                miNodoImagen.classList.add('img-fluid');
                miNodoImagen.setAttribute('src', info.imagen);
                //precio
                const miNodoPrecio = document.createElement('p');
                miNodoPrecio.classList.add('card-text');
                miNodoPrecio.textContent = `${info.precio}${divisa}`;
                //boton
                const miNodoBoton = document.createElement('button');
                miNodoBoton.classList.add('btn', 'btn-primary');
                miNodoBoton.textContent = '+';
                miNodoBoton.setAttribute('marcador', info.id);
                miNodoBoton.addEventListener('click', anyadirProductoAlCarrito);
                //Insertamos
                miNodoCardBody.appendChild(miNodoImagen);
                miNodoCardBody.appendChild(miNodoTitle);
                miNodoCardBody.appendChild(miNodoPrecio);
                miNodoCardBody.appendChild(miNodoBoton);
                miNodo.appendChild(miNodoCardBody);
                DOMitems.appendChild(miNodo);
            });
        }
        function anyadirProductoAlCarrito(evento){
            carrito.push(evento.target.getAttribute('marcado'))
            renderizarCarrito();
        }
        function renderizarCarrito(){
            DOMcarrito.textContent = ' ';
            const carritoSinDuplicados = [...new Set(carrito)];
            carritoSinDuplicados.forEach((item) =>{
                const miItem = baseDeDatos.filter((itemBaseDatos) =>{
                    return itemBaseDatos.id === parseInt(item);
                });
                const numeroUnidadesItem = carrito.reduce((total, itemId) => {
                    return itemId === item ? total += 1 : total;
                }, 0);
                const miNodo = document.createElement('li');
                miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}${divisa}`;
                //Boton de borrar
                const miBoton = document.createElement('button');
                miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                miBoton.textContent = 'X';
                miBoton.style.marginLeft = '1rem';
                miBoton.dataset.item = item;
                miBoton.addEventListener('click', borrarItemCarrito);
                miNodo.appendChild(miBoton);
                DOMcarrito.appendChild(miNodo);
            });
            DOMtotal.textContent = calculatorTotal();
        }

        function borrarItemCarrito(evento){
            const id = evento.target.dataset.item;
            carrito = carrito.filter((carritoId) => {
                return carritoId !== id;
            });
            renderizarCarrito();
        }

        function calcularTotal(){
            return carrito.reduce((total, item) => {
                const miItem = baseDeDatos.filter((itemBaseDatos) => {
                    return itemBaseDatos.id === parseInt(item);
                });
                return total + miItem[0].precio;
            }, 0).toFixed(2);
        }

        function vaciarCarrito(){
            carrito = [];
            renderizarCarrito();
        }

        DOMbotonVaciar.addEventListener('click', vaciarCarrito);

        renderizarProductos();
        renderizarCarrito();
    });
</script>
</head>
<body>
    <div class="container">
            <div class="row">
                <main id="items" class="col-sm-8 row"></main>
                    <aside class="col-sm-4">
                        <h2>Carrito</h2>
                        <ul id="carrito" class=""list-group></ul>
                        <hr>
                        <p class="text-right">Total: <span id = "total"></span>&peso;</p>
                        <button id="boton-vaciar" class="btn btn-danger">Vaciar</button>
                    </aside>
            </div>
    </div>            
</body>
</html>
