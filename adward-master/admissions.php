<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../connect.php");
  include("../header.php");
  $tag= "";
 ///---Admission STARTS HERE----///
if(isset($_POST['submit']))
    {  
      
    $TXTNAME=$_POST['sn'];
    $TXTfather=$_POST['fn'];
    $txtcon=$_POST['cn'];
    $txtclass=$_POST['cl'];
    $txtgender=$_POST['gn'];
    $uploadfile = '../admin-panel/admin/img/'. $TXTNAME. ".jpg";
//echo "<br />".$uploadfile."<br />"; 
 move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile);
mysqli_query($con,"INSERT INTO `cms`.`admissionf` (`name`,`fathername`,`contact`,`class`, `gender`,`photo`)
values('$_POST[sn]','$_POST[fn]','$_POST[cn]','$_POST[cl]','$_POST[gn]','$uploadfile')") or die(mysqli_error());    
 echo "<Script> alert('Student Registered Successfully')</script>";
  }  
?>
  
  <section class="contact_section layout_padding-bottom">
    <div class="container">

      <h2 class="main-heading">
       Apply for Admission
    </h2>
      <p class="text-center">
       Fill the required forms and wait for the call from the authority:
      </p>
      <div class="">
        <div class="contact_section-container">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="contact-form">
  <Form name="F1" method="post" action="" enctype="multipart/form-data">
  <table border=1 width="120%" height=300 style="margin-top:80px"; align=center>
  <tr style="Display:none;"><td>ID</td><td><input type="hidden" name="ID" value=""></td></tr>
  <tr><td align=LEFT>STUDENTNAME:</td><td colspan=2><input type="text" name="sn"></td></tr>
  <tr><td align=LEFT>FATHERNAME:</td><td  colspan=2><input type="text" name="fn"></td></tr>
  <tr><td align=LEFT>CONTACT:</td><td colspan=2><input type="numbers" name="cn"></td></tr>
  <tr><td align=LEFT>CLASS:</td><td colspan=5><select name="cl">
         <?php
             $sqls="select * from classes";
       $resource=mysqli_query($con, $sqls);
        while($result=mysqli_fetch_array($resource))
               {
        echo "<option value=".$result['id'].">".$result['name']."</option>";
                }
       ?>
  </select></td></tr>
  <tr><td align=LEFT>GENDER:</td><td colspan=2 align-text=center>MALE<input type="radio" name=gn value="male">FEMALE<input type="radio" name=gn value="female"></td></tr>
  <tr><td align=LEFT><label type="file">UPLOAD</label></td>
  <td align=LEFT><input type="file" name="userfile"></td></tr>
  <tr><td alig-textn=center><input type="submit" name="submit"></td>
  <td colspan=2 align-text=center><input type="reset" name="reset"></td></tr>
  </table>
  </Form>
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