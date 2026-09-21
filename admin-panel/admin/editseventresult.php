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
    $TXTstudent=$_POST['student'];
    $TXTclass=$_POST['class'];
    $txtsub=$_POST['subject'];
    $txtmarks=$_POST['total_marks'];
    $txtom=$_POST['obtained_marks'];
    $txttype=$_POST['type'];
    $txtdate=$_POST['date'];
  $sqll="UPDATE `cms`.`tresult`set `student`='$_POST[student]',`class`='$_POST[class]',`subject`='$_POST[subject]',`total_marks`='$_POST[total_marks]',`obtained_marks`='$_POST[obtained_marks]', `type`='$_POST[type]',`date`='$_POST[date]' where id=$id" or die(mysqli_error());
   mysqli_query($con,$sqll);  
 echo "<Script> alert('Test Result Updated Successfully')</script>";
   
if(!mysqli_query($con,$sqll)){
      die("Sorry Record Not Saved");
    }
    else{    
        echo "<Script> alert('Test Result Updated Successfully')</script>";     
         echo '<script>location.replace("index.php")</script>';
         }
}

$linkid=$_GET['id'];
$linkdid=$_GET['Did'];
if(!empty($linkdid)){
    $sql="delete from tresult where id=".$linkdid."";
    if(!mysqli_query($con,$sql)) {
         die("Sorry Record Not Deleted"); }
         else{  
     echo "<Script> alert('Grand Test Deleted Successfully')</script>";
    echo "<script>location.replace('index.php')</script>";
      } 
      }
if(!empty($linkid)){
$sql="select * from tresult where id=".$linkid."";
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
                                      <label for="student">Student</label>
                                        <select name=student  class="form-control">
                                            <option selected value="<?php echo $rows['student']; ?>"><?php echo $rows['student']; ?><option>
                                        <?php
                                       $sqls="select * from students where class_id=7";
                                       $resource=mysqli_query($con, $sqls);
                                        while($result=mysqli_fetch_array($resource))
                                      {
                                       echo "<option value=".$result['name'].">".$result['name']."</option>";
                            }
                            ?> 
                        </select>
                        </div>
                            <div class="col-sm-4 form-group">
								           <label>Class :</label>
                              <input type="numbers" name="class" class="form-control" value="<?php echo $rows['class']; ?>"/>
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
                                       <option value="weektest">Week Test<option>
                                   <option value="grandtest">Grand Test<option>
                                 </select>   
                              	</div>
                                  <div class="col-sm-3 form-group" >
								<label>Date:</label>
								<input type="date"  name="date" class="form-control" value="<?php echo $rows['date']; ?>"/>
							</div>
                                  </div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnupd" value="Update" />  
                                 </div>
                             </div>
                        </section>   
                          </form>