<?php
include("../header.php");
?>
  <!-- end header section -->

  <!-- contact section -->
<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../connect.php");
  $tag= "";
 ///---ADD Tests STARTS HERE----///
if(isset($_POST['btnsub']))
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
                    <input type="text" placeholder="Name" name=name>
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" name=phone>
                  </div>
                  <div>
                    <input type="email" placeholder="Email" name=email>
                  </div>
                  <div>
                    <input type="text" placeholder="Message" class="input_message" name=message>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" name=btnsub class="btn_on-hover">
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