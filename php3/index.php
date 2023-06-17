<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="php.css">
<body>
    <p class="p">bienvenido a mi examen</p>
    
    <?php
   $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
   $conexion = new PDO('mysql:host=localhost;dbname=final_0907_23_21839','root', '' ,$pdo_options );

       if(isset($_POST["accion"])){
        //echo "quieres " . $_POST["accion"]; 
        if ($_POST["accion"]=="crear"){
            $insert = $conexion->prepare("INSERT INTO producto (codigo, nombre, precio, existencia) VALUES (:codigo, :nombre, :precio, :existencia)");
            $insert->bindValue('codigo', $_POST['codigo']);
            $insert->bindValue('nombre', $_POST['nombre']);
            $insert->bindValue('precio', $_POST['precio']);
            $insert->bindValue('existencia', $_POST['existencia']);
            $insert->execute();
        }
    }
    if(isset($_POST["accion"])){
        //echo "quieres " . $_POST["accion"]; 
        if ($_POST["accion"]=="editado"){
            $update = $conexion->prepare("UPDATE producto SET nombre=:nombre, precio=:precio, existencia=:existencia WHERE codigo=:codigo");
            $update->bindValue('codigo', $_POST['codigo']);
            $update->bindValue('nombre', $_POST['nombre']);
            $update->bindValue('precio', $_POST['precio']);
            $update->bindValue('existencia', $_POST['existencia']);
            $update->execute();
            header("Refresh:0");
        }
    }
    $select = $conexion->query("SELECT codigo, nombre, precio, existencia FROM producto") ;
  
     ?>
     <?php if(isset($_POST["accion"]) && $_POST["accion"] == "editar"){  ?>
        <form   clmethod="POST" >
            <input type="text" name="codigo" value="<?php echo $_POST["codigo"] ?>" placeholder="ingrese el codigo"/>
            <input type="text" name="nombre" placeholder="ingrese el nombre"/>
            <input type="text" name="precio" placeholder="ingrese el precio"/>
            <input type="text" name="existencia" placeholder="ingrese la existencia"/>
            <input type="hidden" name="accion" value="editado"/>
            <button type="submit">guardar</button>
        </form>
    <?php }  else {?>
        <form method="POST">
            <input type="text" name="codigo" placeholder="ingrese el codigo"/>
            <input type="text" name="nombre" placeholder="ingrese el nombre"/>
            <input type="text" name="precio" placeholder="ingrese el precio"/>
            <input type="text" name="existencia" placeholder="ingrese la existencia"/>
            <input type="hidden" name="accion" value="crear"/>
            <button  type="submit" class="boton">crear</button>
        </form>
    <?php } ?>

     <table border="1">
        <thead>
            <tr>






    
</body>
</html>