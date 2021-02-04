<?php

$q = $_REQUEST["q"];
$servername = "localhost";
$username = "root";
$password = "";
$db = "word_database";

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT word FROM word_list WHERE word LIKE '".$q."%'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
       echo $row['word']." , ";

}
mysqli_close($conn);
?>