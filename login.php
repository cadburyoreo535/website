<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>

<!-- header section -->

<header class="header">

    <section class="flex">

        <div id="menu-btn" class="fas fa-bars-staggered"></div>

        <a href="home.html">
            <img src="JoB.svg" alt="">
        </a>

        <nav class="navbar">
            <a href="home.html">home</a>
            <a href="about.html">about</a>
            <a href="jobs.html">all jobs</a>
            <a href="contact.html">contact us</a>
            <a href="login.php">account</a>
        </nav>

        <a href="#" class="btn" style="margin-top: 0;">post job</a>

    </section>


</header>

<!-- header section -->

<!-- account section -->

<div class="account-form-container">

    <section class="account-form">

        <form action="login.php" method="post">
            <h3>welcome back</h3>
            <input type="email" name="email" maxlength="50" placeholder="enter your email" class="input">
            <input type="password"  name="password" maxlength="20" placeholder="enter your password" class="input">
            <p>don't have an account? <a href="register.php">register now</a></p>
            <input type="submit" value="login now" name="submit" class="btn">

        </form>

    </section>

</div>

<!-- account section -->

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

<!-- footer section -->

<footer class="footer">

    <section class="grid">

        <div class="box">
            <h3>quick links</h3>
            <a href="home.html"><i class="fas fa-angle-right"></i>home</a>
            <a href="about.html"><i class="fas fa-angle-right"></i>about</a>
            <a href="jobs.html"><i class="fas fa-angle-right"></i>all jobs</a>
            <a href="contact.html"><i class="fas fa-angle-right"></i>contact us</a>
            <a href="#"><i class="fas fa-angle-right"></i>filter search</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right"></i>account</a>
            <a href="login.html"><i class="fas fa-angle-right"></i>login</a>
            <a href="register.html"><i class="fas fa-angle-right"></i>register</a>
            <a href="#"><i class="fas fa-angle-right"></i>post job</a>
            <a href="#"><i class="fas fa-angle-right"></i>dashboard</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
            <a href="#"><i class="fab fa-twitter"></i>twitter</a>
            <a href="#"><i class="fab fa-instagram"></i>instagram</a>

        </div>

    </section>

    <div class="credit">&copy; copyright @ 2024 by <span>PAULO</span> | all rights reserved</div>

</footer>

<!-- footer section -->

<script src="script.js"></script>

</body>
</html>