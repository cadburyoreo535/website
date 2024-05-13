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

        <form action='register.php' method="post">
            <h3>create new account</h3>
            <input type="text" name="name" maxlength="50" placeholder="enter your name" class="input">
            <input type="email" name="email" maxlength="50" placeholder="enter your email" class="input">
            <input type="password" name="password" maxlength="20" placeholder="enter your password" class="input">

            <p>already have an account? <a href="login.php">login now</a></p>
            <input type="submit" value="register now" name="submit" class="btn">

        </form>

    </section>


</div>

<!-- account section -->

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn= mysqli_connect('localhost', 'root', '', 'practice1') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            $name= $_POST ['name'];
            $email= $_POST ['email'];
            $password= $_POST ['password'];


            $sql= "INSERT INTO `register` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

            $query = mysqli_query($conn,$sql);
            if($query) {
                echo 'qw123';
            }
            else {
                echo 'ERROR';
            }
        }
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