<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADIT 2022 - 24 @Dehradun</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top text-center">
      NSTI Dehradun
    </a>
  </div>
</nav>
    <form method="post">

  <div class="m-3">
    <label for="reg_no" class="form-label">Registraion Number: </label>
    <input type="number" class="form-control" id="reg_no" name="Reg_No" placeholder="Registraion Number" required>
  </div>

  <div class="m-3">
    <label for="t_name" class="form-label">Trainee's Name: </label>
    <input type="text" class="form-control" id="t_name" name="T_name" placeholder="Trainee's Name">
  </div>

  <div class="m-3">
    <label for="t_mobile" class="form-label">Mobile: </label>
    <input type="number" class="form-control" id="t_mobile" name="Mobile" placeholder="Mobile">
  </div>

  <div class="m-3">
    <label for="t_nsti" class="form-label">NSTI: </label>
    <input type="text" class="form-control" id="t_nsti" name="nsti" placeholder="NSTI">
  </div>

  <div class="m-3">
    <label for="date" class="form-label">DOB : </label>
    <input type="date" class="form-control" id="date" name="date" placeholder="Date">
  </div>
 
  <button type="submit" class="btn btn-primary m-3" name="Onclick">Submit</button>
  <button type="submit" class="btn btn-primary m-3" name="Ondelete">Delete</button>
  <button type="submit" class="btn btn-primary m-3" name="Onedit">Update</button>
</form>


<br>
<br>

<table class="table table-bordered bg-info">
 <tr>
      <th scope="col">Registration Number </th>
      <th scope="col">Trainee's Name </th>
      <th scope="col">Mobile </th>
      <th scope="col">NSTI </th>
      <th scope="col">DOB </th>
 </tr>

 
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "swati";
$con = mysqli_connect($server,$user,$pass,$db);


$sq = "SELECT * FROM `ibm`";
$res = mysqli_query($con, $sq);
 
if(isset($_POST['Onclick'])){
while($data = mysqli_fetch_array($res)){
   
  echo '<tr>';
  echo '<td>'.$data['reg_no'].'</td>';
  echo '<td>'.$data['trainee_name'].'</td>';
  echo '<td>'.$data['phone_no'].'</td>';
  echo '<td>'.$data['nsti'].'</td>';
  echo '<td>'.$data['reg_date'].'</td>';
  echo '</tr>';
  
}

}
  ?>


</table>

</body>
</html>






<?php

# Server Connectivity
$server = "localhost";
$user = "root";
$pass = "";
$db = "swati";
$con = mysqli_connect($server,$user,$pass,$db);
// if ($con) {
//     echo "<h2>Connected!</h2>";
// }else{
//     echo "not connected";
// }


// DB Creation
// $sql = "CREATE DATABASE swati";
// $output = mysqli_query($con, $sql);
// if (!$output) {
//     echo "<br>DB Not Created";
// }else{echo "<br>DB Created";}


# create a table
// $sql = "CREATE TABLE ibm(
//     reg_no int not null primary key,
//     trainee_name varchar(50) not null,
//     phone_no int not null,
//     nsti varchar(50) not null,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
// $output = mysqli_query($con, $sql);

// if (!$output) {
//     echo "<br>Table not created";
// }else{echo "<br>Table created";}



#    insert records into adit table
if(isset($_POST['Onclick'])){
$reg = $_POST['Reg_No'];
$tname = $_POST['T_name'];
$tmobile = $_POST['Mobile'];
$nsti = $_POST['nsti'];
$date = $_POST['date'];

$sql = "INSERT INTO ibm(reg_no, trainee_name, phone_no, nsti, reg_date)
values('$reg','$tname','$tmobile', '$nsti','$date')";

$output = mysqli_query($con, $sql);

if ($output) {
    echo "<br> Data Inserted ";
}else{echo "<br>Not Inserted";}
}




// // delete
if(isset($_POST['Ondelete'])){
  $reg = $_POST['Reg_No'];

$d_sql = "DELETE FROM ibm WHERE ibm.reg_no=$reg";
$output = mysqli_query($con, $d_sql);
if ($output) {
    echo "<br>Record Deleted";
}else{echo "<br>Not Deleted";}
}


// update
if(isset($_POST['Onedit'])){
  $reg = $_POST['Reg_No'];
  $tname = $_POST['T_name'];
  $tmobile = $_POST['Mobile'];
  $nsti = $_POST['nsti'];
  $date = $_POST['date'];
$u_sql = "UPDATE `ibm` SET `trainee_name` = '$tname', `phone_no`= '$tmobile', `nsti` = '$nsti', reg_date = $date WHERE `ibm`.`reg_no` = $reg;";
$output = mysqli_query($con, $u_sql);
if ($output) {
    echo "<br>Record Updated";
}else{echo "<br>Not Updated";}
}



?>

