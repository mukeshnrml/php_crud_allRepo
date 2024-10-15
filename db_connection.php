<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Name : <input type="text" name="name"><br><br>
        Email : <input type="email" name="mail"><br><br>
        Phone No. : <input type="number" name="mobile"><br><br>
        <input type="Submit" name="submit">        
    </form>
    </body>
    </html>
    <?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'form';
   $conn = mysqli_connect($server, $user, $password, $database);
   if(isset($_POST['submit']))
   {
    $na = $_POST['name'];
    $em = $_POST['mail'];
    $ph = $_POST['mobile'];

    $query = "insert into form(name, mail, mobile) values ('$na', '$em', '$ph')";
    mysqli_query($conn, $query); 
   }
    ?>

    