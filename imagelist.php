<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travels";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $searchTerm;
    $criteria;
    $subCriteria;

    if ($_SERVER["REQUEST_METHOD"] == "GET"){

        if(isset( $_GET["searchTerm"]))
        {
            echo "term found";
            $searchTerm = $_GET["searchTerm"];
        }
        else{
            $searchTerm="";
        }
        
        if(isset( $_GET["criteria"]))
        {
            $criteria = $_GET["criteria"];
        }
        else
        {
            $criteria="";
        }

        if(isset( $_GET["subCriteria"]))
        {
            $subCriteria = $_GET["subCriteria"];
        }
   
    }

    $imageQuery="";

    if($searchTerm != "")
    {
        $imageQuery = "SELECT travelimagedetails.ImageID, Title, Path FROM travelimagedetails";
        $imageQuery .= " JOIN travelimage ON travelimage.ImageID = travelimagedetails.ImageID";
        $imageQuery .= " WHERE Title LIKE '%".$searchTerm."%' GROUP BY travelimagedetails.ImageID";
    }
    else if($criteria != "")
    {

        if($criteria == "Country")
        {
            $imageQuery = "SELECT travelimagedetails.ImageID, Path, Title FROM travels.travelimagedetails";
            $imageQuery .= " JOIN travelimage ON travelimagedetails.ImageID = travelimage.ImageID";
            $imageQuery .= " JOIN geocountries ON travelimagedetails.CountryCodeISO = geocountries.ISO";
            $imageQuery .= " WHERE geocountries.CountryName = '".$subCriteria."' GROUP BY travelimagedetails.ImageID";
        }
        else
        {
            $imageQuery = "SELECT travelimagedetails.ImageID, Path, Title FROM travels.travelimagedetails";
            $imageQuery .= " JOIN travelimage ON travelimagedetails.ImageID = travelimage.ImageID";
            $imageQuery .= " JOIN geocities ON travelimagedetails.CityCode = geocities.GeoNameID";
            $imageQuery .= " WHERE geocities.AsciiName = '".$subCriteria."' GROUP BY travelimagedetails.ImageID";
        }
    }
    else
    {
        $imageQuery = "SELECT travelimagedetails.ImageID, Path, Title FROM travelimagedetails";
        $imageQuery.= " JOIN travelimage ON travelimagedetails.ImageID=travelimage.imageID";
    }

    $result = $conn->query($imageQuery);

    session_start();
    include("header.php");
    include("navbar.php");
    include("filter.php");
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