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
    $txtstu=$_POST['student'];  
    $TXTclass=$_POST['class'];
    $txtsub=$_POST['subject'];
    $txtmarks=$_POST['total_marks'];
    $txtom=$_POST['obtained_marks'];
    $txttype=$_POST['type'];
    $txtdate=$_POST['date'];
mysqli_query($con,"INSERT INTO `cms`.`tresult` (`student`,`class`,`subject`,`total_marks`,`obtained_marks`,`type`,`date`)
values('$_POST[student]','$_POST[class]','$_POST[subject]','$_POST[total_marks]','$_POST[obtained_marks]','$_POST[type]','$_POST[date]')") or die(mysqli_error());    
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
      <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Test Management</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Forms</li>
						<li><i class="fa fa-files-o"></i>Add Results</li>
					</ol>
          	</div>
			</div>
			
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             ADD TEST DETAILS:
                          </header>
                          <form name="f1" method="post" enctype="multipart/form-data" action="">
                          <div class="panel-body">
                          <div style="width: 900px; height: auto; float: left;">
                            <div class="col-sm-2 form-group">
                             <label>Student Name:</label>
							 <select name=student  class="form-control">
                                        <?php
                                       $sqls="select * from students";
                                       $resource=mysqli_query($con, $sqls);
                                        while($result=mysqli_fetch_array($resource))
                                      {
                           echo "<option value=".$result['name'].">".$result['name']."</option>";
                            }
                            ?>
                        </select>         
                      		 </div>
                         <div class="col-sm-2 form-group">
                             <label>Subject Name:</label>
                               <input type="TEXT" name="subject" class="form-control"/>          
                      		 </div>
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
							<input type="TEXT" name="total_marks" class="form-control"/>          
                      		 </div>
                             <div class="col-sm-2 form-group">
                             <label>Obtained Marks:</label>
							<input type="TEXT" name="obtained_marks" class="form-control"/>          
                      		 </div>
                              	    <div class="col-sm-3 form-group">
                              	<label>Test Type :</label>
							  	     <select name=type class="form-control">
                                <option value="weektest">Week Test<option>    
                                   <option value="grandtest">Grand Test<option>
                                 </select>   
                              	</div>
                                <div class="col-sm-2 form-group">
                              	<label>Date:</label>
							  	     <input type="date" name="date" class="form-control"/>    
                              	</div>
                                  </div>
                              <div class="col-sm-4 form-group">
                            <input type="SUBMIT" class="btn btn-lg btn-info" name="btnaddnew" value="Save" />  
                                 </div>
                             </div>
                        </section>   
                          </form>