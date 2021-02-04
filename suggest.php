<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "word_database";
$a = htmlspecialchars($_POST['2']);

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
	  echo "<p>Your word is correct</p>";
	  $z=1;
	  break;
	  }
	  if(number_format($sim, 0)>=82&&number_format($sim, 0)<100){
        $word = $row['word']; 
        print "<p>Did you mean to type &quot;".$word."&quot;</p>"; 
		$z=1;
		break;
       }
       else if(number_format($sim, 0) < 82){
		   $z=0;
		 continue;
	}	   
}
$result = $conn->query($sql);
if($z==0){
	echo "<p>Could not find a suggestion for the word</p>";
}}	
?>