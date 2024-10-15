
<?php
require 'vendor/autoload.php';
$data = new MongoDB\Client();
$dbs = $data->students;
$coll = $dbs -> personal;

if($_POST)
{$addData=
array(
'Name' =>$_POST['name'],
'Mail' =>$_POST['mail'],
'Phone'=>$_POST['phone'],
'NSTI'=>$_POST['location']);

if($coll ->insertOne($addData));};
//{echo "insert successfully";};
$readData =$coll->find();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
   <div  style ='width:500px; margin-left:250; background:lightblue; text-align:center'>
    <form action="" method="post">
        <fieldset>
            <legend> Form</legend>
            <legend> Name</legend><input  type="text" name="name">
            <legend> Mail</legend><input  type="email" name="mail">
            <legend> Phone</legend><input  type="number" name="phone">
            <legend> NSTI</legend><input  type="type" name="location"><br><br>
            <button type="submit" name="submit" >Submit</button>
        </fieldset>
    </form>

<br><br>
    <table border=1px style='width:500px; color:blue; background-color:yellow'>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>NSTI</th>
</tr>

<?php
foreach($readData as $abc)
{
    echo "<tr>";
    echo '<td>'.$abc['Name'].'</td>';
    echo '<td>'.$abc['Mail'].'</td>';
    echo '<td>'.$abc['Phone'].'</td>';
    echo '<td>'.$abc['NSTI'].'</td>';
    echo'</tr>';
}

?>
</table>
</div> 
</body>
</html>