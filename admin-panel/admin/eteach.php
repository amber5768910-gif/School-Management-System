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
    $TXTNAME=$_POST['NAME'];
    $TXTcontact=$_POST['TXTcontact'];
    $txtspec=$_POST['txtspec'];
    $txtem=$_POST['email'];
    $txtgender=$_POST['txtgender'];
    $uploadfile = 'img/'. $TXTNAME. ".jpg";;
//echo "<br />".$uploadfile."<br />"; 
  move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile);
  $sqll="UPDATE `cms`.`teachers`set `name`='$_POST[NAME]',`contact`='$_POST[TXTcontact]',`specialization`='$_POST[txtspec]',`email`='$_POST[email]', `gender`='$_POST[txtgender]', `photo` ='$uploadfile'WHERE id=$id " or die(mysqli_error());
   mysqli_query($con,$sqll);  
 echo "<Script> alert('Teacher Updated Successfully')</script>";
   
if(!mysqli_query($con,$sqll)){
      die("Sorry Record Not Saved");
    }
    else{    
        echo "Saved Successfully";     
        //  echo '<script>location.replace("index.php")</script>';
         }
}

$linkid=$_GET['id'];
$linkdid=$_GET['Did'];
if(!empty($linkdid)){
    $sql="delete from teachers where id=".$linkdid."";
    if(!mysqli_query($con,$sql)) {
         die("Sorry Record Not Deleted"); }
         else{  
     echo "<Script> alert('Teacher Deleted Successfully')</script>";
    echo "<script>location.replace('index.php')</script>";
      } 
      }
if(!empty($linkid)){
$sql="select * from teachers where id=".$linkid."";
$resource=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($resource);
}
?>
  <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             EDIT TEACHERS DETAILS:
                          </header>
                          <form name="f1" method="post" enctype="multipart/form-data" action="">
                          <div class="panel-body">
                          <div style="width: 220px; height: auto; float: left;"> 
                          <div class="col-sm-6 form-group" >
                          <img src="<?php echo $rows['photo']; ?>" id="img"  width="200" height="200"/>
								<label>PHOTO:</label>
								<input type="FILE"  name="userfile" class="form-control" style="width: 200px;"  id="userfile" accept="image/*" onchange="loadFile(event)"/>
                          </div>
                          </div>

                          <div style="width: 900px; height: auto; float: left;">
                              <div class="col-sm-2 form-group" >
								<label>ID:</label>
								       <input type=number name=id  class="form-control" value="<?php echo $rows['id']; ?>"/>
                        </div>
                            <div class="col-sm-4 form-group" >
								<label>Teacher Name:</label>
								<input type="text"  name="NAME" class="form-control" value="<?php echo $rows['name']; ?>"/>
							</div>
                             <div class="col-sm-2 form-group">
                             <label>Email:</label>
							<input type="TEXT" name="email" class="form-control" value="<?php echo $rows['email']; ?>"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Contact:</label>
                               <input type="TEXT" name="TXTcontact" class="form-control" value="<?php echo $rows['contact']; ?>"/>          
                      		 </div>
                              	<div class="col-sm-2 form-group">
                              	<label>Specialization:</label>
							  	<input type="TEXT" name="txtspec" class="form-control" value="<?php echo $rows['specialization']; ?>"/>    
                              	</div>
                                <div class="col-sm-2 form-group">
                              	<label>Gender:</label>
							  	     <input type="TEXT" name="txtgender" class="form-control" value="<?php echo $rows['gender']; ?>"/>    
                              	</div>
                                  </div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnupd" value="Update" />  
                                 </div>
                             </div>
                        </section>   
                          </form>