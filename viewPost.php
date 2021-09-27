<?php

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

    $postID = $_GET["PostID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travels";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $imageQuery= "SELECT travelpost.PostID, Title, Message, DATE(PostTime) AS PostTime, travelpost.UID,"; 
		$imageQuery .= " CONCAT(FirstName, ' ',LastName) AS FullName, travelpostimages.ImageID,";
    $imageQuery .= " Path FROM travels.travelpost";
    $imageQuery .= " JOIN traveluserdetails ON travelpost.UID = traveluserdetails.UID";
    $imageQuery .= " JOIN travelpostimages ON travelpostimages.PostID = travelpost.PostID";
    $imageQuery .= " JOIN travelimage ON travelimage.ImageID = travelpostimages.ImageID";
    $imageQuery .= " WHERE travelpost.PostID = ".$postID;

    $result = $conn->query($imageQuery);

    echo "<div class='"."container col-md-8'"." style='"."background-color:black'".">";

    for($i=0;$i<mysqli_num_rows($result);$i++)
    {
    	$row = $result->fetch_assoc();
    	
      echo "<div class='"."mySlides text-center'"."id='".$row["Path"]."'>";
      echo "<img src='"."images/travel-images/large/".$row["Path"]."' style='"."width:80%;height:60vh'".">";
      echo "</div>";

    }

    echo "<a class='"."prev'"." onclick='"."plusSlides(-1)'".">❮</a>";
    echo "<a class='"."next'"." onclick='"."plusSlides(1)'".">❯</a>";

    echo "<div class='"."caption-area'".">";
    echo "<p id='"."caption'"."></p>";
    echo "</div>";

    echo "<div class='"."container col-md-12'"." style='"."overflow: auto; margin-left:0%; white-space:nowrap'".">";

    $result = $conn->query($imageQuery);

    for($i=0;$i<mysqli_num_rows($result);$i++)
    {
    	$row = $result->fetch_assoc();
    	
      echo "<div class='"."column'".">";
      echo "<img class='"."demo cursor'"." src='"."images/travel-images/thumb/".$row["Path"]."' style='"."width:100%;'"." onclick='"."currentSlide(1)'"." alt='".$row["Title"]."'>";
      echo "</div>";

    }
    echo "</div>";
    echo "</div>";

?>

<script>currentSlide(1)</script>

<?php $result = $conn->query($imageQuery); $row = $result->fetch_assoc(); ?>

<div class="container col-md-8" style="margin-top:0%;background-color:black;">
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 2%">
        Posted By: <?php echo $row["FullName"]; ?>
    </div>
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 1%">
        On <?php echo $row["PostTime"]; ?>
    </div>
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 1%"> 
        Title:  <?php echo $row["Title"]; ?>
    </div>
    <div class="container col-md-10 text-default" style="margin-left:2%; margin-top: 1%; text-align:justify"> 
        Message: <?php echo $row["Message"]; $userID=$row["UID"]; ?>
    </div>
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 2%; margin-bottom: 5%"> 
        <button type="button" class="btn btn-warning"  data-toggle="tooltip" data-placement="left" title="Add To Favourites" onclick="addToFavourites()">
            Add To Favourites
        </button>
    </div>
</div>

<h2 class="col-md-11 text-center" style="margin-bottom:3%; margin-top: 5%">Other Posts By User</h2>

<?php 

  $imageQuery= "SELECT travelpost.PostID, DATE(PostTime) AS PostTime, Path, CONCAT (FirstName, ' ', LastName) as UserName FROM travelpost";
  $imageQuery .= " JOIN travelpostimages ON travelpost.postID = travelpostimages.postID";
  $imageQuery .= " JOIN travelimage ON travelpostimages.imageID = travelimage.ImageID";
  $imageQuery .= " JOIN traveluserdetails on travelpost.UID = traveluserdetails.UID";
  $imageQuery .= " WHERE traveluserdetails.UID = ".$userID." GROUP BY travelpost.PostID";

  $result = $conn->query($imageQuery);

  for($i=0;$i<mysqli_num_rows($result);$i++)
    {
    	$row = $result->fetch_assoc();

        echo "<div class='"."container col-md-3 bg-info'".">";
        echo "<div class='"."container col-md-11 imgPadding'".">";
        echo "<a href='"."viewpost.php?PostID=". $row["PostID"]."'><img src='"."images/travel-images/square-medium/". $row["Path"]."' style='"."width: 100%;'"."></a>";
        echo "</div>";
        echo "<div class='"."text-primary col-md-10 text-center'". " style='"."margin: 3% 2%; font-size: 1.2em;'".">";
        echo "Posted By: ". $row["UserName"] . " <br>";
        echo "On ". $row["PostTime"];
        echo "</div>";
        echo "</div>";
    	
    }

  include("footer.php"); 

?>

