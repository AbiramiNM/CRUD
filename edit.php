<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sample');

    if(isset($_POST['updatedata']))
    {   
        $id=$_POST['update_id'];
        $firstname=$_POST['firstname1'];
        $lastname = $_POST['lastname1'];
        $age=$_POST['age1'];
        $address=$_POST['address1'];
        $phone=$_POST['phone1'];

         $query= "UPDATE `students` SET `FirstName`='$firstname', `LastName`='$lastname', `Age`='$age', `Address`='$address',`Phone`='$phone'  WHERE `ID`='$id' ";

         $rs = mysqli_query($connection,$query);

          if($rs)
          {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
          }
          else
          {
            echo '<script> alert("Data Not Updated"); </script>';
          }
    }
?>