<html>
<head><title>SignUp</title>
<style>
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
body {background-image: url("Images/2.jpg");
 background-size:     cover; 
 background-position: center center; }

</style>
</head>
<body>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<h2>------------SIGN UP------------</h2>
<input type="text" name="username" placeholder="username" required><br>
<input type="password" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 3 or more characters" required><br>
<input type="password" name="password1" placeholder="Confirm password" required><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="submit" value="submit" name="submit"><br><br>
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
$a = htmlspecialchars($_POST['username']);
$b = htmlspecialchars($_POST['password']);
$c = htmlspecialchars($_POST['password1']);
$d = htmlspecialchars($_POST['email']);

$e=0;
$f=0;
$sql1 = "SELECT username FROM signup";
$sql2 = "SELECT email FROM signup";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

if($b!=$c){
	echo "<h3>The two passwords don't match</h3>";
}
else{
	if ($result1) {
    while($row1 = mysqli_fetch_assoc($result1)) {
		if($a==$row1["username"]){
			$e=1;
        echo "<h3>Username ".$a." already exists</h3><br>";
    }}}
			if($result2){
			while($row2 = mysqli_fetch_assoc($result2)) {
		if($d==$row2["email"]){
			$f=1;
        echo "<h3>Email ".$d." is already registered</h3><br>";
			}}}
			if($e==0&&$f==0){
				$sql3="insert into signup values('$a','$b','$d')";
				$result3 = $conn->query($sql3);
				if($result3){
					echo "<h3>Profile created</h3><br>";
					echo "<a href='login.html'><img src=\"Images/login.jpg\" alt=\"LOGIN\" height=\"50\" width=\"150\"></a>";
				}
				else{
					echo "<h3>Error signing up</h3><br>";
					echo "<a href='signup.php'><img src=\"Images/signup.jpg\" alt=\"Sign Up\" height=\"50\" width=\"150\"></a>";
				}
			}
	

 
}
 mysqli_close($conn);
}
?>
</body>
</html>