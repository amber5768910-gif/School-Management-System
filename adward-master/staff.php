<?php
include("../header.php");
?>
  <!-- end header section -->


  <!-- teacher section -->
  <section class="teacher_section layout_padding-bottom">
    <div class="container">
      <h2 class="main-heading ">
        Our Principal
      </h2>
      <p class="text-center">
      School's future very much depend upon the person managing the entire school system and we 
      pay so much attention on this.
      </p>
        <div>
        <div>
          <div>
<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../connect.php");
  $tag= "";
  $msg="" ;
  $sqlprin="SELECT * FROM principal";
  $sqlpr=mysqli_query($con,$sqlprin);
  $totalrows=mysqli_num_rows($sqlpr);
	           if(mysqli_num_rows($sqlpr) >= 1)
                {
                  $i="";
                while($getteachInfo = mysqli_fetch_array($sqlpr)){
			             $prn = $getteachInfo["name"];
                   $prspec = $getteachInfo["specialization"];
                   $prcon = $getteachInfo["contact"];
                   $prem = $getteachInfo["email"];
			             $prph = $getteachInfo["photo"];                   
                // $i=$i+1;
        if ($i==3 || $i==6|| $i==9 || $i==12|| $i==16)
                {
        echo    '<tr><td>';                    
                }
        echo  '<div><table align=center>
		<tr><th>Name:</th><td align=left>'.$prn.' </td></tr>
    <tr>
   <td><img src="../admin-panel/admin/'.$getteachInfo['photo'].'" style="width:120px;height:120px;overflow:hidden;"></td>
   <table align=center>
   <tr><th align=right>Specialization:</th><td align=right>'.$prspec.'</td></tr>
   <tr><th>Contact:</th><td>'.$prcon.' </td></tr>
   <tr><th>Email:</th><td>'.$prem.' </td></tr>

   </table>
   </tr>
    </table>
    </div>
</td>
</tr>';
       }
                }      
      ?>
  
            </div>
          </div>
        </div>
    </div>
  </section>
    <section class="teacher_section layout_padding-bottom">
    <div class="container">
      <h2 class="main-heading ">
        Managment Committee
      </h2>
      <p class="text-center">
       The Best School Managment System can be formed when every staff member play their role wholeheartedly and 
       our school system is the best example of that.
      </p>
        <div>
        <div>
          <div>
<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../connect.php");
  $tag= "";
  $msg="" ;
  $sql="SELECT * FROM managecom";
  $sqlteach=mysqli_query($con,$sql);
  $totalrows=mysqli_num_rows($sqlteach);
	           if(mysqli_num_rows($sqlteach) >= 1)
                {
                  $i="";
                while($getteachInfo = mysqli_fetch_array($sqlteach)){
			             $prodn = $getteachInfo["name"];
                   $proddes = $getteachInfo["desgnation"];
                   $prodqu = $getteachInfo["qualification"];
                   $prodem = $getteachInfo["email"];
			             $prodph = $getteachInfo["photo"];                   
                // $i=$i+1;
        if ($i==3 || $i==6|| $i==9 || $i==12|| $i==16)
                {
        echo    '<tr><td>';                    
                }
        echo  '<div><table align=center>
		<tr><td>'.$prodn.' </td></tr>
    <tr>
   <td><img src="../admin-panel/admin/'.$getteachInfo['photo'].'" style="width:120px;height:120px;overflow:hidden;"></td>
   <th align=right>Specialization:</th><td align=right>'.$proddes.'</td>
   <th >,Contact:</th><td>'.$prodqu.' </td>
   <th >,Email:</th><td>'.$prodem.' </td>
   </tr>
    </table>
    </div>
</td>
</tr>';
       }
                }      
      ?>
  
            </div>
          </div>
        </div>
    </div>
  </section>
    <section class="teacher_section layout_padding-bottom">
    <div class="container">
      <h2 class="main-heading ">
        Our Teachers
      </h2>
      <p class="text-center">
       We hire one of the most qualifies and specialized teachers to make sure a very bright future of our students
      </p>
        <div>
        <div>
          <div>
<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../connect.php");
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
                   $prodspec = $getteachInfo["specialization"];
                   $prodcon = $getteachInfo["contact"];
                   $prodem = $getteachInfo["email"];
			             $prodph = $getteachInfo["photo"];                   
                // $i=$i+1;
        if ($i==3 || $i==6|| $i==9 || $i==12|| $i==16)
                {
        echo    '<tr><td>';                    
                }
        echo  '<div><table align=center>
		<tr><td>'.$prodn.' </td></tr>
    <tr>
   <td><img src="../admin-panel/admin/'.$getteachInfo['photo'].'" style="width:120px;height:120px;overflow:hidden;"></td>
   <th align=right>Specialization:</th><td align=right>'.$prodspec.'</td>
   <th >,Contact:</th><td align=right>'.$prodcon.' </td><br>
   <th >,Email:</th><td align=right>'.$prodem.' </td>
   </tr>
    </table>
    </div>
</td>
</tr>';
       }
                }      
      ?>
  
            </div>
          </div>
        </div>
    </div>
  </section>
  <section class="teacher_section layout_padding-bottom">
    <div class="container">
      <h2 class="main-heading ">
        Our CO-partners
      </h2>
      <p class="text-center">
       We'd like to thank our amazing co-partners for helping us build
       a beautiful education system.
      </p>
        <div>
        <div>
          <div>
<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../connect.php");
  $tag= "";
  $msg="" ;
  $sqlc="SELECT * FROM co_partner";
  $sqlco=mysqli_query($con,$sqlc);
  $totalrows=mysqli_num_rows($sqlco);
	           if(mysqli_num_rows($sqlco) >= 1)
                {
                  $i="";
                while($getteachInfo = mysqli_fetch_array($sqlco)){
			             $copn= $getteachInfo["name"];
                   $copspec = $getteachInfo["specialization"];
                   $copcon = $getteachInfo["contact"];
                   $copem = $getteachInfo["email"];
			             $copph = $getteachInfo["photo"];                   
                // $i=$i+1;
        if ($i==3 || $i==6|| $i==9 || $i==12|| $i==16)
                {
        echo    '<tr><td>';                    
                }
        echo  '<div><table align=center>
		<tr><td>'.$copn.' </td></tr>
    <tr>
   <td><img src="../admin-panel/admin/'.$getteachInfo['photo'].'" style="width:120px;height:120px;overflow:hidden;"></td>
   <th align=right>Specialization:</th><td align=right>'.$prodspec.'</td>
   <th >Contact:</th><td align=right>'.$copcon.' </td><br>
   <th >Email:</th><td align=right>'.$copem.' </td>
   </tr>
    </table>
    </div>
</td>
</tr>';
       }
                }      
      ?>
  
            </div>
          </div>
        </div>
    </div>
  </section>

  <!-- teacher section -->
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