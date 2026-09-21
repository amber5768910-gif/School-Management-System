
<section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
					
				</div>
			</div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4><?php echo $_SESSION['user_role'];?></h4>               
                              <div class="follow-ava">
                                  <img src="../img/profile-widget-avatar.jpg" alt="">
                              </div>
                              <h6></h6>
                            </div>
                           
                           
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                 
                                  <?php 
error_reporting(0);
if(!isset($_SESSION))
{
session_start();    
}
include("../../connect.php"); 
	$sql="SELECT * FROM staff where id='$_SESSION[user_id]'";
    $a=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($a);
	  $Name=$row['name'];  
	  $_SESSION['user_role']=$row['role'];
        $contact=$row['contact'];
        $status=$row['status'];
        $uemail=$row['email'];
        $uname=$row['username'];
        $Gender=$row['gender'];
        $Password=$row['password'];
        $BirthDate=$row['BirthDate'];
         
                
    if(isset($_POST['btnaddnew']))
    {
            mysqli_query($con,"update staff set name='$_POST[name]', role='$_POST[role]',BirthDate='$_POST[BirthDate]', email='$_POST[email]', contact='$_POST[contact]', status='$_POST[status]', username='$_POST[useranme]',gender='$_POST[gender]',password='$_POST[password]' where id='$_SESSION[user_id]'") or die(mysqli_error());
                echo "<Script> alert('Profile Edited Successfully')</script>";
    }
       
		//echo "Successfully Entered";
		//header('Location: u_index.php');
        //if(!empty($_SESSION['uname'])){
        //echo "<script> window.location.href='index.php'</script>";    
        ?>
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane">
                                    <section class="panel">
                                      
                                              
                                      
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                              <p><span>Full Name : </span> <?php echo $Name; ?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Contact : </span><?php echo $contact; ?></p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span>Email :</span> <?php echo $uemail; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Gender : </span><?php echo  $Gender; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Birth Date :</span><?php echo $BirthDate; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Status :</span><?php echo $status; ?></p>
                                              </div>
                                             
                                              <div class="bio-row">
                                                  <p><span>Username :</span><?php echo $uname; ?></p>
                                              </div>
                                               <div class="bio-row">
                                                  <p><span>Password :</span><?php echo $Password; ?></p>
                                              </div>
                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">                                                  
      		            <div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Full Name</label>
								<input type="text" required  class="form-control" name="name" value="<?php echo $Name; ?>" />
							</div>
							<div class="col-sm-6 form-group">
								<label>Contact</label>
								<input type="text" required  class="form-control"  name="contact" value="<?php echo $contact; ?>" />
							</div>
                            <div class="col-sm-6 form-group">
								<label>Email</label>
								<input type="date" required  class="form-control"  name="email" value="<?php echo $uemail; ?>" />
							</div>
						</div>					
						<div class="form-group">
							<label>Gender</label>
							<textarea required  rows="3" class="form-control" name="gender" ><?php echo $Gender; ?></textarea>
						</div>	
						<div class="row">	
							<div class="col-sm-4 form-group">
								<label>Birth Date</label>
								<input type="text" required name="BirthDate"  class="form-control" value="<?PHP echo $BirthDate; ?>" />
							</div>	
							<div class="col-sm-2 form-group">
								<label>Status</label>
								<input type="email"  required  class="form-control" name="status" value="<?PHP echo $status; ?>"/>
							</div>
							</div>	
                            <div class="col-sm-4 form-group">
								<label>User Name</label>
								<input type="text" required name="username"  class="form-control" value="<?PHP echo $uname; ?>"/>
							</div>
                            <div class="col-sm-4 form-group">
								<label>Password</label>
								<input type="password" required  class="form-control" name="password" value="<?php echo $Password; ?>" />
							</div>
					</div>
                            <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary" name="btnaddnew">Save</button>
                                                          <button type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>