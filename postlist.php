<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travels";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $postQuery = "SELECT travelpost.PostID, DATE(PostTime) AS PostTime, Path, CONCAT(FirstName,' ', LastName) AS UserName FROM travelpost";
    $postQuery .= ' JOIN travelpostimages ON travelpost.postID = travelpostimages.postID';
    $postQuery .= ' JOIN travelimage ON travelpostimages.imageID = travelimage.ImageID';
    $postQuery .= ' JOIN traveluserdetails on travelpost.UID = traveluserdetails.UID GROUP BY travelpost.PostID';
    
    $result = $conn->query($postQuery);

    session_start();
    include("header.php");
    include("navbar.php");
    if(isset($_SESSION["user"]))
    {
      include("utilityMenu2.php");
    }
    else
    {
      include("utilityMenu.php");
    }

    for($i=0;$i<mysqli_num_rows($result);$i++)
    {
    	$row = $result->fetch_assoc();

        echo "<div class='"."container col-md-3 bg-info'".">";
        echo "<div class='"."container col-md-11 imgPadding'".">";
        echo "<a href='"."viewpost.php?PostID=". $row["PostID"]."'><img src='"."images/travel-images/square-medium/". $row["Path"]."' style='"."width: 100%;'"."></a>";
        echo "</div>";
        echo "<div class='"."text-primary col-md-12 text-center'". " style='"."margin: 3% 2%; font-size: 1.1em;'".">";
        echo "Posted By: ". $row["UserName"] . " <br>";
        echo "On ". $row["PostTime"];
        echo "</div>";
        echo "</div>";
    	
    }

    include("footer.php");
    ?>