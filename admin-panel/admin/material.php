 <header class="panel-heading">
                Material Table
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                     <td align=right colspan=9 ><a href="index.php?tag=amaterial">Click here to Add</a></td>
                     </tr>
                     <tr>
                <th><i class="icon_profile"></i>Sno</th>
                <th><i class="icon_profile"></i>Name</th>
                                  <th><i class="icon_mobile"></i>Condition</th>
                       <th><i class="icon_mobile"></i>Type</th>             
                                 <th><i class="icon_mail_alt"></i>Total</th>
                                 <th><i class="icon_mail_alt"></i>Required</th>
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
   $sql=mysqli_query($con, "SELECT * FROM material");
     if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
      $id=$ROW['id'];         
    $TXTn=$ROW['name'];
    $txtcon=$ROW['mcondition'];
     $txttype=$ROW['type'];
    $txtm=$ROW['amount'];
    $txtreq=$ROW['required'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTn."</TD><TD>".$txtcon."</TD><TD>". $txttype."</TD><TD>". $txtm."</TD><TD>". $txtreq."</TD><TD><a href=index.php?tag=editm&id=".$ROW['id'].">EDIT</a></TD><td><a href=index.php?tag=editm&Did=".$ROW['id'].">DELL</a></td></TR>";
}
            }

            if($tag=="editm")
            {
                include("editmaterial.php");
            }
   if($tag=="amaterial")
            {
                include("addmaterial.php");
            }
?>
</tr>
         </tbody>