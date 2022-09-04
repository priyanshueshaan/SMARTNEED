<?php
$firstname= $_POST['firstname'];
$email= $_POST['email'];
$password= $_POST['password'];

$conn=new mysqli('localhost','root','','smart');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(firstname, email,password)
    values(?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $email, $password);
    $stmt->execute();
    echo"Registration Successfully...";
    $stmt->close();
    $conn->close();
}
?>