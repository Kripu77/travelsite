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
    
?>
    
    <!------------------ CAROUSEL START HERE --------------------->
    <div class="container col-md-12" style="margin-left: 10%; z-index:-1">
        <img src="images/banner/Banner.png" alt="Los Angeles" style="width:80%; height:65vh">
    </div>
    <section id="team" class="col-md-12">
      <h2 class="col-md-11 text-center" style="margin-bottom:3%">About traveldoves.com</h2>
      <div class="container col-md-12 text-justify">
        turtledoves.com is a global, online community of travellers. The platform allows travellers to share their
        valuable views, and valuable memories including pictures with the world. <br>
        This platform is a hypothetical project developed as a group project by a team of 4 students at Kent Institute, 
        Australia. It's created as an assessment for DWIN309 - Developing <br>
         Web and Information Systems, unit of their Bachelor of Information Technology Course.
      </div>
      <h2 class="col-md-11 text-center" style="margin-bottom:0%;margin-top:5%">The Team</h2>
      <h4 class="col-md-10" style="margin-bottom:-1.5%; margin-top:5%;margin-left: 5%;">Ishrodaya Manandhar</h4>
      <div class="container col-md-10 text-justify">
        Ishrodaya, along with Sanjeeb worked on various aspects of the front end design. They collectively designed
        the entire frontend including color and theme selection, visual design, site structure, and wireframe; and others.
        Their team also customized Bootstrap, as required.
      </div>
      <h4 class="col-md-10" style="margin-bottom:-1.5%; margin-top:2%;margin-left: 5%;">Sanjeeb Thapa</h4>
      <div class="container col-md-10 text-justify">
        Sanjeeb actively worked as a front end designer for the team writing html codes, alongside Ishrodaya.
        These codes were converted into relevant templates by the team members working on backend part of the project.
      </div>
      <h4 class="col-md-10" style="margin-bottom:-1.5%; margin-top:2%;margin-left: 5%;">Kripu Khadka</h4>
      <div class="container col-md-10 text-justify">
        Kripu is a key team member for this project. He successfully executed some parts in the backend and worked on 
        PHP and some areas of bootstrap. His ideas helped us scale the project and make improvements from time to time.
      </div>
      <h4 class="col-md-10" style="margin-bottom:-1.5%; margin-top:2%;margin-left: 5%;">Saraswati Pandey</h4>
      <div class="container col-md-10 text-justify">
        Saraswati worked in closed coordination with Kripu for backend development. Together, the duo worked hard to 
        develop backend.
      </div>
    </section>
    <h2 class="col-md-11 text-center" style="margin-bottom:0%;margin-top:5%">Resource Used</h2>
      <div class="container col-md-10 text-justify">
        Resources used include the following:
        <ul>
          <li>Custom Bootstrap from getbootstrap.com</li>
          <li>Google Fonts</li>
          <li>Adobe Photoshop for Slides Generation</li>
          <li>Open source images from pexels.com and freeimages.com</li>
          <li>Microsoft Visual Studio Code for Coding</li>
          <li>palette.com for color theme selection</li>
          <li>XAMPP Server</li>
        
        </ul>
      </div>

<?php 
  include("footer.php");
?>