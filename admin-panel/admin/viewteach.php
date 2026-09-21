  <header class="panel-heading">
                Teachers Table
                </header>
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                <th><i class="icon_profile"></i>#</th>
                <th><i class="icon_profile"></i>Name</th>
                                <th><i class="icon_profile"></i>Contact</th>
                                  <th><i class="icon_mobile"></i>Email</th>
                                 <th><i class="icon_mail_alt"></i>Specialization</th>
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
   $sql=mysqli_query($con, "SELECT * FROM teachers");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
    $txtid=$ROW['id'];
    $TXTNAME=$ROW['name'];
    $TXTcontact=$ROW['contact'];
    $txtem=$ROW['email'];
    $txtspec=$ROW['specialization'];
    $txtgender=$ROW['gender'];
    $txtphoto=$ROW['photo'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTNAME."</TD><TD>".$TXTcontact."</TD><TD>".$txtem."</TD><TD>". $txtspec."</TD><TD>".$txtgender."</TD><TD><img src='".$ROW['photo']."' WIDTH=100 HEIGHT=100></TD><td><a href=index.php?tag=eteacher&id=".$ROW['id'].">EDIT</a></td><td><a href=index.php?tag=eteacher&Did=".$ROW['id'].">DELL</a></td></TR>";
}
            }

            if($tag=="eteacher")
            {
                include("eteach.php");
            }
?>
</tr>
         </tbody>