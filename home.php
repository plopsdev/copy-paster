<!DOCTYPE html>
<html>
<body>

<h1>Web app</h1>
<p>This website is connected to a MySQL database. It retrieves a list of products.</p>
<?php
session_start ();

// Database configuration
$host = "127.0.0.1";
$username = "root";
$password = "root";
$database_name = "network_security";

$mysqli = new mysqli($host,$username,$password,$database_name);

if ($mysqli->connect_errno) {
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    die();
}

$query = 'SELECT * from products';
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        print "<p>".$row['name']."</p>";
    }
} else {
    print "Aucun résultat";
    print "<br/>";
    print $query;
}
$mysqli->close();
?>

</body>
</html>