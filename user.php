<html>
<head><title>User</title>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:450px;
    width:150px;
    float:left;
    padding:5px;	      
}
#section1 {
    width:1100px;
	height: 220px;
    float:left;
    padding:10px;	 	 
}
#section2 {
    width:1100px;
	height: 220px;
    float:left;
    padding:10px;	 	 
}
body {background-image: url("Images/1.jpg");
 background-size:     cover; 
 background-position: center center; }
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
input[type=text]{
    padding: 5px;
    border: 2px solid black;
    width:500px;
}  
input[type=submit]{
    background-color: #000000;
    color: white;
    font-weight: bold;
    padding: 5px;
    border: 2px solid white;
    width:12%;
    text-align:center;
}
</style>
</head>
<body>
<div id="header">
<h1> Spell Check</h1>
</div>
<div id="nav">
<center><h2>W<br><br>E<br><br>L<br><br>C<br><br>O<br><br>M<br><br>E</h2></center>
<center><a href="logout.php"><img src="Images/logout.png" alt="Logout" height="50" width="150"></a></center><br><br>
</div>
<div id="section1">
<center><form method="post">
<br><br><input type="text" name="1" id="1" style="width:200px"onkeyup="showHint(this.value)">
<p>Suggestions: <span id="txtHint"></span></p>
</form></center>
</div>
<div id="section2">
<center><form action="suggest.php" method="post">
<br><br><br><br><input type="text" name="2" id="2"><br><br>
<input type="submit" value="submit">
</form></center>
</div>
<div id="footer">
<br>
<?php
session_start();
echo 'Welcome '.$_SESSION['use']; 
?>
<br>
</div>
</body>
</html>
