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
    $TXTn=$_POST['name'];
    $txtdes=$_POST['description'];
     $TXTc=$_POST['class'];
    $uploadfile = 'img/'. $TXTn. ".jpg";
  $sqll="UPDATE `cms`.`events` set `name`='$_POST[name]',`description`='$_POST[description]',`class`='$_POST[class]', `photo` ='$uploadfile' where id=$id" or die(mysqli_error());
   mysqli_query($con,$sqll);  
 echo "<Script> alert('Updated Successfully')</script>";
   
if(!mysqli_query($con,$sqll)){
      die("Sorry Record Not Saved");
    }
    else{    
        echo "<Script> alert('Updated Successfully')</script>";     
         echo '<script>location.replace("index.php")</script>';
         }
}

$linkid=$_GET['id'];
$linkdid=$_GET['Did'];
if(!empty($linkdid)){
    $sql="delete from events where id=".$linkdid."";
    if(!mysqli_query($con,$sql)) {
         die("Sorry Record Not Deleted"); }
         else{  
     echo "<Script> alert(' Deleted Successfully')</script>";
    echo "<script>location.replace('index.php')</script>";
      } 
      }
if(!empty($linkid)){
$sql="select * from events where id=".$linkid."";
$resource=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($resource);
}
?>
  <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             EDIT DETAILS:
                          </header>
                          <form name="f1" method="post" enctype="multipart/form-data" action="">
                          <div class="panel-body">
                          <div style="width: 900px; height: auto; float: left;">
                            <div style="width: 220px; height: auto; float: left;"> 
                          <div class="col-sm-6 form-group" >
                          <img src="<?php echo $rows['photo']; ?>" id="img"  width="200" height="200"/>
								<label>PHOTO:</label>
								<input type="FILE"  name="userfile" class="form-control" style="width: 200px;"  id="userfile" accept="image/*" onchange="loadFile(event)"/>
                          </div>
                          </div> 
                             <div class="col-sm-2 form-group">
                              <label>ID:</label>
								       <input type=number name=id  class="form-control" value="<?php echo $rows['id']; ?>"/>
                        </div>
                            <div class="col-sm-4 form-group">  
                             <label>Name :</label>
							<input type="TEXT" name="name" class="form-control" value="<?php echo $rows['name']; ?>"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Class:</label> 
                                 <select name=class class="form-control">
                             <option selected value="<?php echo $rows['class']; ?>"><?php echo $rows['class']; ?><option>     
                                        <?php
                                       $sqls="select * from classes";
                                       $resource=mysqli_query($con, $sqls);
                                        while($result=mysqli_fetch_array($resource))
                                      {
                           echo "<option value=".$result['id'].">".$result['name']."</option>";
                            }
                            ?>
                        </select> 
                                 </select>        
                      		 </div>
                              	<div class="col-sm-2 form-group">
                              	<label>Description:</label>
							  	<input type="TEXT" name="description" class="form-control" value="<?php echo $rows['description']; ?>"/>    
                              	</div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnupd" value="Update" />  
                                 </div>
                             </div>
                        </section>   
                          </form>