<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form method="post" action="paginaCambiada.php" >
        <p>Escribe un texto: </p>
        <input type="text" name="texto">
    
        <p>Elije un color: </p>
        <input type="color" name="color"/>

    <div>
        <p>Fuente de letra: </p>
        <label><input type="radio"  name = "fuente" value="Arial">Arial</label><br>
        <label><input type="radio"  name = "fuente" value="Courier">Courier</label>
        <label><input type="radio"  name = "fuente" value="Verdana">Verdana</label>
        <label><input type="radio"  name = "fuente" value="Times New Roman">Times New Roman</label>
    </div>


        <p>Tamaño: </p>
        <input type="text" name="tamanyo" maxlength="3" size="3"/>

        <p>¿Guardar información?</p>
        <label><input type="checkbox" name="sino" id="sino">Sí</label>
        <br>
        <input type="submit" name="submit" value="Submit"/>
    </form>
    
<?php
    session_start();
    $total = $_SESSION['count']+=1;
    echo "Visitas: ".$total;
?>

<?php include "creador.php"; ?>
</body>
</html>