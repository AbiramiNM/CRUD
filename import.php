<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sample');

if (isset($_POST["import"]))
 {
    $fileName = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"]>0)
    {
        $file = fopen($fileName, "r");
        

        while(($column = fgetcsv($file,10000,",")) !==FALSE)
        {
            $sql="INSERT INTO `students`(`FirstName`,`LastName`,`Age`,`Address`,`Phone`) VALUES ('" . $column[0] ."', '" . $column[1] ."', '" . $column[2] ."', '" . $column[3] ."', '" . $column[4] ."')";
            $result = mysqli_query($connection , $sql);

            if(!empty($result))
            {
                echo "Data Imported Successfully!";
                break;
            }
            else
            {
                echo "Problem in importing the file!";
            }
        }
    }
}
?>
 