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
                echo 'ENTRY SUCESSFULL';
            }
            else {
                echo 'ERROR';
            }
        }
    }
?>