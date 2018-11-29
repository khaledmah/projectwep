<?php
$servername = "localhost";
$username = "root";
$password = "";
$usern=$_GET['username'];
$passw=$_GET['pwd'];


$conn = new PDO("mysql:host=$servername;dbname=Hotel_Resturant", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stat=$conn->prepare("select username , password from Login where username=? and password=?");

$stat->execute([$usern,$passw]);

$result = $stat->fetch();

if ($result['username']=="Casher" && $result['password']=="casher")
    include ("casher.php");
elseif($result['username']=="Receptionist" && $result['password']=="receptionist")
    include ("recption.php");
else{

    include ('login1.php');
}



?>