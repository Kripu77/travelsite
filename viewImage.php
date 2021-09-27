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

    $imageID = $_GET["ImageID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travels";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $imageQuery= "SELECT travelimage.ImageID, Path, Rating, Title, coalesce(Description,' ') as Description,";
    $imageQuery .= " travelimagedetails.Latitude, travelimagedetails.Longitude, AsciiName AS CityName, CountryName";
    $imageQuery .= " FROM travelimage JOIN travelimagerating ON travelimage.ImageID = travelimagerating.ImageID";
    $imageQuery .= " JOIN travelimagedetails ON travelimage.ImageID = travelimagedetails.ImageID";
    $imageQuery .= " JOIN geocities ON travelimagedetails.CountryCodeISO = geocities.CountryCodeISO";
    $imageQuery .= " JOIN geocountries ON geocountries.ISO = travelimagedetails.CountryCodeISO";
    $imageQuery .= " WHERE travelimage.ImageID=".$imageID." GROUP BY travelimage.ImageID";

    $result = $conn->query($imageQuery);

    echo "<div class='"."container col-md-8'"." style='"."background-color:black'".">";

    for($i=0;$i<mysqli_num_rows($result);$i++)
    {
    	$row = $result->fetch_assoc();
    	
      echo "<div id='".$row["Path"]."' class='"."mySlides text-center'".">";
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
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 3%"> 
        Title:  <?php echo $row["Title"]; ?>
    </div>
    <div class="container col-md-10 text-default" style="margin-left:2%; margin-top: 1%; text-align:justify"> 
        Description: <?php echo $row["Description"]; $userID=$row["UID"]; ?>
    </div>
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 1%">
        City: <?php echo $row["CityName"]; ?>
    </div>
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 1%">
        Country: <?php echo $row["CountryName"]; ?>
    </div>
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 1%">
        Rating: <?php echo $row["Rating"]; ?> Stars out of 5
    </div>
    <div class="container col-md-12 text-default" style="margin-left:2%; margin-top: 2%; margin-bottom: 5%"> 
        <button type="button" class="btn btn-warning"  data-toggle="tooltip" data-placement="left" title="Add To Favourites" onclick="addToFavourites()">
            Add To Favourites
        </button>
    </div>
</div>

<h2 class="col-md-11 text-center" style="margin-bottom:3%; margin-top: 5%">Other Images of City</h2>

<?php 

  $imageQuery= "SELECT travelimagedetails.ImageID, Path, Title FROM travelimagedetails";
  $imageQuery .= " JOIN travelimage ON travelimagedetails.ImageID=travelimage.imageID";
  $imageQuery .= " JOIN geocities ON travelimagedetails.CityCode = geocities.GeoNameID";
  $imageQuery .= " WHERE AsciiName = '".$row["CityName"]."'";

  $result = $conn->query($imageQuery);

  for($i=0;$i<mysqli_num_rows($result);$i++)
    {
    	$row = $result->fetch_assoc();

      echo "<div id='imagelist' class='"."container col-md-3 bg-info'".">";
      echo "<div class='"."container col-md-11 imgPadding'".">";
      echo "<a href='"."viewImage.php?ImageID=". $row["ImageID"]."'><img src='"."images/travel-images/square-medium/". $row["Path"]."' style='"."width: 100%;'"."></a>";
      echo "</div>";
      echo "<div class='"."text-primary col-md-12 text-center'". " style='"."margin: 3% 2%; font-size: 1.1em;'".">";
      echo $row["Title"] . " <br>";
      echo "</div>";
      echo "</div>";
    	
    }

  include("footer.php"); 

?>

