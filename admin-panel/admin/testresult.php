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
<header class="panel-heading" align=center>
               ALL CLASSES
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>

    <tr>
<td align=center colspan=15 style="color:brown"; >SELECT THE CLASS YOU WANT TO SEE THE RESULT OF :</td>
</tr>
 <tr>
<td align=right colspan=15 ><a href="index.php?tag=addresult">Click here to Add Tests</a></td>
                     </tr>
                    <tr>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=cone" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 1</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ctwo" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 2</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=cthree" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 3</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=cfour" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 4</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=cfive" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 5</a></td>
</tr>
<tr>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=csix" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 6</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=cseven" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 7</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=ceight" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 8</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=cnine" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 9</a></td>
<td colspan=3 align=center><a class="btn btn-info" href="index.php?tag=cten" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 10</a></td>
</tr>
<tr align=center>
 <td colspan=8 align=right><a class="btn btn-info" href="index.php?tag=celeven" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 11</a></td>
<td colspan=8 align=left><a class="btn btn-info" href="index.php?tag=ctwelve" title="Bootstrap 3 themes generator"><span class="icon_house_alt"></span> Class 12</a></td>
   <?php      
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
            if($tag=="addresult")
            {
                include("addresult.php");
            }
?>
</tr>
         </tbody>