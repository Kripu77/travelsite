<?php

  include("header.php");
  include("navbar.php");

  $nameErr = $passErr = "";
  $userName = $userPass = "";
  $flag="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["userName"])) {
      $nameErr = "Username is required";
      $flag=false;
    } 
    else
    {
      $userName = test_input($_POST["userName"]);
      // check if name only contains letters and whitespace
      if (!filter_var($userName, FILTER_VALIDATE_EMAIL)) {
        $nameErr = "Invalid username format";
        $flag=false;
      }
    }

    if (empty($_POST["password"])) {
      $passErr = "Password is required";
      $flag=false;
    }
    else
    {
      $userPass=test_input($_POST["password"]);
    }
         
          
    if($flag == "")
    {
      $servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "travels";
	    
	    $conn = new mysqli($servername, $username, $password, $dbname);
    	  // Check connection
   	  if ($conn->connect_error) {
   	    die("Connection failed: " . $conn->connect_error);
    	}
  
    	$query = "SELECT * from traveluser WHERE UserName='".$userName."' AND Pass='".$userPass."'";

    	$result = $conn->query($query);
    	$conn->close();
    	    
      if ($result->num_rows > 0) {
    	  session_start();
    	  $_SESSION["user"]=$userName;
        echo "Session is set";
    	  header('Location: default.php');
   	    exit();
    	}
    	else
    	{
    	  echo "Invalid username or password. Please try again!";
    	}
    }
          
          
    }
    
    
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
<body>
    <div class="col-md-12">
        <form class="col-md-3 col-md-offset-4 bg-info text-primary" style="margin-top: 10%; padding-top: 2%" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="formRow">
                <label>Username</label>
                <input class="input-sm text-primary" style="margin-left: 1%" type="text" name="userName" value="<?php echo $userName;?>">
                <span class="error"><?php echo $nameErr;?></span>
            </div>
            <div class="formRow" >
                <label>Password</label>
                <input class="input-sm text-primary" style="margin-left: 2.5%"  type="password" name="password" value="<?php echo $userPass;?>">
                <span class="error"><?php echo $passErr;?></span>
            </div>
            <a style="margin-left:30%" href="registration.php">New User? Register Now</a>
            <input class="btn btn-warning btn-sm text-center" style="margin-top: 4%; margin-left: 45%; margin-bottom: 5%" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
