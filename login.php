<!DOCTYPE html>
<html>
<head><title>Login</title>
<style>
body {background-image: url("Images/2.jpg");
 background-size:     cover; 
 background-position: center center; }
 
input{
padding: 8px;
border: 2px solid black;
width:300px;
}  
input[type=submit]{
padding: 8px;
border: 2px solid black;
width:150px;
    text-align:center;
} 
</style>
</head>
<body>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<h1>-----------Login-----------</h1>
<input type="text" name="user" placeholder="username" required><br>
<input type="password" name="pass" placeholder="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 3 or more characters" required><br>
<br><input type="submit" value="submit" name="submit">
</form>
</center>
<?php  session_start(); ?> 
<?php
if(isset($_SESSION['use'])) 
 {
    header("Location:user.php"); 
 }
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
$db = "word_database";

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 

$a = htmlspecialchars($_POST['user']);
$b = htmlspecialchars($_POST['pass']);

$x=0;
$sql = "SELECT username, password FROM signup";
$result = $conn->query($sql);

if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
		if($a==$row["username"]&&$b==$row["password"]){
			$x=1;
    }}}
		
			if($x==1){
				  $_SESSION['use']=$a;
				header('Location: user.php');
                exit;
				
			}
			else{
				echo "<h2>Username and password don't match</h2>";
			}
}
?>
</body>
</html>