<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  
<title>Pääsivu</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body{ font: 14px sans-serif; text-align: center; }
    body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
    .w3-row-padding img {margin-bottom: 12px}
    /* Set the width of the sidebar to 120px */
    .w3-sidebar {width: 120px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 120px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
     
          .mySlides {display:none}
          .w3-left, .w3-right, .w3-badge {cursor:pointer}
          .w3-badge {height:13px;width:13px;padding:0}
          </style>

</head>
<body class="w3-black" >
    <!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
    <!-- Avatar image in top left corner -->
    <img src="hollow.jpg" style="width:100%">
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
      <i class="fa fa-home w3-xxlarge"></i>
      <p>Home</p>
    </a>
    <a href="#Info" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-user w3-xxlarge"></i>
      <p>Info</p>
    </a>
    <a href="#Gallery" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-eye w3-xxlarge"></i>
      <p>Gallery</p>
    </a>
    <a href="landing.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-book w3-xxlarge"></i>
      <p>Add Books</p>
    </a>
    
    <a href="reset-password.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-refresh w3-xxlarge"></i>
      <p>Password Reset</p>

      <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-close w3-xxlarge"></i>
      <p>Sing Out</p>
    </a>
  </nav>
  <div class="w3-container w3-large w3-right-align">
    
</div>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
  <!-- Navbar on small screens (Hidden on medium and large screens) -->
  <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="#" class="w3-bar-item w3-button" style="width:25% !important">Home</a>
      <a href="#Info" class="w3-bar-item w3-button" style="width:25% !important">Info</a>
      <a href="#Gallery" class="w3-bar-item w3-button" style="width:25% !important">Books</a>
      <a href="#Photos" class="w3-bar-item w3-button" style="width:25% !important">Photos</a>
      <a href="#Addons" class="w3-bar-item w3-button" style="width:25% !important">Addons</a>
      <a href="#Animations" class="w3-bar-item w3-button " style="width:25% !important">Animations</a>
    </div>
  </div>
  <!-- Page Content -->
<div class="w3-padding-large" id="main">
    <!-- Header/Home -->
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
      <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> Toni Vainionpää!</h1>
      <p>sälän kasaaja!</p>
      <img src="Hupikuva.jpg" alt="boy" class="w3-image" style="width:25%">
    </header>
  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="Info">
    <h2 class="w3-text-light-grey"></h2>
    <hr style="width:200px" class="w3-opacity">
    <p>No siis mitä kertoa itsestä ja millä lailla? Helpoin olisi tietty kertoa se perus pituus ikä ja muu vastavaa mutta kuka tulee semmosten asioiden takia toisen verkkosivuille? 
        Jokatapauksessa olen vähän kaikenlaisen tavaran kerääjä ja tänne olen kasannut hiukan harrastuksistani ja muutamia muita kuvia!
    </p>
    <h3 class="w3-padding-16 w3-text-light-grey">Mitä se oikeasti</h3>
    <p class="w3-wide">Eläminen</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:95%"></div>
    </div>
    <p class="w3-wide">Ruoan teko taidot</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:75%"></div>
    </div>
    <p class="w3-wide">Kaikki muu!</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:60%"></div>
    </div><br>
    
    <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
      <div class="w3-quarter w3-section">
        <div class="w3-xlarge">34+</div>
        Ikävuosia
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">657+</span><br>
        Joku random numero
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">72+</span><br>
        Tyytyväissyys käyneillä!
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">150+</span><br>
        Kertoja kuinka tämä on uusittu!
      </div>
    </div>

    <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="Gallery">
      <h2 class="w3-text-light-grey">Photoshop</h2>
      <hr style="width:200px" class="w3-opacity">
      <p>Tässä näette hiukan muokkaus kuvia joita olen harjoitellut
      </p>
     
     
          <div class="w3-container">
            <h2>kuva galleria</h2>
            <p>Jokaisen kuvan  muokkaaminen on suoritettu huumorimielellä!</p>
          </div>
          
          <div class="w3-content w3-display-container" style="max-width:500px">
            <img class="mySlides" src="2619 Andromeda.jpg" style="width:100%">
            <img class="mySlides" src="Toffe!.png" style="width:100%">
            <img class="mySlides" src="Posti_kortti.jpg" style="width:100%">
            <img class="mySlides" src="Toffe1.jpg" style="width:100%">
            <img class="mySlides" src="omenakori.jpg" style="width:100%">
            <img class="mySlides" src="Hupikuva.jpg" style="width:100%">
            <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
              <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
              <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
              <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
              <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
              <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
              <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
              <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(5)"></span>
            </div>
          </div>


          <div class="w3-content w3-justify w3-text-grey w3-padding-64" >    
      <h2 class="w3-text-light-grey">Kirjasto</h2>
      <p>Tästä linkistä pääset myös lisäämään kirjoja kirjastoon</p>
      <a href="landing.php" class="w3-bar-item w3-button" style="width:25% !important">Books</a>
          </div>
          
<div>

        <!-- Footer -->
     <div class="w3-container w3-center" >     
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  <!-- End footer -->
  </footer>
     </div>

        <script>
         var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
          </script>
    </body>
</html>