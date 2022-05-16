<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'sample');

if(isset($_POST['savedata']))
{     
  
      $firstname=$_POST['firstname1'];
      $lastname = $_POST['lastname1'];
      $age=$_POST['age1'];
      $address=$_POST['address1'];
      $phone=$_POST['phone1'];
      
       $sql = "INSERT INTO `students`(`FirstName`,`LastName`,`Age`,`Address`,`Phone`) VALUES ('$firstname','$lastname','$age','$address','$phone')";

       $rs = mysqli_query($connection, $sql);
      if($rs)
      {
       echo " <script>
       window.alert('Record added successfully');
       </script>";
       header("Location:index.php");
      }
      else
      {
       echo "Couldn't add your record!";
  
      }
}         
?>