<?php
error_reporting(0);
if (!isset($_SESSION))
{
session_start();
}
	include("../../connect.php");
  $tag= "";
  $msg="" ;
?>
<h2 align=center>EXAM RESULT</h2>
<header class="panel-heading" align=center>
               ALL CLASSES
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>

    <tr>
<td align=center colspan=15 style="color:brown"; >SELECT THE CLASS YOU WANT TO SEE THE EXAM RESULT OF :</td>
</tr>
 <tr>
<td align=right colspan=15 style="font-size:18px"; ><a href="index.php?tag=addexresult">Click here to Add Exam Result</a></td>
                     </tr>
                    <tr>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=econe" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 1</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ectwo" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 2</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ecthree" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 3</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ecfour" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 4</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ecfive" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 5</a></td>
</tr>
<tr>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ecsix" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 6</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ecseven" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 7</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=eceight" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 8</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ecnine" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 9</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ecten" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 10</a></td>
</tr>
<tr align=center>
 <td colspan=8 align=right><a class="btn btn-info" href="index.php?tag=eceleven" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 11</a></td>
<td colspan=8 align=left><a class="btn btn-info" href="index.php?tag=ectwelve" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 12</a></td>
   <?php      
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
?>
</tr>
         </tbody>