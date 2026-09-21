<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../../connect.php");
  $tag= "";
 ///---ADD Tests STARTS HERE----///
if(isset($_POST['btnaddnew']))
    {  
      $id=$_POST['id'];
    $TXTn=$_POST['name'];
    $txtdes=$_POST['description'];
    $txtclass=$_POST['class'];
     $uploadfile = 'img/'. $TXTn. ".jpg";
 move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile);    
mysqli_query($con,"INSERT INTO `cms`.`events` (`name`,`description`,`class`,`photo`)
values('$_POST[name]','$_POST[description]','$_POST[class]','$uploadfile')") or die(mysqli_error());    
 echo "<Script> alert('Registered Successfully')</script>";
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
      <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i>Event Management</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Forms</li>
						<li><i class="fa fa-files-o"></i>Add</li>
					</ol>
          	</div>
			</div>
			
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             ADD DETAILS:
                          </header>
                          <form name="f1" method="post" enctype="multipart/form-data" action="">
                          <div class="panel-body">
                          <div style="width: 900px; height: auto; float: left;">
                                      <div class="col-sm-3 form-group">
                                      <label for="name">Name:</label>
                                 <input type="text" name="name" class="form-control"/>        
                        </div>
                             <div class="col-sm-2 form-group">
                             <label>Description:</label> 
                             <input type="TEXT" name="description" class="form-control"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Class:</label>
                                    <select name=class  class="form-control">
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
                            <div style="width: 220px; height: auto; float: left;"> 
                          <div class="col-sm-6 form-group" >
                          <img src="<?php echo $uploadfile; ?>" id="img"  width="200" height="200"/>
								<label>PHOTO:</label>
								<input type="FILE"  name="userfile" class="form-control" style="width: 200px;"  id="userfile" accept="image/*" onchange="loadFile(event)"/>
                          </div>
                          </div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnaddnew" value="Save" />  
                                 </div>
                             </div>
                        </section>   
                          </form>