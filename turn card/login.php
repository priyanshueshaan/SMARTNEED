<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection

$con = new mysqli("localhost","root","","smart");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
}else{
    $stmt = $con->prepare("select * from registration where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            header("Location: http://localhost/ppp/");    
        } else{
            echo "<h2>Invalid Email or Password</h2>";
        }
    }  else {
        echo "<h2>Invalid Email or Password</h2>";
    }
}
?>
</body>
</html>
