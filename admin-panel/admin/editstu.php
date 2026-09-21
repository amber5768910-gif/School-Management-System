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
    $sid=$_POST['sid'];
    $TXTNAME=$_POST['NAME'];
    $TXTcontact=$_POST['TXTcontact'];
    $txtfather=$_POST['txtfname'];
    $txtrollno=$_POST['txtrn'];
    $txtclass=$_POST['txtclass'];
    $txtsection=$_POST['txtsection'];
    $txtgender=$_POST['txtgender'];
    $uploadfile = 'img/'. $txtrollno. ".jpg";;
//echo "<br />".$uploadfile."<br />"; 
  move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile);
mysqli_query($con,"UPDATE `cms`.`students`set `name`='$_POST[NAME]',`contact`='$_POST[TXTcontact]',`rollno`='$_POST[txtrn]',`fathername`='$_POST[txtfname]', `class_id`='$_POST[txtclass]',`section_name`='$_POST[txtsection]', `gender`='$_POST[txtgender]', `photo` ='$uploadfile' where sid=$sid") or die(mysqli_error());    
 echo "<Script> alert('Student Updated Successfully')</script>";
  }    
?>

<Script>
	    var loadFile = function (event) {
	        Alert_std_pic();
	        var reader = new FileReader();
	        reader.onload = function () {
	            var output = document.getElementById('img');
	            output.src = reader.result;
	        };
	        reader.readAsDataURL(event.target.files[0]);
	    };
</Script>
<script>
	    function Alert_std_pic() {
	        var std_pic_size = $('#' + 'std_pic')[0].files[0].size;
	        if (std_pic_size > 600000) {
	            alert("Photograph size is larger than 500KB");
	            document.getElementById('std_pic').value = '';
	            return false;

	        }
	    }
</script>
<?php
$sql=" SELECT * from students where sid= '$sid'";
$resource=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($resource);
?>
      <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Student Management</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Forms</li>
						<li><i class="fa fa-files-o"></i>Add Student</li>
					</ol>
          	</div>
			</div>
			
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             ADD STUDENT DETAILS:
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
								       <select name=sid  class="form-control" value="<?php echo $rows['sid']; ?>">
                                        <?php
                                       $sqls="select * from students";
                                       $resource=mysqli_query($con, $sqls);
                                        while($result=mysqli_fetch_array($resource))
                                      {
                           echo "<option value=".$result['sid'].">".$result['sid']."-".$result['name']."</option>";
                            }
                            ?>
                        </select>
                        </div>
                            <div class="col-sm-4 form-group" >
								<label>Student Name:</label>
								<input type="text"  name="NAME" class="form-control" value="<?php echo $rows['name']; ?>"/>
							</div>
             
                            <div class="col-sm-4 form-group">
								           <label>Father Name</label>
                              <input type="text" name="txtfname" class="form-control" value="<?php echo $rows['fathername']; ?>"/>
							              </div>
                             <div class="col-sm-2 form-group">
                             <label>Roll No:</label>
							<input type="TEXT" name="txtrn" class="form-control" value="<?php echo $rows['rollno']; ?>"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Contact:</label>
                               <input type="TEXT" name="TXTcontact" class="form-control" value="<?php echo $rows['contact']; ?>"/>          
                      		 </div>
                                 <div class="col-sm-3 form-group">
                                      <label for="txtclass">Class</label>
                                        <select name=txtclass  class="form-control" value="<?php echo $rows['class_id']; ?>">
                                        <?php
                                       $sqls="select * from classes";
                                       $resource=mysqli_query($con, $sqls);
                                        while($result=mysqli_fetch_array($resource))
                                      {
                           echo "<option value=".$result['id'].">".$result['name']."</option>";
                            }
                            ?>
                        </select>
                        </div>
                              	<div class="col-sm-2 form-group">
                              	<label>Section Name:</label>
							  	<input type="TEXT" name="txtsection" class="form-control" value="<?php echo $rows['section_name']; ?>"/>    
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
          