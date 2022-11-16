<?php
//connect to mysqli
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

// make sure you're using the right database
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// retrieve information
$query = 'SELECT
        movie_id, movie_name, movie_year, movie_director,
        movie_leadactor, movie_type
    FROM
        movie
    ORDER BY
        movie_name ASC';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

$table = <<<ENDHTML
<div style="text-align: center;">
 <h2>Movie Review Database</h2>
 <table border="1" cellpadding="2" cellspacing="2"
  style="width: 70%; margin-left: auto; margin-right: auto;">
  <tr>
   <th><a href="06llistat.php?FirstName=true">FirstName</th>
   <th>LastName</th>
   <th>Addres</th>
   <th>City</th>
   <th>Age</th>
  </tr>
ENDHTML;

// loop through the results
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
    $director = get_director($movie_director);
    $leadactor = get_leadactor($movie_leadactor);
    $movietype = get_movietype($movie_type);

    $table .= <<<ENDHTML
    <tr>
     <td><a href="N3P308details.php?movie_id=$movie_id">$movie_name</a></td>
     <td>$movie_year</td>
     <td>$director</td>
     <td>$leadactor</td>
     <td>$movietype</td>
    </tr>
ENDHTML;
}

$table .= <<<ENDHTML
 </table>
<p>$num_movies Movies</p>
</div>
ENDHTML;

echo $table;
?>




<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'examen') or die(mysqli_error($db));

$query = 'SELECT
        FirstName, LastName, Addres, City, Age
    FROM
        usuari';

$result = mysqli_query($db,$query) or die(mysqli_error($db));


while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	
    echo '<tr>';
    echo '<td>' . $FirstName . '</td>';
    echo '<td>' . $LastName . '</td>';
    echo '<td>' . $Addres . '</td>';
    echo '<td>' . $City . '</td>';
    echo '<td>' . $Age . '</td>';
    echo '</tr>';
}