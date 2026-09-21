<div class="row" align=center>
                  <div class="col-sm-6">
                      <section class="panel">
                          <header class="panel-heading no-border">
                              Exam Result
                          </header>
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Subject Name</th>
                                  <th>Total Marks</th>
                                  <th>Obtained Marks</th>  
                                  <th>Type</th> 
                                  <th>Action</th>                
                              </tr>
                              </thead>

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
$linkname=$_GET['sn'];
if(!empty($linkname)){
$sql=mysqli_query($con,"select * from examresult where studentname='".$linkname."'");
  if(mysqli_num_rows($sql) >= 1)
            {
   while($ROW=mysqli_fetch_array($sql))
              {
      $id=$ROW['id'];         
    $TXTs=$ROW['subject'];
    $TXTmarks=$ROW['total_marks']; 
    $TXTom=$ROW['obtained_marks'];
    $txttype=$ROW['type'];
    echo "<TR><TD>".$i++."</TD><TD>".$TXTs."</TD><TD>".$TXTmarks."</TD><TD>".$TXTom."</TD><TD>".$txttype."</TD><TD><a href=index.php?tag=editviewseven&id=".$ROW['id'].">Edit</a></TD><TD><a href=index.php?tag=editviewseven&id=".$ROW['id'].">DELL</a></TD></TR>";
    }
            }
}
             if($tag=="editviewseven")
            {
                include("eviewseven.php");
            }

?>