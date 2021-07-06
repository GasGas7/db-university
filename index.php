<?php

# 1. Definire le costanti per la connessione
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root"); 
define("DB_PASSWORD", "root"); 
define("DB_NAME", "university"); 
define('DB_PORT', '3306');


//var_dump(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);


# 2. Stabiliamo connessione con il database
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
//var_dump($connection);


# 3. Verifichare la connessione
if ($connection && $connection->connect_error) {
  echo "Connection failed: " . $connection->connect_error;
  die();
}
# 4. Eseguiamo una query se la connesione é stata stabilita
echo 'Connection Successful, go go go!';

$statement = $connection->prepare("INSERT INTO `students` (`name`) VALUES (?)");
$statement->bind_param("iss", $name);
$name = "Fabio";
$statement->execute();
var_dump($statement);

$results = $connection->query("SELECT * FROM `students`;");
if ($results && $results->num_rows > 0) {
  var_dump($results);
  while ($row = $results->fetch_assoc()) {
    var_dump($row);
  }
} elseif ($results) {
  # code...
  echo "0 Results";
} else {
  echo "Query Error";
}


/* 
$name = $_GET['name'];
$sql = "SELECT * FROM `students` WHERE `name` = '" . $name . "';";
var_dump($sql);
$results = $connection->query($sql);

var_dump($results);


if ($results && $results->num_rows > 0) {
  // Cicliare tra i risultati e mostraiamoli a schermo
  //var_dump($results->fetch_assoc());
  while ($student = $results->fetch_array()) {
?>
    <h1><?= $student['name']; ?></h1>
<?php
  }
} elseif ($results) {
  echo 'Nessun Risultato';
} else {
  echo 'Errore nella query';
} */

# 6. Chiudi la connessione
$connection->close();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL Injection</title>
</head>

<body>

  <form action="#" method="get">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Type a name" aria-describedby="nameHelper">
      <small id="nameHelper" class="text-muted">Type a name or sql inject me!</small>
    </div>
  </form>

</body>

</html>