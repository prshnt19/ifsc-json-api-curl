<?php   

$servername = "localhost";  //replace your servername
$username = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "ifsc";    //replace your database name

// Create connection
$conn =new  mysqli($servername, $username, $password, $dbname);
//Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["name"]))
{
$sql="SELECT * FROM ifsc WHERE name='".$_POST["name"]."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){echo'<span "class="text-danger">name already exists</span>';$valid=false;}




}




$conn->close();
?>
