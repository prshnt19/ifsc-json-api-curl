
<?php
if(isset($_POST['Submit'])){


  $name=trim($_POST["name"]);

  $number=trim($_POST["number"]); 

  $success='';
 $valid = true;
  if($name =="") {
    $errorMsg=  "error : You did not enter a name.";
    $code= "1" ;$valid=false;
  }
 elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $errorMsg = 'Only letters and white space allowed in name';  $code= "1" ;$valid=false;
    }
 
elseif($number ==""){
    $errorMsg=  "error : You did not enter number.";
    $code= "2";$valid=false;}



else
{
$servername = "localhost";  //replace your servername
$username = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "ifsc";    //replace your database name

// Create connection
$conn =new  mysqli($servername, $username, $password, $dbname);
$sql="SELECT * FROM ifsc WHERE name='".$_POST["name"]."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){$valid=false;  $errorMsg=  "error :name already exists.";}



$conn->close();

}

if($valid){
  $success="success";
  require_once("dataifsc.php");
        //include"ddi.php";echo"hi";
       

}

}


?>















<!DOCTYPE html>
<html>








<head>
    


  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   </head>
  
   <body>


      <form name= "Form" id= "Form" method= "post" action= "ifsc.php" >
    <div class="transbox" align="left"> 
  
  
     Name:<br > 
  <input  style="height:27px;color:#000000;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;" id="name" type="text"name="name" placeholder="Enter Your Name "value="<?php if(isset($name)&& $success==''){echo $name;} ?>"><?php if(isset($code) && $code == 1){ echo "<font color=dark red>!</font>" ;} ?><span style="font-size:15pt;color:red" id="availability"></span>
      




<br>

IFSC Number: <br> 
      <input  style="height:27px;color:#000000;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px "placeholder="Enter a ifsc number" id="number"  type="text" name="number" value="<?php if(isset($number)&& $success==''){echo $number;}?>"> 
      <?php if(isset($code) && $code == 2){echo "<font color=red>!</font>" ;} ?><span style="font-size:10pt;color:blue" id="availabilityi"></span>
<br><br>



<input type="submit" name="Submit" value="Submit" style="font-size:20pt" "> 
        </div>
       </form> 
  
       <font color="red"> <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?></font>



   </body>



<script>
$(document).ready(function(){

$('#name').keyup(function()
{ var e_name=$(this).val();
$.ajax({
url:"checkname.php",
method:"POST",
data: {name:e_name},
dataType:"text",
success:function(html){$('#availability').html(html);}
});
});








$('#number').keyup(function()
{ var e_number=$(this).val();
$.ajax({
url:"checkifsc.php",
method:"POST",
data: {number:e_number},
dataType:"text",
success:function(html){$('#availabilityi').html(html);}
});
});
});
</script>






</html>
