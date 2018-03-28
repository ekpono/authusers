<?php
if (isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "users";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }

    $sql = "INSERT INTO auth_users (f_name, l_name, email, username, password)
    VALUES ('".$_POST["f_name"]."','".$_POST["l_name"]."','".$_POST["email"]."','".$_POST["username"]."','".$_POST["password"]."')";

    if($conn->query($sql) === TRUE) {
        echo "Created created successfully";
    }else {
        echo "Sorry there was a probless processing your form";
    }
    $conn->close();
}