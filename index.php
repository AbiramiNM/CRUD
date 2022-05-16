<?php  
$con = new mysqli("localhost","root","","sample");
?>
<html>    
<head><title>EMPLOYEE DETAILS</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="modal fade" id="enterdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Employee Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="insert.php" method="POST">
         <div class="modal-body">
           <div class="mb-3">
            
             <label for="message-text" class="form-label">First Name</label>
              <input type="text" class="form-control" name="firstname1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Last Name</label>
                 <input type="text" class="form-control" name="lastname1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Age</label>
                 <input type="number" class="form-control" name="age1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Address</label>
                 <input type="text" class="form-control" name="address1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Phone</label>
                 <input type="number" class="form-control" name="phone1"></div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="savedata" class="btn btn-primary">Save Data</button>
      </div>
     </form>
    </div>
  </div>
</div>


 <!-- ################################################################################################################## -->

 <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="edit.php" method="POST">
         <div class="modal-body">
            <input type="hidden" name="update_id" id="update_id">
           <div class="mb-3">
             <label for="message-text" class="form-label">First Name</label>
              <input type="text" id="firstname1" class="form-control" name="firstname1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Last Name</label>
                 <input type="text" id="lastname1" class="form-control" name="lastname1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Age</label>
                 <input type="number" id="age1" class="form-control" name="age1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Address</label>
                 <input type="text" id="address1" class="form-control" name="address1"></div>
                 <div class="mb-3">
               <label for="message-text" class="form-label">Phone</label>
                 <input type="number" id="phone1" class="form-control" name="phone1"></div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
      </div>
     </form>
    </div>
  </div>
</div>

<!-- ################################################################################################################## -->
  
    <div class="modal fade" id="deletedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Employee Data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="delete.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Are you sure want to Delete this Data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                        <button type="submit" name="deletedata" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- #################################################################################################### -->

    <div class="container">
        <div class="jumbotron">
            <div class="card">   
               <div class="card-body">
                  <h2> INSERTING NEW DATA </h2>
                    <div class="card">
                     <div class="card-body">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enterdata">ADD DATA</button>
                     </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                        <table width = "50%" border = "1" cellspacing = "1" cellpadding = "1" >    
                          <tr>
                             <th>ID</th>
                             <th>FirstName</th>   
                             <th>LastName</th>    
                             <th>Age</th>
                             <th>Address</th>
                             <th>Phone</th>
                             <th colspan="2">Action</th>  
                         </tr>
<?php 
$s = mysqli_query($con,"select * from students");  
while($row = mysqli_fetch_array($s)){   
?>  
    <tr>
        <td><?php echo $row['ID'];?></td>
        <td><?php echo $row['FirstName'];?></td>  
        <td><?php echo $row['LastName'];?></td>  
        <td><?php echo $row['Age'];?></td>
        <td><?php echo $row['Address'];?></td>
        <td><?php echo $row['Phone'];?></td>  
        <td>
          <form action="updatedata.php" method="post">
             <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editdata">Edit</button>
          </form>
        </td>
        <td>
           <form action="delete.php" method="post">
             <button type="button" class="btn btn-danger dltbtn" data-bs-toggle="modal" data-bs-target="#deletedata">Delete</button>
           </form>
        </td>
     </tr>  
        <?php 
} 
?>
                    </div>
                </div>
                </div>
             </div>
        </div>
    </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



    <script>
      
     $(document).ready(function() {
         $('.editbtn').on('click', function() {
            $('#editdata').modal('show');

               $tr = $(this).closest('tr');

               var data = $tr.children("td").map(function() {
                   return $(this).text();
               }).get();
                           
               console.log($tr)
               
               $('#update_id').val(data[0]);
               $('#firstname1').val(data[1]);
               $('#lastname1').val(data[2]);
               $('#age1').val(data[3]);
               $('#address1').val(data[4]);
               $('#phone1').val(data[5]);


         });
     });

    </script>

    <script>
        $(document).ready(function () {

            $('.dltbtn').on('click', function () {

                $('#deletedata').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
    
        </table> 

       

          <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                    
                    <div class="card-body">

                        <form action="import.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="file" class="form-control" accept=".csv" />
                            <button type="submit" name="import" class="btn btn-primary ">Import</button>

                        </form>

                         <form method="post" action="export.php">
                         <input type="submit" name="export" class="btn btn-primary" value="Export" />
                          </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
    </body>    
        
</html>    