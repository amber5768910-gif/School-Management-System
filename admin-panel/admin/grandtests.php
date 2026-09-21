 <header class="panel-heading">
                Tests Table
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                     <td align=right colspan=9 ><a href="index.php?tag=agtests">Click here to Add Tests</a></td>
                     </tr>
                     <tr>
                <th><i class="icon_profile"></i>Sno</th>
                <th><i class="icon_profile"></i>Class</th>
                                  <th><i class="icon_mobile"></i>Subject Name</th>
                                 <th><i class="icon_mail_alt"></i>Test Marks</th>
                                  <th><i class="icon_mobile"></i>Given Time</th>
                                 <th><i class="icon_mail_alt"></i>Starting time</th>
                                 <th><i class="icon_profile"></i>Test Month</th>
                                  <th><i class="icon_mobile"></i>Action</th>
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
   $sql=mysqli_query($con, "SELECT * FROM gtests");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
      $id=$ROW['id'];         
    $TXTclass=$ROW['class'];
    $txtsub=$ROW['subject'];
    $txtmarks=$ROW['marks'];
    $txtgt=$ROW['gtime'];
    $txtst=$ROW['stime'];
    $txtm=$ROW['tmonth'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTclass."</TD><TD>".$txtsub."</TD><TD>". $txtmarks."</TD><TD>".$txtgt."</TD><TD>".$txtst."</TD><TD>".$txtm."</TD><TD><a href=index.php?tag=editgt&id=".$ROW['id'].">EDIT</a></TD><td><a href=index.php?tag=editgt&Did=".$ROW['id'].">DELL</a></td></TR>";
}
            }

            if($tag=="editgt")
            {
                include("editgtests.php");
            }
   if($tag=="agtests")
            {
                include("addgtests.php");
            }
?>
</tr>
         </tbody>