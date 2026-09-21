<?php
include("../header.php");
?>
  <!-- end header section -->


  <!-- vehicle section -->
  <section>
    <div class="container">
      <h2 class="main-heading ">
        Events
      </h2>
      <p class="text-center">
       Co curricular events are as important as the academic activities and we pay special attention towards students'
        co-curricular activities by organizing several events every year.
      </p>
       <?php
       include("../connect.php");
  $sqle="SELECT * FROM events";
  $sqleve=mysqli_query($con,$sqle);
	   if(mysqli_num_rows($sqleve) >= 1)
                {
        while($rows=mysqli_fetch_array($sqleve))
              {     
			             $prodn = $rows["name"];
                    $proddis = $rows["description"];
			             $prodph = $rows["photo"];
        echo  ' <div class="layout_padding-top">
            <div class="vehicle_img-box ">
            <h2>'.$prodn.':</h2>
            <span>'.$proddis.'</span>
            <img src="../admin-panel/admin/'.$rows["photo"].'" alt="" class="img-fluid w-80">
             
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
            </div>
      </div>';
                }  
                }          
      ?>
       </div>
  </section>


  <!-- vehicle section -->


  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- progreesbar script -->

  </script>
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