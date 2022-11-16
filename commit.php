<?php
$name = $_POST['people_fullname'];

echo $_GET['accion'];


if(isset($_POST['people_isactor'])){
    $actor = $_POST['people_isactor'];
}else{
    $actor = "off";
}

if(isset($_POST['people_isdirector'])){
    $director = $_POST['people_isdirector'];
}else{
    $director = "off";
}


if($director=="on"){
    $director = 1;
}else{
    $director = 0;
}

if($actor=="on"){
    $actor = 1;
} else{
    $actor = 0;
}

?>
<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php


switch ($_GET['accion']) {                                                                                                                            
case 'add':
    switch ($_GET['type']) {
    
    case 'movie':
        $query = 'INSERT INTO
            movie
                (movie_name, movie_year, movie_type, movie_leadactor,
                movie_director)
            VALUES
                ("' . $name . '",
                 ' . $_POST['movie_year'] . ',
                 ' . $_POST['movie_type'] . ',
                 ' . $_POST['movie_leadactor'] . ',
                 ' . $_POST['movie_director'] . ')';
    break;
        case 'people':
            $query = 'INSERT INTO people
                (people_fullname, people_isactor, people_isdirector)
            VALUES
                ("'. $name . '",
                ' . $actor .',
                ' . $director . ')'  ;
    break;
    }
    break;
    
case 'edit':
    switch ($_GET['type']) {
    
    case 'movie':
        $query = 'UPDATE movie SET
                people_fullname = "' . $_POST['people_fullname'] . '",
                movie_year = ' . $_POST['movie_year'] . ',
                movie_type = ' . $_POST['movie_type'] . ',
                movie_leadactor = ' . $_POST['movie_leadactor'] . ',
                movie_director = ' . $_POST['movie_director'] . '
            WHERE
                movie_id = ' . $_POST['movie_id'];
        break;
    case 'people':
        $query = 'UPDATE people SET
            people_fullname = "'. $name . '",
            people_isactor = ' . $actor .',
            people_isdirector = ' . $director . '
        WHERE
            people_id = ' .$_GET['people_id'];
    break;
                
break;
}

}

if (isset($query)) {
   echo $result = mysqli_query($db, $query) or die(mysqli_error($db));
}

?>
  <p>Hecho!</p>
  <a href="admin.php">Pulsa aqui para volver al menu principal</a>
 </body>
</html>
