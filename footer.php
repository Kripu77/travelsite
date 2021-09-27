<div id="searchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-primary">Advanced Search</h4>
      </div>
      <div class="modal-body">
      <form method="GET" action="imagelist.php">
        <input id="searchBox" type="text" name="searchTerm" class="col-md-3 input-sm col-md-offset-3 text-primary" style="margin-right:1%" placeholder="Enter Search Term" />
        <input type="submit" class="btn btn-primary btn-sm" value="Search""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php $fav = $_GET["favourites"]; echo "<p id='"."favouriteStorage"."' hidden>".$fav."</p>"?>

<footer class="col-md-12 bg-info">
      <ul class="col-md-10">
        <li><a class="text-primary" href="about.php">About traveldoves</a></li>
        <li><a class="text-primary" href="imagelist.php">Popular Images</a></li>
        <li><a class="text-primary" href="postlist.php">Popular Posts</a></li>
        <li><a class="text-primary" href="Registration.php">Register Now</a></li>
      </ul>
      <p class="text-primary text-center bg-danger">Copyright traveldoves.com</p>
    </footer>


</body>
</html>