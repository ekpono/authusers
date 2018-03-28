<?php
//check for required fields from the form
if ((!isset($_POST['username'])) || (!isset($_POST['password']))) {
//header("Location: userlogin.html");
exit;
 }
 //connect to server and select database
$mysqli = mysqli_connect("localhost", "root", "", "users")
or die(mysqli_error());
//use mysqli_real_escape_string to clean the input
$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
//create and issue the query
$sql = "SELECT f_name, l_name FROM auth_users WHERE
username = '".$username."' AND password = '".$password."'";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {
//if authorized, get the values of f_name l_name
while ($info = mysqli_fetch_array($result)) {
$f_name = stripslashes($info['f_name']);
$l_name = stripslashes($info['l_name']);


}

//set authorization cookie
 setcookie("auth", "1", 0, "/", "localhost", 0);

 //create display string
 $display_block = "<p>".$f_name." is authorized!</p>
 <ul>
 <li><a href=\"secret.php\">secret page</a></li>
 </ul>";
 } else {

 //redirect back to login form if not authorized
 header("Location: userlogin.html");
 exit;
 }
//close connection to MySQL
 mysqli_close($mysqli);
 ?>