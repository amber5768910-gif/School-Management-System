<header class="panel-heading">
                Result Table
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                     <tr>
                <th><i class="icon_profile"></i>Sno</th>
                                <th><i class="icon_profile"></i>Student Name</th>
                                  <th><i class="icon_mobile"></i>Class</th>
                                 <th><i class="icon_mail_alt"></i>Exam Type</th>
                                  <th colspan=2><i class="icon_mobile"></i>Action</th>
                                  <th><i></i></th> 
                  <?php
//error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../../connect.php");
  $tag= "";
  $msg="" ;
 $i=1;
   $sql=mysqli_query($con, "SELECT id,studentname,class,type FROM examresult Where class=11 GROUP BY studentname");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
      $id=$ROW['id'];         
    $TXTs=$ROW['studentname'];
    $TXTclass=$ROW['class'];
    $txttype=$ROW['type'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTs."</TD><TD>". $TXTclass."</TD><TD>".$txttype."</TD><TD colspan=3><a href=index.php?tag=vieweleven&sn=".$ROW['studentname'].">VIEW</a></TD></TR>";
}
            }
             if($tag=="vieweleven")
            {
                include("viewelevenresult.php");
            }
?>
 
</section>
                  </div>
</tbody>