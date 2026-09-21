<header class="panel-heading">
                Admission Table
                </header>
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                <th><i class="icon_profile"></i>#</th>
                <th><i class="icon_profile"></i>Name</th>
                                <th><i class="icon_profile"></i>Email</th>
                              <th><i class="icon_mobile"></i>Contact</th>  
                                  <th><i class="icon_mobile"></i>Message</th>
                         
<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../../connect.php");
  $tag= "";
  $msg="" ;
  $i=1;
   $sql=mysqli_query($con,"SELECT * FROM contactform");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
    $TXTNAME=$ROW['name'];
    $TXTem=$ROW['email'];
     $txtph=$ROW['phone'];
    $txtmsg=$ROW['message'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTNAME."</TD><TD>".$TXTem."</TD><TD>".$txtph."</TD><TD>".$txtmsg."</TD></TR>";
}
            }
?>
</tr>
         </tbody>