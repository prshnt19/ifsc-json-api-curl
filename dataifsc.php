
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





$name = $_POST['name'];

$number =  $_POST['number'];

// sql to create table


$sql = "INSERT INTO ifsc  VALUES ('$name','$number')";


if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute  " . mysqli_error($conn);
}
 

$conn->close();
?>
