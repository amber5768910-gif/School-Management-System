    <header class="panel-heading">
                Students Table
                </header>
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                <th><i class="icon_profile"></i>#</th>
                <th><i class="icon_profile"></i>Name</th>
                                <th><i class="icon_profile"></i>Contact</th>
                                  <th><i class="icon_mobile"></i>Father Name</th>
                                 <th><i class="icon_mail_alt"></i>Roll No</th>
                                  <th><i class="icon_profile"></i>Class</th>
                                  <th><i class="icon_mobile"></i>Section Name</th>
                                 <th><i class="icon_mail_alt"></i>Gender</th>
                                 <th><i class="icon_profile"></i>Photo</th>
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
   $sql=mysqli_query($con, "SELECT * FROM students");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
    $TXTNAME=$ROW['name'];
    $TXTcontact=$ROW['contact'];
    $txtfather=$ROW['fathername'];
    $txtrollno=$ROW['rollno'];
    $txtclass=$ROW['class_id'];
    $txtsection=$ROW['section_name'];
    $txtgender=$ROW['gender'];
    $txtphoto=$ROW['photo'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTNAME."</TD><TD>".$TXTcontact."</TD><TD>".$txtfather."</TD><TD>". $txtrollno."</TD><TD>".$txtclass."</TD><TD>".$txtsection."</TD><TD>".$txtgender."</TD><TD><img src=".$ROW['photo']." WIDTH=100 HEIGHT=100></TD><td><a href=index.php?tag=editsts&id=".$ROW['sid'].">EDIT</a></td><td><a href=index.php?tag=editsts&Did=".$ROW['sid'].">DELL</a></td></TR>";
}
            }

            if($tag=="editsts")
            {
                include("eds.php");
            }
?>
</tr>
         </tbody>