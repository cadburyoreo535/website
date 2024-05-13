<?php
session_start();
include "db.php";

if(isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}


$email = validate($_POST['email']);
$password = validate($_POST['password']);


if(empty($email)) {
    echo '<script>alert("Email is required")</script>';
    exit();
}

else if(empty($password)) {
    echo '<script>alert("Password is required")</script>';
    exit();
}

$sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['email'] === $email && $row['password'] === $password) {
        echo '<script>alert("Logged in")</script>';
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.html");
        exit();
    }
    else{
        echo '<script>alert("Incorrect Email or Password")</script>';
        exit();
    }
}
else {
    echo '<script>alert("Incorrect Email or Password")</script>';
    exit();
}

?>