<?php

    $userName = $_POST["email"];
    $pass = $_POST["password"];
    $confirmPass = $_POST["confirmPassword"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $mobile = $_POST["mobile"];
    $AddressLine1 = $_POST["AddressLine1"];
    $city = $_POST["City"];
    $postal = $_POST["PostalCode"];
    $country = $_POST["Country"];

    
    if($pass != $confirmPass)
    {
        echo "Password mismatch! Please try again";
        sleep(5);
        header('Location: registration.php');
        exit();
    }
    else if (!filter_var($userName, FILTER_VALIDATE_EMAIL))
    {
        echo "Invalid Email Format! Please try again";
        sleep(5);
        header('Location: registration.php');
        exit();
    }
    else if($fName == "" || $lName=="")
    {
        echo "Name fields cannot be empty! Please try again";
        sleep(5);
        header('Location: registration.php');
        exit();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travels";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT COUNT(*) AS totalUsers FROM traveluser";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();

    $id = $row["totalUsers"];
    $newID = (int)$id;
    $newID = $newID + 1;

    $date = date('Y-m-d');

    $query = "INSERT INTO traveluser VALUES (".$newID." , ".$userName." , ".$pass." , 1, ".$date." , ".$date." )";
    $conn->query($query);

    $query = "INSERT INTO traveluserdetails VALUES (".$newID." , ".$fName." , ".$lName." , ".$AddressLine1;
    $query .= " , ".$city." , ' ', ".$country ." , ".$postal." , ".$userName.", 1 )";
    $conn->query($query);

    echo "User created!";
    sleep(5);
    header('Location: default.php');
    exit();


?>