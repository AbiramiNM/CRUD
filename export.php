<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sample');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM students";
 $result = mysqli_query($connection, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '<table class="table" bordered="1">  
                    <tr>
                             <th>ID</th>
                             <th>FirstName</th>   
                             <th>LastName</th>    
                             <th>Age</th>
                             <th>Address</th>
                             <th>Phone</th>  
                         </tr>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<tr>  
                  <td>'.$row['ID'].'</td>
                  <td>'.$row['FirstName'].'</td>  
                  <td>'.$row['LastName'].'</td>  
                  <td>'.$row['Age'].'</td>
                  <td>'.$row['Address'].'</td>
                  <td>'.$row['Phone'].'</td>
                    </tr>';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>