<?php
    $medidaTicket = 180;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Proyecto de base de datos"/>
    <meta name="author" content="Veruete Hernandez Bryan David"/>
    <meta name="author" content="Tadeo Martínez Xiadani Alexahyatt "/>
    <meta name="author" content="Reyes León José Ramón "/>
    <meta name="keywords" content="HTML, CSS, JS, SQL, PHP"/>
    <title>resepcionista</title>
</head>
<style>
    *{
        font-size: 12px;
        font-family: 'DejaVu Sans', serif;
    }
    h1{
        font-size: 18px;
    }
    .ticket{
        margin: 2px;
    }
    td, th, tr table{
        border-top: 1px solid black;
        border-collapse: collapse;
        margin: 0 auto; 
    }
    td.precio{
        text-align: right;
        font-size: 11px;
    }
    td.cantidad{
        font-size: 11px;
    }
    td.producto{
        text-align: center;
    }
    th{
        text-align: center;
    }
    .centrado{
        text-align: center;
        align-content: center;
    }
    .ticket{
        width: <?php echo $medidaTicket ?>px;
        max-width: <?php echo $medidaTicket ?>px;
    }
    img{
        max-width: inherit;
        width: inherit;
    }
    * {
        margin: 0;
        padding: 0;
    }
    .ticket{
        margin: 0;
        padding: 0;
    }
    body{
        text-align: center;
    }
</style>
<body>
    <div class="tecket centrado">
        <h1>Clinica IPN</h1>
        <h2>Ticket de venta #1</h2>
        <h2>2024-03-13 01:16:51</h2>
        <?php
              $productos = [
                [
                    "cantidad" => 1,
                    "descripcion" => "Rosel",
                    "precio" => 60,
                ],
                [
                    "cantidad" => 2,
                    "descripcion" => "BioElectro",
                    "precio" => 150,
                ],
                [
                    "cantidad" => 2,
                    "descripcion" => "Parasetamol",
                    "precio" => 50,
                ],
                [
                    "cantidad" => 1,
                    "descripcion" => "terramisina",
                    "precio" => 20,
                ],
            ];
        ?>
        <table>
            <thead>
                <tr class="centrado">
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">$</th>
                </tr>   
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    foreach ($productos as $producto) {
                        $total += $producto["cantidad"] * $producto["precio"];
                ?>
                    <tr>
                        <td class="cantidad"><?php echo number_format($producto["cantidad"], 2) ?></td>
                        <td class="producto"><?php echo $producto["descripcion"]?></td>
                        <td class="precio">$<?php echo number_format($producto["precio"], 2) ?></td>
                    </tr>
                <?php } ?>    
            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</stroong>
                </td>
                <td class="precio">
                    $<?php echo number_format($total, 2) ?>
                </td>
            </tr>
        </table>
        <p class="centrado">
            !ESPERAMOS SU MEJORA!
        </p>
    </div>    
    <button onclick="imprimir();">Imprimir</button>
    <script>
        function imprimir(){
            window.print();
        }
    </script>
    <a href="resepcionista.php">regresar</a>
</body>
</html>
