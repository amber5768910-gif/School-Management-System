<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../../connect.php");
  $tag= "";
 ///---ADD Student STARTS HERE----///
if(isset($_POST['btnupd']))
{  
    $id=$_POST['id'];
    $TXTclass=$_POST['class'];
    $txtsub=$_POST['subject'];
    $txtmarks=$_POST['marks'];
    $txtgt=$_POST['gtime'];
    $txtst=$_POST['stime'];
    $txtm=$_POST['tmonth'];
  $sqll="UPDATE `cms`.`gtests`set `class`='$_POST[class]',`subject`='$_POST[subject]',`marks`='$_POST[marks]', `gtime`='$_POST[gtime]',`stime`='$_POST[stime]',`tmonth`='$_POST[tmonth]' where id=$id" or die(mysqli_error());
   mysqli_query($con,$sqll);  
 echo "<Script> alert('Grand Test Updated Successfully')</script>";
   
if(!mysqli_query($con,$sqll)){
      die("Sorry Record Not Saved");
    }
    else{    
        echo "<Script> alert('Grand Test Updated Successfully')</script>";     
         echo '<script>location.replace("index.php")</script>';
         }
}

$linkid=$_GET['id'];
$linkdid=$_GET['Did'];
if(!empty($linkdid)){
    $sql="delete from gtests where id=".$linkdid."";
    if(!mysqli_query($con,$sql)) {
         die("Sorry Record Not Deleted"); }
         else{  
     echo "<Script> alert('Grand Test Deleted Successfully')</script>";
    echo "<script>location.replace('index.php')</script>";
      } 
      }
if(!empty($linkid)){
$sql="select * from gtests where id=".$linkid."";
$resource=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($resource);
}
?>
  <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             EDIT TEST DETAILS:
                          </header>
                          <form name="f1" method="post" enctype="multipart/form-data" action="">
                          <div class="panel-body">
                          <div style="width: 900px; height: auto; float: left;">
                              <div class="col-sm-2 form-group" >
								<label>ID:</label>
								       <input type=number name=id  class="form-control" value="<?php echo $rows['id']; ?>"/>
                        </div>
                            <div class="col-sm-4 form-group">
								           <label>Class :</label>
                              <input type="text" name="class" class="form-control" value="<?php echo $rows['class']; ?>"/>
							              </div>
                             <div class="col-sm-2 form-group">
                             <label>Subject :</label>
							<input type="TEXT" name="subject" class="form-control" value="<?php echo $rows['subject']; ?>"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Marks :</label>
                               <input type="TEXT" name="marks" class="form-control" value="<?php echo $rows['marks']; ?>"/>          
                      		 </div>
                              	<div class="col-sm-2 form-group">
                              	<label>Given Time :</label>
							  	<input type="TEXT" name="gtime" class="form-control" value="<?php echo $rows['gtime']; ?>"/>    
                              	</div>
                                <div class="col-sm-2 form-group">
                              	<label>Starting Time :</label>
							  	     <input type="TEXT" name="stime" class="form-control" value="<?php echo $rows['stime']; ?>"/>    
                              	</div>
                                  <div class="col-sm-4 form-group" >
								<label>Test Month:</label>
								<input type="text"  name="tmonth" class="form-control" value="<?php echo $rows['tmonth']; ?>"/>
							</div>
                                  </div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnupd" value="Update" />  
                                 </div>
                             </div>
                        </section>   
                          </form>