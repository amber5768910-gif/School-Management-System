<header class="panel-heading">
                Result Table
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                     <tr>
                <th><i class="icon_profile"></i>Sno</th>
                                <th><i class="icon_profile"></i>Student Name</th>
                                  <th><i class="icon_mobile"></i>Class</th>
                                   <th><i class="icon_mobile"></i>Subject Name</th>
                                 <th><i class="icon_mail_alt"></i>Total Marks</th>
                                 <th><i class="icon_profile"></i>Obtained Marks</th>
                                 <th><i class="icon_mail_alt"></i>Test Type</th>
                                 <th><i class="icon_mail_alt"></i>Date</th>
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
   $sql=mysqli_query($con, "SELECT * FROM tresult Where class=1");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
      $id=$ROW['id'];         
    $TXTs=$ROW['student'];
    $TXTclass=$ROW['class'];
    $txtsub=$ROW['subject'];
    $txtmarks=$ROW['total_marks'];
    $txtom=$ROW['obtained_marks'];
    $txttype=$ROW['type'];
    $txtdate=$ROW['date'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTs."</TD><TD>".$TXTclass."</TD><TD>".$txtsub."</TD><TD>". $txtmarks."</TD><TD>".$txtom."</TD><TD>".$txttype."</TD><TD>".$txtdate."</TD><TD><a href=index.php?tag=editor&id=".$ROW['id'].">EDIT</a></TD><td><a href=index.php?tag=editor&Did=".$ROW['id'].">DELL</a></td></TR>";
}
            }

            if($tag=="editor")
            {
                include("editonetresult.php");
            }
?>
</tr>
         </tbody>