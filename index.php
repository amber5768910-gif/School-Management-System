<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Best School System</title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="adward-master/css/bootstrap.css" />
  <!-- progress barstle -->
  <link rel="stylesheet" href="adward-master/css/css-circular-prog-bar.css">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="adward-master/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="adward-master/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="adward-master/css/css-circular-prog-bar.css">
</head>
<body>
  <div class="top_container">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <img src="adward-master/images/logo.png" alt="">
            <span>
              School
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="adward-master/about.php"> About </a>
                </li>

                <li class="nav-item ">
                  <a class="nav-link" href="adward-master/staff.php"> Staff </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="adward-master/contact.php">Contact Us</a>
                </li>
                </ul>
                <ul class="navbar-nav  ">
               <li class="nav-item">
                  <a class="nav-link" href="adward-master/events.php">Events </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin-panel/login.php"> Login</a>
                </li>
              </ul>
            </div>
        </nav>
      </div>
    </header>
    <section class="hero_section">
      <div class="hero-container container">
        <div class="hero_detail-box">
          <h3>
            Welcome to <br>
            Best educations
          </h3>
          <h1>
            school
          </h1>
          <p>
            Every child's core brain development depends on the school you choose. A great school system is the cruicial step which can change an entire 
            coutry's future.
          </p>
          <div class="hero_btn-continer">
            <a href="adward-master/admissions.php" class="call_to-btn btn_white-border" style="color: black;">
              <span>
                Apply For Admissions
              </span>
              <img src="adward-master/images/right-arrow.png" alt="">
            </a>
          </div>
        </div>
        <div class="hero_img-container">
          <div>
            <img src="adward-master/images/hero.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end header section -->

  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="container">
      <h2 class="main-heading ">
        About School
      </h2>
      <p class="text-center">
        Our school is one of the most popular well managed school systems in the country.We believe that any child's brain development depends entirely
        on the school system in which he goes and we take full responsibility in providing the best staff and resources that a student will need.
      </p>
      <div class="about_img-box ">
        <img src="adward-master/images/kids.jpg" alt="" class="img-fluid w-100">
      </div>
      <div class="d-flex justify-content-center mt-5">
        <a href="adward-master/about.php" class="call_to-btn  ">

          <span>
            Read More
          </span>
          <img src="adward-master/images/right-arrow.png" alt="">
        </a>
      </div>
    </div>
  </section>


  <!-- about section -->

  <!-- teacher section -->
  <section class="teacher_section layout_padding-bottom">
    <div class="container">
      <h2 class="main-heading ">
        Our Teachers
      </h2>
      <p class="text-center">
       We hire one of the most qualifies and specialized teachers to make sure a very bright future of our students
      </p>
        <div class="teacher_container layout_padding2">
        <div class="card-deck">
         <?php
error_reporting(0);
if (!isset($_SESSION))
  {
    session_start();
    }
    include("connect.php");
    $tag= "";
    $msg="" ;
    $sql="SELECT * FROM teachers";
    $sqlteach=mysqli_query($con,$sql);
    $totalrows=mysqli_num_rows($sqlteach);
    if(mysqli_num_rows($sqlteach) >= 1)
      {
        $i="";
        while($getteachInfo = mysqli_fetch_array($sqlteach)){
          $prodn = $getteachInfo["name"];
          $prodph = $getteachInfo["photo"];
          // $i=$i+1;
          echo '<div class="card">
          <img class="card-img-top" src="admin-panel/admin/'.$prodph.'" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">'.$prodn.'</h5>
          </div>
          </div>';
       }
      }      
      ?>
                </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
        <a href="adward-master/staff.php" class="call_to-btn  ">
          <span>
            See More
          </span>
          <img src="adward-master/images/right-arrow.png" alt="">
        </a>
      </div>
    </div>
  </section>

  <!-- teacher section -->
