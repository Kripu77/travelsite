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
    echo $_SESSION["user"];
?>

<!------------------ CAROUSEL START HERE --------------------->
<div class="container" style="margin-left: 13%;z-index:-2">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
      
            <div class="item active">
              <img src="images/slides/Slide1.png" alt="Los Angeles" style="width:80%; height:80vh">
            </div>
      
            <div class="item">
              <img src="images/slides/Slide2.png" alt="Chicago" style="width:80%; height:80vh">
            </div>
          
            <div class="item">
              <img src="images/slides/Slide3.png" alt="New York" style="width:80%; height:80vh">
            </div>
        
          </div>
        </div>
    </div>

    <section class="col-md-12">
    <h2 class="col-md-11 text-center" style="margin-bottom:5%">Most Recent Images</h2>
    <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "travels";
      
          $conn = new mysqli($servername, $username, $password, $dbname);
      
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          $imageQuery= "SELECT travelimagedetails.ImageID, Title, Path FROM travelimagedetails";
          $imageQuery .= " JOIN travelimage ON travelimage.ImageID = travelimagedetails.ImageID";
          $imageQuery .= " ORDER BY travelimagedetails.ImageID DESC LIMIT 3";
        
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
    ?>
    </section>

<?php 
  include("footer.php");
?>