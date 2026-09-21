<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../../connect.php");
  $tag= "";

$linkid=$_GET['id'];
$linkdid=$_GET['Did'];
if(!empty($linkdid)){
    $sql="delete from admissionf where id=".$linkdid."";
    if(!mysqli_query($con,$sql)) {
         die("Sorry Record Not Deleted"); }
         else{  
     echo "<Script> alert('Admission Deleted Successfully')</script>";
    echo "<script>location.replace('index.php')</script>";
      } 
      }
if(!empty($linkid)){
   $sql="select * from admissionf where id=".$linkid."";
$resource=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($resource);
$sqll="Insert into `cms`.`students` (`name`,`contact`,`fathername`,`class_id`,`gender`,`photo`)
  values('$rows[name]','$rows[contact]','$rows[fathername]','$rows[class]','$rows[gender]','".$rows['photo']."') " or die(mysqli_error());
  mysqli_query($con,$sqll);  
 echo "<Script> alert('Student Updated Successfully')</script>"; 
}
?>