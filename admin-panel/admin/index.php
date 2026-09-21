<?php
error_reporting(0);
require_once '../../session.php';
require_once '../../connect.php';
require_login(); 
session_start();
	$tag="";
	if (isset($_GET['tag']))
    {
	$tag=$_GET['tag'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template" />
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal" />
    <link rel="shortcut icon" href="img/favicon.png">
    <title>CONTROL PANEL</title>
    <!-- Bootstrap CSS -->    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">    
      <header class="header dark-bg" style="background: #ef8888">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">Control<span class="lite">Panel</span></a>
            <!--logo end-->
                    <?php 
    $sqlExistusers = mysqli_query($con,"select  count(*)  as TMSG from messages where status='ACTIVE'AND staff_id='$_SESSION[user_id]'");
    if(mysqli_num_rows($sqlExistusers) >= 1)
    {
    $ROW2=mysqli_fetch_array($sqlExistusers);
    {
        $TMSG=$ROW2['TMSG'];
        if(empty($TMSG))
        {
          $TMSG=0;  
        }      
    }
    } 
      ?>
                     <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row"> 
                    <ul class="nav pull-right top-menu">
                    <!-- inbox notificatoin start-->
                    <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important"><?php echo $TMSG; ?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="white">You have<?php echo $TMSG; ?>new messages</p>
                            </li>
                            <?php 
		    $sqlExistmessage = mysqli_query($con,"SELECT * FROM `messages` WHERE status='ACTIVE' and staff_id='$_SESSION[user_id]' order by mid desc limit 4");
   	        if(mysqli_num_rows($sqlExistmessage) >= 1)
            {
            while($ROW=mysqli_fetch_array($sqlExistmessage))
              {
              $MSGID=$ROW['mid'];
              $TXTMESSAGE=$ROW['message_detail'];
              $TXTDATE=$ROW['msg_date'];
              $TXTTID=$ROW['fromtid'];
            $sqlExistTenant = mysqli_query($con,"SELECT * FROM `teachers` WHERE id='$TXTTID'");
           	if(mysqli_num_rows($sqlExistTenant) >= 1)
            {
            $ROW2=mysqli_fetch_array($sqlExistTenant);  
            $TXTNAME=$ROW2['name'];
            }
            }
            ?>
                            <li>
                                <a href="eindex.php?tag=MSGVIEW&READ=<?php echo $MSGID; ?>&TID=<?php echo $TXTTID; ?>">
                                    <span class="photo"><img alt="" src=<?php echo $TXTphoto; ?>></span>
                                    <span class="subject">
                                    <span class="from"><?php echo $TXTNAME; ?></span>
                                    <span class="time"><?php echo $TXTDATE; ?></span>
                                    </span>
                                    <span class="message">
                                       <?php echo $TXTMESSAGE; ?>
                                    </span>
                                </a>
                            </li>
                             <?php                          
            }
            
            ?>
                                <?php 
                       $sqlExistusers = mysqli_query($con,"select count(*) as noti from notifications where status='ACTIVE'");
                           if(mysqli_num_rows($sqlExistusers) >= 1)
                               {
                       $ROW2=mysqli_fetch_array($sqlExistusers);
                              $noti=$ROW2['noti'];
                                  if(empty($noti))
                                  {
                           $noti=0;  
                              }      
                            }
                    ?>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->                          
                            <li>
                                <a href="#">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                     <ul class="nav pull-right top-menu">
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="../img/avatar1_small.jpg">
                            </span><?PHP echo $_SESSION['tuname']; ?>
                            <span class="username"><asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
                            </span>
                            <b class="caret"></b>
                        </a>
                            <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                           <li class="eborder-top">
                                <a href="index.php?tag=PROFILE"><i class="icon_profile"></i> My Profile</a>
                            </li>
                        
                                <a href="../../index.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->
               <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse " style="background: #f58d8d";>
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" style="background: #a84242";>                
                  <li class="active">
                      <a class="" href="index.php" style="background: #ef8e8e";>
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Students</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                         <li><a class="" href="index.php?tag=AddStudents">Add Students</a></li>                           
                        <li><a class="" href="index.php?tag=EditStudents">Edit Students</a></li>
                         <li><a class="" href="index.php?tag=ViewStudents">View Students</a></li> 
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Test</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?tag=wtests">Weekly Tests</a></li>
                          <li><a class="" href="index.php?tag=gtests">Grand Tests</a></li>
                          <li><a class="" href="index.php?tag=tresult">Test result</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="index.php?tag=exam">
                          <i class="icon_genius"></i>
                          <span>Exam</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="index.php?tag=eresult">
                          <i class="icon_piechart"></i>
                          <span>Exam Result</span>
                          
                      </a>
                                         
                  </li>
                   <li>
                      <a class="" href="index.php?tag=build">
                        <i class="icon_house_alt"></i>
                          <span>Building Infrastructure</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="index.php?tag=smaterial">
                          <i class="icon_piechart"></i>
                          <span>School Material</span>
                          
                      </a>
                                         
                  </li>
                      <li>                     
                      <a class="" href="index.php?tag=event">
                          <i class="icon_genius"></i>
                          <span>Events</span>
                       </a>
                    </li>
                   <li>                     
                      <a class="" href="index.php?tag=vmsg">
                        <i class="icon_piechart"></i>
                          <span>View messages</span>
                        </a>                  
                  </li>  
                    <?php if (has_permission()): ?>
            <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Teachers</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                         <li ><a class="" href="index.php?tag=addteachers">Add Teachers</a></li>                           
                        <li><a class="" href="index.php?tag=editteach">Edit Teachers</a></li>
                         <li><a class="" href="index.php?tag=ViewTeachers">View Teachers</a></li> 
                      </ul>
                  </li> 
               <li>                     
                      <a class="" href="index.php?tag=vreports">
                        <i class="icon_piechart"></i>
                          <span>View Reports</span>
                        </a>                  
                  </li>
               <li>                     
                      <a class="" href="index.php?tag=vadmission">
                        <i class="icon_piechart"></i>
                          <span>View Admissions</span>
                        </a>                  
                  </li> 
            <?php endif; ?>                                                          
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
             <section id="main-content">
          <section class="wrapper">  
                   <?php 

    $sqlExistshares = mysqli_query($con,"select count(*) as TP from Students");
    if(mysqli_num_rows($sqlExistshares) >= 1)
    {
   while($ROW3=mysqli_fetch_array($sqlExistshares))
    {
    $TP=$ROW3['TP'];
    }
    } 
    $sqlExistshares = mysqli_query($con,"select count(*) as Tten from teachers");
    if(mysqli_num_rows($sqlExistshares) >= 1)
    {
   while($ROW4=mysqli_fetch_array($sqlExistshares))
    {
    $Tten=$ROW4['Tten'];
    }
    } 
    $sqlExistshares = mysqli_query($con,"select count(*) as Town from exam");
    if(mysqli_num_rows($sqlExistshares) >= 1)
    {
   while($ROW5=mysqli_fetch_array($sqlExistshares))
    {
    $Town=$ROW5['Town'];
    }
    }
    $sqlExistshares = mysqli_query($con,"select count(*) as Tagn from subjects");
    if(mysqli_num_rows($sqlExistshares) >= 1)
    {
   while($ROW6=mysqli_fetch_array($sqlExistshares))
    {
    $Tagn=$ROW6['Tagn'];
    }
    } 
      ?>          
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box purple-bg">
						<i class="icon_profile"></i>
						<div class="count"><?php echo $TP; ?></div>
						<div class="title">Present Students</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box orange-bg">
						<i class="icon_profile"></i>
						<div class="count"><?php echo $Tten ?></div>
						<div class="title">Present Teachers</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box pink-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count"><?php echo $Town ?></div>
						<div class="title">Today's Exams</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
       
        	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count"><?php echo $Tagn ?></div>
						<div class="title">Today's Lectures Delivered</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
           </body>

                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

      
      <!--main content end-->
 
  <!-- container section start -->

                     <!-- page start-->
                      
            <?php 
            if($tag=="VIEW")
            {
                include("VIEW.php");
            }
            if($tag=="PROFILE")
            {
                include("profile.php");
            }
			 if($tag=="REQUEST")
            {
                include("request.php");
            }
            if($tag=="Send")
            {
                include("messages.php");
            }
            if($tag=="MSGVIEW")
            {
            include("MessageVIEW.php");
            } 
            if($tag=="notificationview")
            {
            include("notificationview.php");
            } 
           if($tag=="AddStudents")
            {
            include("students.php");
            } 
            if($tag=="EditStudents")
            {
            include("editstu.php");
            } 
            if($tag=="ViewStudents")
            {
            include("view.php");
            }
              if($tag=="editsts")
            {
                include("eds.php");
            }
             if($tag=="wtests")
            {
                include("weektests.php");
            }
            if($tag=="editwt")
            {
                include("editwtests.php");
            } 
             if($tag=="atests")
            {
                include("addtests.php");
            }
             if($tag=="gtests")
            {
                include("grandtests.php");
            }
                    if($tag=="editgt")
            {
                include("editgtests.php");
            }
               if($tag=="agtests")
            {
                include("addgtests.php");
            }
               if($tag=="tresult")
            {
                include("testresult.php");
            }
               if($tag=="cone")
            {
                include("classone.php");
            }
     if($tag=="ctwo")
            {
                include("classtwo.php");
            }

     if($tag=="cthree")
            {
                include("classthree.php");
            }
      if($tag=="cfour")
            {
                include("classfour.php");
            }
            if($tag=="cfive")
            {
                include("classfive.php");
            }
     if($tag=="csix")
            {
                include("classsix.php");
            }

     if($tag=="cseven")
            {
                include("classseven.php");
            }
      if($tag=="ceight")
            {
                include("classeight.php");
            }
            if($tag=="cnine")
            {
                include("classnine.php");
            }
     if($tag=="cten")
            {
                include("classten.php");
            }

     if($tag=="celeven")
            {
                include("classeleven.php");
            }
      if($tag=="ctwelve")
            {
                include("classtwelve.php");
            }
             if($tag=="editor")
            {
                include("editonetresult.php");
            }
              if($tag=="edittr")
            {
                include("edittwotresult.php");
            }
               if($tag=="editthreer")
            {
                include("editthreetresult.php");
            }
              if($tag=="editfour")
            {
                include("editfourtresult.php");
            }
               if($tag=="editfive")
            {
                include("editfivetresult.php");
            }
              if($tag=="editsix")
            {
                include("editsixtresult.php");
            }
              if($tag=="editseven")
            {
                include("editseventresult.php");
            }
                if($tag=="editeight")
            {
                include("editeighttresult.php");
            }
                  if($tag=="editnine")
            {
                include("editninetresult.php");
            }
                  if($tag=="editten")
            {
                include("edittentresult.php");
            }
                 if($tag=="editeleven")
            {
                include("editeleventresult.php");
            }
                 if($tag=="edittwelve")
            {
                include("edittwelveresult.php");
            }
              if($tag=="addresult")
            {
                include("addresult.php");
            }
             if($tag=="exam")
            {
                include("exam.php");
            }
             if($tag=="editexam")
            {
                include("editexam.php");
            }
         if($tag=="aexam")
            {
                include("addexam.php");
            }
              if($tag=="eresult")
            {
                include("examresult.php");
            }
            if($tag=="econe")
            {
                include("classoneexam.php");
            }
     if($tag=="ectwo")
            {
                include("classtwoexam.php");
            }

     if($tag=="ecthree")
            {
                include("classthreeexam.php");
            }
      if($tag=="ecfour")
            {
                include("classfourexam.php");
            }
            if($tag=="ecfive")
            {
                include("classfiveexam.php");
            }
     if($tag=="ecsix")
            {
                include("classsixexam.php");
            }

     if($tag=="ecseven")
            {
                include("classsevenexam.php");
            }
      if($tag=="eceight")
            {
                include("classeightexam.php");
            }
            if($tag=="ecnine")
            {
                include("classnineexam.php");
            }
     if($tag=="ecten")
            {
                include("classtenexam.php");
            }

     if($tag=="eceleven")
            {
                include("classelevenexam.php");
            }
      if($tag=="ectwelve")
            {
                include("classtwelveexam.php");
            }
            if($tag=="addexresult")
            {
                include("addexresult.php");
            }
             if($tag=="vreports")
            {
                include("reports/index.php");
            }
             if($tag=="viewone")
            {
                include("viewoneresult.php");
            }
              if($tag=="viewtwo")
            {
                include("viewtworesult.php");
            }
            if($tag=="viewthree")
            {
                include("viewthreeresult.php");
            }
            if($tag=="viewfour")
            {
                include("viewfourresult.php");
            }
            if($tag=="viewfive")
            {
                include("viewfiveresult.php");
            }
            if($tag=="viewsix")
            {
                include("viewsixresult.php");
            }
            if($tag=="viewseven")
            {
                include("viewsevenresult.php");
            }
            if($tag=="vieweight")
            {
                include("vieweightresult.php");
            }
            if($tag=="viewnine")
            {
                include("viewnineresult.php");
            }
            if($tag=="viewten")
            {
                include("viewtenresult.php");
            }
            if($tag=="vieweleven")
            {
                include("viewelevenresult.php");
            }
            if($tag=="viewtwelve")
            {
                include("viewtwelveresult.php");
            }
             if($tag=="editviewone")
            {
                include("eviewone.php");
            }
              if($tag=="editviewtwo")
            {
                include("eviewtwo.php");
            }
  if($tag=="editviewthree")
            {
                include("eviewthree.php");
            }
             if($tag=="editviewfour")
            {
                include("eviewfour.php");
            }
              if($tag=="editviewfive")
            {
                include("eviewfive.php");
            }
              if($tag=="editviewsix")
            {
                include("eviewsix.php");
            }
if($tag=="editviewseven")
            {
                include("eviewseven.php");
            }
             if($tag=="editvieweight")
            {
                include("evieweight.php");
            }
    if($tag=="editviewnine")
            {
                include("eviewnine.php");
            }
               if($tag=="editviewten")
            {
                include("eviewten.php");
            }
               if($tag=="editvieweleven")
            {
                include("evieweleven.php");
            }
             if($tag=="editviewtwelve")
            {
                include("eviewtwelve.php");
            }
            if($tag=="addteachers")
            {
            include("addteachers.php");
            } 
            if($tag=="editteach")
            {
            include("editteachers.php");
            } 
            if($tag=="ViewTeachers")
            {
            include("viewteach.php");
            }
            
            if($tag=="eteacher")
            {
                include("eteach.php");
            }
            if($tag=="build")
            {
                include("building.php");
            }
            if($tag=="smaterial")
            {
                include("material.php");
            }
            

            if($tag=="editbu")
            {
                include("editbuilding.php");
            }
   if($tag=="abuild")
            {
                include("addbuilding.php");
            }
                if($tag=="editm")
            {
                include("editmaterial.php");
            }
   if($tag=="amaterial")
            {
                include("addmaterial.php");
            }
              if($tag=="event")
            {
                include("events.php");
            }
                 if($tag=="editevent")
            {
                include("editevent.php");
            }
   if($tag=="aevent")
            {
                include("addevent.php");
            }
   if($tag=="vmsg")
            {
                include("viewmsg.php");
            }
   if($tag=="vadmission")
            {
                include("viewadmission.php");
            }
   if($tag=="acceptstu")
            {
                include("editadmission.php");
            }     
            ?>
             <!-- page end-->
          </section>

      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="../js/scripts.js"></script>
</form>
  </body>
</html>