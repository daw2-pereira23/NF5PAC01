<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db( $db,'moviesite') or die(mysqli_error($db));

$action = $_GET['action'];
$type = $_GET['type'];


if($action == 'add' ){
    echo "emporela";
    $people_fullname = '';
    $people_isactor = 0;
    $people_isdirector = 0;
    

}

if ( $action == 'edit') {
    echo "editando";
    $id = $_GET['id'];
    //retrieve the record's information 
    $query = 'SELECT
            people_fullname, people_isactor, people_isdirector
        FROM
            people
        WHERE
            people_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
    $query = 'SELECT
    people_isactor
    FROM
        people
    WHERE
        people_id = ' . $_GET['id'];
    $result2 = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result2));
    $id = $_GET['id'];
    $query = 'SELECT
        people_isdirector
    FROM
        people
    WHERE
        people_id = ' . $_GET['id'];
    $result3 = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result3));
    

} 


if($action == 'edit'){
    echo "editando2";
    $formulario = 'people_id='.$id;
}

if($action == 'add'){
    echo $action;
    $formulario = '';
}

$tabla = <<<ENDHTML
    <html>
<head>
  <title><?php echo ucfirst($action); ?>People</title>
 </head>
 <body>
 
ENDHTML;
 
$tabla .= <<<ENDHTML
 <form action="commit.php?accion=$action&type=$type&$formulario" method="post"'>

   <table>
    <tr>
        <td>People Full Name</td>
        <td><input type="text" name="people_fullname" value="$people_fullname"/></td>
        <td>
            <label for="people_isactor">Marca la Casilla si es un actor</label>
ENDHTML;
        if($people_isactor=='1'){
$tabla .= <<<ENDHTML
            <input type='checkbox' name=people_isactor checked='checked'>
        ENDHTML;
        }else{
$tabla .= <<<ENDHTML
          <input type='checkbox' name=people_isactor>
        ENDHTML;
}
$tabla .= <<<ENDHTML
        </td>
        <td>
            <label for="people_isdirector">Marca la Casilla si es un director</label>
ENDHTML;
        if($people_isdirector=='1'){
$tabla .= <<<ENDHTML
            <input type='checkbox' name=people_isdirector checked='checked'>
ENDHTML; 
        }else{     
$tabla .= <<<ENDHTML
            <input type='checkbox' name=people_isdirector>;
            ENDHTML;
        }
        

$tabla .= <<<ENDHTML
        </td>
        </tr><tr>
    </tr>
    
   </table>
   <input type="submit" name="submit" value="Enviar Datos">
</form>
 </body>
</html>
ENDHTML;


echo $tabla;


?>

