<?php
    $alert = "Registrarse";
    echo "<script type='text/javascript'>alert('$alert');</script>";
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
    .logo{
        text-align: left;
    }
    .logo1{
        text-align: right;
        margin-top: -150px;
    }
    select{
        margin-bottom: 10px;
        margin-top: 10px; 
        font-family: cursive, sans-serif;
        outline: 0;
        background: #2ecc71;
        color: #fff;
        border: 1px solid crimson;
        padding: 4px;
        border-radius: 9px
    }
    body{
        background: rgb(128,128,128);
        text-align: left;
        font-size: 20px;
        font-family: Arial;
    }
    .content{
        text-align: left;
        border: 2px solid white;
        background-color: black;
        height:300px;
        width:250px;
        border-radius:2em;
    }
</style>
<body>
    <div class="logo">
        <img src="https://th.bing.com/th/id/R.66ed710b6eea83b6318eac012d00b895?rik=eSUujkoiHfByHg&pid=ImgRaw&r=0" height="150px" width="150px">
    </div>
    <div class="logo1">
        <img src="https://th.bing.com/th/id/R.0c1aa4b4604477699b19fe30bbc31e2e?rik=Gz0yTO8hKzj0Cg&riu=http%3a%2f%2f3.bp.blogspot.com%2f-f95KcV8jNhQ%2fT80lRb3Ss0I%2fAAAAAAAAAAg%2f26tRs1RuKXM%2fs1600%2fescom_logo.jpg&ehk=9p%2b10xgcmPl4aDL8%2fG6IzAopIcU1ACqK8dn6n19leLc%3d&risl=&pid=ImgRaw&r=0" height="150px" width="150px">
    </div>
    <div class="content">
        <br>
            <ul>
                <li><a href="doctores.php">Doctores</a></li>
                <li><a href="consultorios.php">Consultorios</a></li>
                <li><a href="pacientes.php">Pacientes</a></li>
                <li><a href="citas.php">Citas</a></li>
                <li><a href="extras.php">Servicios extras</a></li>
                <li><a href="farmacia.php">Farmacia</a></li>
                <li><a href="tickets.php">Tickets</a></li>
                <li><a href="historial.php">Historial medico</a></li>
            </ul>
    </div>
    <a href="index.php" bgcolor="white">back</a>
</body>
</html>
