<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "word_database";
$a = htmlspecialchars($_POST['1']);

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
$words=array();
$a=strtolower($a);
$words = (explode(" ",$a));
$length=count($words);
$z=0;
$sql = "SELECT word FROM word_list";
$result = $conn->query($sql);

for($i=0;$i<$length;$i++){
	echo "<h3>".($i+1)." : ".$words[$i]."</h3>";
while ($row = mysqli_fetch_assoc($result)) { 
      similar_text(strtolower($words[$i]), strtolower($row['word']), $sim); 
      if (number_format($sim, 0) == 100){ 
	  echo "<p>Your word is correct</p><br>";
	  $z=1;
	  break;
	  }
	  else if(number_format($sim, 0) != 100){
		  $z=0;
		 continue;
	}
}
$result = $conn->query($sql);
if($z==0){
	echo "<p>Your word is not correct</p><br>";}
}
echo "<h4>To get suggestions for your incorrect words, login to our website</h4>"; 
echo "<a href='signup.php'><img src=\"Images/signup.jpg\" alt=\"Sign Up\" height=\"50\" width=\"150\"></a>";
echo "<a href='login.php'><img src=\"Images/login.jpg\" alt=\"Login\" height=\"50\" width=\"150\"></a>";
?>