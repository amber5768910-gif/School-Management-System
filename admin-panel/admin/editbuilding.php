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
    $txtcon=$_POST['condition'];
    $txtm=$_POST['measures'];
  $sqll="UPDATE `cms`.`building` set `name`='$_POST[name]',`bcondition`='$_POST[condition]',`measures`='$_POST[measures]' where id=$id" or die(mysqli_error());
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
    $sql="delete from building where id=".$linkdid."";
    if(!mysqli_query($con,$sql)) {
         die("Sorry Record Not Deleted"); }
         else{  
     echo "<Script> alert(' Deleted Successfully')</script>";
    echo "<script>location.replace('index.php')</script>";
      } 
      }
if(!empty($linkid)){
$sql="select * from building where id=".$linkid."";
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
                             <div class="col-sm-2 form-group">
                              <label>ID:</label>
								       <input type=number name=id  class="form-control" value="<?php echo $rows['id']; ?>"/>
                        </div>
                            <div class="col-sm-4 form-group">  
                             <label>Name :</label>
							<input type="TEXT" name="name" class="form-control" value="<?php echo $rows['name']; ?>"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Condition :</label> 
                                 <select name=condition class="form-control">
                             <option selected value="<?php echo $rows['bcondition']; ?>"><?php echo $rows['bcondition']; ?><option>     
                                <option value="good">Good<option>    
                                   <option value="fair">Fair<option>
                                  <option value="poor">Poor<option>   
                                 </select>        
                      		 </div>
                              	<div class="col-sm-2 form-group">
                              	<label>Measures:</label>
							  	<input type="TEXT" name="measures" class="form-control" value="<?php echo $rows['measures']; ?>"/>    
                              	</div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnupd" value="Update" />  
                                 </div>
                             </div>
                        </section>   
                          </form>