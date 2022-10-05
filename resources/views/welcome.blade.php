<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--Font Awesome Script-->
    <script src="https://kit.fontawesome.com/a0ee17d7d8.js" crossorigin="anonymous"></script>
    {{-- <link href="@fortawesome/fontawesome-free/scss/.css" rel="stylesheet"> <!--betulkan path-->
    <link href="@fortawesome/fontawesome-free/scss/solid.css" rel="stylesheet"> --}}
  
    
<style>
/* Red border */
/* hr.my-4 {
  border-top: 1px solid red;
} */


html, body{
  height: 100%;
  width: 100%;
  overflow-x:hidden;
  font-family: 'Poppins', sans-serif; /*main foint poppins, backup font sans-serif*/
  color: #222; /*Black but much softer */
}

.navbar {
  padding: .6rem; /*1 rem = 16 pixel*/
  
}

.navbar-nav li{
  padding-right: 20px; /*padding ni kira macam jarakkan ah*/
}

.nav-link{
  font-size: 1.1em !important;
}

.carousel-inner img{
  width: 100%;
  height: 100%; /*take up full screen and show the whole image*/
}

.carousel-caption{
  position: absolute;
  top: 50%;
  transform: translateY(40%);
}

.carousel-caption h1 {
  font-size:500%;
  text-transform: uppercase;
  text-shadow: 1px 1px 10px #000;
}

.carousel-caption h3 {
  font-size: 200%;
  font-weight: 500;
  text-shadow: 1px 1px 10px #000;
  padding-bottom: 1rem;
}

.btn-primary{

}

.btn-primary:hover {

}

.jumbotron{
  padding: 1rem;
  border-radius: 0;
}

.padding{
  padding-bottom: 2rem;
}

.welcome{
  width:75%;
  margin: 0 auto;
  padding-top: 2rem;
}

.welcome hr {
  border-top: 2px solid #b4b4b4;
  width: 95%;
  margin-top: .3rem;
  margin-bottom: 1rem;
}

.fa-search {
  color: #e54d26;  
}

.fa-star{
  color: #FFD700;
}

.fa-stopwatch{
  color: #2163af;
}

.fa-search, .fa-star, .fa-stopwatch{
  font-size: 4em;
  margin: 1rem;
}

footer{
  background-color: #000000;
  color: #d5d5d5;
  padding-top: 2rem;
}

hr.light {
  border-top: 1px solid #d5d5d5;
  width:75%;
  margin-top: .8rem;
  margin-bottom: 1rem;
}

footer a {
  color: #d5d5d5;
}

hr.light-100{
  border-top: 1px solid #d5d5d5;
  width: 100%;
  margin-top: .8rem;
  margin-bottom: 1rem;
}

.fa-envelope, .fa-phone {
  margin: 1rem;
}
  
</style>
</head>
  
<body>
    
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/logoWhite.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Case Study</a> <!--Majlis, taman dan seumpamanya-->
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Features</a> <!--show off sikit reccomender dgn voting system-->
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Status</a> <!--statuspage.io-->
        </li>
      </ul>
    </div>
  </div>
  </nav>
  
  <!--Image Slider-->
  <div id="slides" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#slides" data-slide-to="0" class="active"></li>
    <li data-target="#slides" data-slide-to="1"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/test2.jpg">
      <div class="carousel-caption">
        <h1 class="display-2">FUTTER</h1>
        <h3>Login | Play | Have fun. <h3>
        <a  class="btn btn-outline-light btn-lg" href="{{ route('login') }}">LOGIN</a>
        <a  class="btn btn-primary btn-lg" href="{{ route('register') }}">Get Started</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/test3.jpg">
    </div>
  </div>
  </div>

  <!--Jumbotron-->
  <div class="containter-fluid">
  <div class="row jumbotron">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
    <p class="lead">A web application that allows individuals to create & play futsal match with the capabilitiy of booking a venue and a recommender via our rating algorithm.</p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
      <a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">View Demo</button></a>
    </div>
  </div>
  </div>

  <!-- Welcome Section-->
  <div class="container-fluid padding">
  <div class="row welcome text-center">
    <div class="col-12">
      <h1 class="display-4">Ease the process.</h1>
    </div>
    <hr>

  </div>
  </div>

  <!--Three Column Section-->
  <div class="container-fluid padding">
  <div class="row text-center padding">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <i class="fas fa-search"></i> <!--aq test kt sini dulu dia tak keluar-->
      <h3>FIND</h3>
      <p>Easier to build a roster for a Futsal match in a community among strangers and acquaintance</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <i class="far fa-star"></i>
      <h3>RECOMMEND</h3>
      <p>Recommed the best position for players based on ratings. </p>
    </div>
    <div class="col-sm-12 col-md-4">
      <i class="fas fa-stopwatch"></i>
      <h3>FAIR</h3>
      <p>Fair play in terms of rules and playing time. </p>
    </div>
  </div>
  <hr class="my-4"> <!--Horizontal Line Supposedly-->
  </div>

  <!--Two Column Section-->
  {{-- <div class="container-fluid padding">
  <div class="row padding">
    <div class = "col-lg-6">
      <h2>If you build it...</h2>
      <p>The columns will automatically stack on top of each other when the screen is less than 576px wide.</p>
      <p>Resize the rowser window to see the effect. Responsive web has become more important as the amount of 
        mobile traffic now accounts for more than half of total internet traffic.</p>
      <p>It can also display the web page differently depending on the screen size or viewing device.</p>
      <br>
      <a href="#" class="btn btn-primary">Learn More</a>
    </div>
    <div class="col-lg-6">
      <img src="img/rivaldo.jpg" class="img-fluid">
    </div>
  </div>
  </div>
  <hr class="my-4"> --}}

  <!--Fixed Background-->
  <figure>
    <div class="fixed-wrap">
      <div id="fixed">
      </div>
    </div>
  </figure>

  <!--Footer-->
  <footer>
  <div class="container-fluid padding">
  <div class="row text-center">
    <div class="col-md-4">
      <img src="img/logoBlack.png"> <!--logo-->
      <hr class="light">
      <p><i class="far fa-envelope"></i>msharifismail01@gmail.com</p>
      <p>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <hr class="light">
      <p><i class="fas fa-phone"></i>+6013-7614520</p>
      <hr class="light">
      <p>UiTM</p>
    </div>
    <div class="col-12">
      <hr class="light">
      <h5>&copy; futter.com </h5>
    </div>
  </div>
  </div> 
  </footer>

</body>
</html>


        