<section class="vehicle_section layout_padding">
    <div class="container">
      <h2 class="main-heading ">
       Events
      </h2>
      <p class="text-center">
        Co curricular events are as important as the academic activities and we pay special attention towards students'
        co-curricular activities by organizing several events every year.
      </p>
      <div class="layout_padding-top">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php
  $sqle="SELECT * FROM events";
  $sqleve=mysqli_query($con,$sqle);
  if(mysqli_num_rows($sqleve) >= 1)
    {
      $rows=mysqli_fetch_array($sqleve);
      $EventPhoto = $rows["photo"];
        echo  '<div class="carousel-item active">
              <div class="vehicle_img-box ">
                <img src="admin-panel/admin/'.$EventPhoto.'" alt="" class="img-fluid w-100">
              </div>
            </div>';
        while($rows=mysqli_fetch_array($sqleve))
              {     
			             $prodn = $rows["name"];
			             $prodph = $rows["photo"];
        echo  '<div class="carousel-item">
              <div class="vehicle_img-box ">
                <img src="admin-panel/admin/'.$prodph.'" alt="" class="img-fluid w-100">
              </div>
            </div>';
              }
              }
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </div>
  </section>
  <!-- events section -->

 <!-- event section -->
  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <h2 class="main-heading ">
        Our Students Feedback
      </h2>
      <p class="text-center">
     We belive that a school's true performance can only be seen through it's students.And wht they think about their school
     is a very important aspect that shouldnt be ignored
      </p>
      <div class="layout_padding2">
        <div class="client_container d-flex flex-column">
          <div class="client_detail d-flex align-items-center">
            <div class="client_img-box ">
              <img src="adward-master/images/student.png" alt="">
            </div>
            <div class="client_detail-box">
              <h4>
                Hania Asghar
              </h4>
              <span>
                FSC Graduate from this school
              </span>
            </div>
          </div>
          <div class="client_text mt-4">
            <p>
              "THis school offers innovative guidlines and co-operative environment for it's students.In here students in Higher Secondary level are 
fully equipped with applied and professional skills by means of regular weekly seminars and paper presentations, pure English environment broader 
to scope of career oppurtunities.They provide peace and healthy environment. There are computer lab with standard ratio of
computer and students also the well- furnished classrooms,standard library facilities and spacious reading room."
 </p>
          </div>
        </div>
      </div>
    </div>
  </section>




  <!-- client section -->

  <!-- contact section -->
   <?php
   if(isset($_POST['submit']))
    {  
      $id=$_POST['id'];
    $txtname=$_POST['name'];  
    $txtem=$_POST['email'];
    $txtmes=$_POST['message'];
    $txtphn=$_POST['phone'];
mysqli_query($con,"INSERT INTO `cms`.`contactform` (`name`,`email`,`message`,`phone`)
values('$_POST[name]','$_POST[email]','$_POST[message]','$_POST[phone]')") or die(mysqli_error());    
 echo "<Script> alert('Message Sent Successfully')</script>";
  } 
?>

  <section class="contact_section layout_padding-bottom">
    <div class="container">

      <h2 class="main-heading">
        Contact Now

      </h2>
      <p class="text-center">
       For any further information or message contact us now:
 
      </p>
      <div class="">
        <div class="contact_section-container">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="contact-form">
                <form name=f1 method="post" action="">
                  <div>
                    <input type="text" placeholder="Name" name="name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" name="phone">
                  </div>
                  <div>
                    <input type="email" placeholder="Email" name="email">
                  </div>
                  <div>
                    <input type="text" placeholder="Message" class="input_message" name="message">
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover" name="submit">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>


  <!-- end contact section -->

  <!-- admission section -->
  <section class="admission_section ">
    <div class="container-fluid position-relative">
      <div class="row h-100">
        <div id="map" class="h-100 w-100 ">
        </div>
        <div class="container">
          <div class="admission_container position-absolute">
            <div class="admission_img-box">
              <img src="adward-master/images/kidss.jpg" alt="">
            </div>
            <div class="admission_detail">
              <h3>
                Apply for Admission
              </h3>
              <p class="mt-3 mb-4">
                Our school is one of the most popular well managed school systems in the country.We believe that any child's brain development depends entirely
        on the school system in which he goes. 
              </p>
              <div class="">
                <a href="adward-master/admissions.php" class="admission_btn btn_on-hover">
                  Read More
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- admission section -->


  <!-- landing section -->
  <section class="landing_section layout_padding">
    <div class="container">
      <h2 class="main-heading">
        Best Education System in the City

      </h2>
      <h2 class="main-heading number_heading">
        Gives Remarkable Results Every Year

      </h2>
      <p class="landing_detail text-center">
        Every child's core brain development depends on the school you choose. A great school system is the cruicial step which can change an entire 
            coutry's future.
           </p>
    </div>
  </section>

  <!-- end landing section -->




  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="adward-master/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="adward-master/js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->
</body>

</html>