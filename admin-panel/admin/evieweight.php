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
    $txtsub=$_POST['subject'];
    $txtmarks=$_POST['total_marks'];
    $txtom=$_POST['obtained_marks'];
    $txttype=$_POST['type'];
  $sqll="UPDATE `cms`.`examresult`set `subject`='$_POST[subject]',`total_marks`='$_POST[total_marks]',`obtained_marks`='$_POST[obtained_marks]', `type`='$_POST[type]' where id=$id" or die(mysqli_error());
   mysqli_query($con,$sqll);  
   
if(!mysqli_query($con,$sqll)){
      die("Sorry Record Not Saved");
    }
    else{    
        echo "<Script> alert('Exam Result Updated Successfully')</script>";     
         echo '<script>location.replace("index.php")</script>';
         }
}

$linkid=$_GET['id'];
$linkdid=$_GET['Did'];
if(!empty($linkdid)){
    $sql="delete from examresult where id=".$linkdid."";
    if(!mysqli_query($con,$sql)) {
         die("Sorry Record Not Deleted"); }
         else{  
     echo "<Script> alert('Exam Result Deleted Successfully')</script>";
    echo "<script>location.replace('index.php')</script>";
      } 
      }
if(!empty($linkid)){
$sql="select * from examresult where id=".$linkid."";
$resource=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($resource);
}
?>
  <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             EDIT EXAM DETAILS:
                          </header>
                          <form name="f1" method="post" enctype="multipart/form-data" action="">
                          <div class="panel-body">
                          <div style="width: 900px; height: auto; float: left;">
                              <div class="col-sm-2 form-group" >
								<label>ID:</label>
								       <input type=number name=id  class="form-control" value="<?php echo $rows['id']; ?>"/>
                        </div>
                             <div class="col-sm-2 form-group">
                             <label>Subject :</label>
							<input type="TEXT" name="subject" class="form-control" value="<?php echo $rows['subject']; ?>"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Total Marks :</label>
                               <input type="numbers" name="total_marks" class="form-control" value="<?php echo $rows['total_marks']; ?>"/>          
                      		 </div>
                              	<div class="col-sm-2 form-group">
                              	<label>Obtained Marks :</label>
							  	<input type="numbers" name="obtained_marks" class="form-control" value="<?php echo $rows['obtained_marks']; ?>"/>    
                              	</div>
                                <div class="col-sm-3 form-group">
                              	<label>Test Type :</label>
							  	     <select name=type class="form-control">
                                 <option value="<?php echo $rows['type']; ?>"><?php echo $rows['type']; ?><option>
                                       <option value="1stterm">1st Term<option>
                                   <option value="2ndterm">2nd Term<option>
                                    <option value="finalterm">Final Term<option>
                                 </select>   
                              	</div>
                                  </div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnupd" value="Update" />  
                                 </div>
                             </div>
                        </section>   
                          </form>