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
    $TXTclass=$_POST['class'];
    $txtsub=$_POST['subject'];
    $txtmarks=$_POST['marks'];
    $txtgt=$_POST['gtime'];
    $txtst=$_POST['stime'];
    $txttype=$_POST['type'];
mysqli_query($con,"INSERT INTO `cms`.`exam` (`class`,`subject`,`marks`, `gtime`,`stime`,`type`)
values('$_POST[class]','$_POST[subject]','$_POST[marks]','$_POST[gtime]','$_POST[stime]','$_POST[type]')") or die(mysqli_error());    
 echo "<Script> alert('Result Registered Successfully')</script>";
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
					<h3 class="page-header"><i class="fa fa-files-o"></i> Exam Management</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Forms</li>
						<li><i class="fa fa-files-o"></i>Add Exams</li>
					</ol>
          	</div>
			</div>
			
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             ADD EXAMS DETAILS:
                          </header>
                          <form name="f1" method="post" enctype="multipart/form-data" action="">
                          <div class="panel-body">
                          <div style="width: 900px; height: auto; float: left;">
                                      <div class="col-sm-3 form-group">
                                      <label for="class">Class</label>
                                        <select name=class  class="form-control">
                                        <?php
                                       $sqls="select * from classes";
                                       $resource=mysqli_query($con, $sqls);
                                        while($result=mysqli_fetch_array($resource))
                                      {
                           echo "<option value=".$result['name'].">".$result['name']."</option>";
                            }
                            ?>
                        </select>
                        </div>
                             <div class="col-sm-2 form-group">
                             <label>Total Marks:</label>
							<input type="TEXT" name="marks" class="form-control"/>          
                      		 </div>
                              <div class="col-sm-2 form-group">
                             <label>Subject Name:</label>
                               <input type="TEXT" name="subject" class="form-control"/>          
                      		 </div>
                              	<div class="col-sm-2 form-group">
                              	<label>Given Time:</label>
							  	<input type="TEXT" name="gtime" class="form-control"/>    
                              	</div>
                                <div class="col-sm-2 form-group">
                              	<label>Starting Time:</label>
							  	     <input type="TEXT" name="stime" class="form-control"/>    
                              	</div>
                                 <div class="col-sm-4 form-group" >
								<label>Exam Type:</label>
								<select name=type class="form-control">
                                <option value="1stterm">1st Term<option>    
                                   <option value="2ndterm">2nd Term<option>
                                   <option value="finalterm">Final Term<option>  
                                 </select> 
							</div>
                                  </div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnaddnew" value="Save" />  
                                 </div>
                             </div>
                        </section>   
                          </form>