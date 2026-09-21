<header class="panel-heading">
                Events Table
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                     <td align=right colspan=9 ><a href="index.php?tag=aevent">Click here to Add Event</a></td>
                     </tr>
                     <tr>
                <th><i class="icon_profile"></i>Sno</th>
                <th><i class="icon_profile"></i>Name</th>
                                  <th><i class="icon_mobile"></i>Description</th>
                       <th><i class="icon_mobile"></i>Class</th> 
                        <th><i class="icon_mobile"></i>Photo</th> 
                                 <th><i class="icon_mail_alt"></i>Actions</th>
                                  <th><i></i></th>
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
   $sql=mysqli_query($con, "SELECT * FROM events");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
      $id=$ROW['id'];         
    $TXTn=$ROW['name'];
    $txtdes=$ROW['description'];
     $txtclass=$ROW['class'];
      $txtpho=$ROW['photo'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTn."</TD><TD>".$txtdes."</TD><TD>". $txtclass."</TD><TD><img src='".$ROW['photo']."' WIDTH=100 HEIGHT=100></TD><TD><a href=index.php?tag=editevent&id=".$ROW['id'].">EDIT</a></TD><td><a href=index.php?tag=editevent&Did=".$ROW['id'].">DELL</a></td></TR>";
}
            }

            if($tag=="editevent")
            {
                include("editevent.php");
            }
   if($tag=="aevent")
            {
                include("addevent.php");
            }
?>
</tr>
         </tbody>