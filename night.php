<?php
session_start();
$_SESSION['page']=3;

require_once("functions.php");
include("settings.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
    <head>
         <title>Astro Demo</title>
         <link rel="stylesheet" href="style/style.css" type="text/css" />
    </head>
    <body>
     <div id="topspace"></div>   
        <div id="main">

<div id="topbar">
    
<?php include("menu.php"); ?>

</div>
<div id="contentmain">
  
        <form action="setnight.php" method="post">
        <table class="start"><tr>
                <td class="space"></td>
                <td>Star 1 h:</td>
                <td class="input"><input class="trans" type="text" name="star1deg" value="<?php if(isset($_SESSION['star1h'])) { echo only_deg($_SESSION['star1h']); }?>"/></td>
                <td class="space">&deg</td>
                <td class="input"><input class="trans" type="text" name="star1min" value="<?php if(isset($_SESSION['star1h'])) { echo only_min($_SESSION['star1h']); }?>"/></td>
                <td class="space">'</td>
                <td class="input"><input class="trans" type="text" name="star1sec" value="<?php if(isset($_SESSION['star1h'])) { echo only_sec($_SESSION['star1h']); }?>"/></td>
                <td>"</td>
                <td>
   
                        <?php /*
    $conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);
    
    $db = mysql_select_db($data, $conn);
    
    $query = "SELECT * FROM starsname";
    
    $result = mysql_query($query);
    
    while($row = mysql_fetch_array($result))
    {
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    
    mysql_close($conn);
                       */ ?>                        
 
                    
                </td>
            </tr><tr>
                <td class="space"></td>
                <td>Star 1 Time:</td>
                <td class="input"><input class="trans" type="text" name="star1th" value="<?php if(isset($_SESSION['star1th'])) { echo $_SESSION['star1th']; }?>"/></td>
                <td class="space">h</td>
                <td class="input"><input class="trans" type="text" name="star1tm" value="<?php if(isset($_SESSION['star1tm'])) { echo $_SESSION['star1tm']; }?>"/></td>
                <td class="space">min</td>
                <td class="input"><input class="trans" type="text" name="star1ts" value="<?php if(isset($_SESSION['star1ts'])) { echo $_SESSION['star1ts']; }?>"/></td>
                <td>sec</td>

            </tr><tr>
                <td class="space"></td>
                <td>Star 2 h:</td>
                <td class="input"><input class="trans" type="text" name="star2deg" value="<?php if(isset($_SESSION['star2h'])) { echo only_deg($_SESSION['star2h']); }?>"/></td>
                <td class="space">&deg</td>
                <td class="input"><input class="trans" type="text" name="star2min" value="<?php if(isset($_SESSION['star2h'])) { echo only_min($_SESSION['star2h']); }?>"/></td>
                <td class="space">'</td>
                <td class="input"><input class="trans" type="text" name="star2sec" value="<?php if(isset($_SESSION['star2h'])) { echo only_sec($_SESSION['star2h']); }?>"/></td>
                <td>"</td>
 <td>

                        <?php /*
    $conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);
    
    $db = mysql_select_db($data, $conn);
    
    $query = "SELECT * FROM starsname";
    
    $result = mysql_query($query);
    
    while($row = mysql_fetch_array($result))
    {
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        
        
    }
    
    mysql_close($conn);
                       */ ?>                        

                    
                </td>
            </tr>
            <tr>
                <td class="space"></td>
                <td>Star 2 Time:</td>
                <td class="input"><input class="trans" type="text" name="star2th" value="<?php if(isset($_SESSION['star2th'])) { echo $_SESSION['star2th']; }?>"/></td>
                <td class="space">h</td>
                <td class="input"><input class="trans" type="text" name="star2tm" value="<?php if(isset($_SESSION['star2tm'])) { echo $_SESSION['star2tm']; }?>"/></td>
                <td class="space">min</td>
                <td class="input"><input class="trans" type="text" name="star2ts" value="<?php if(isset($_SESSION['star2ts'])) { echo $_SESSION['star2ts']; }?>"/></td>
                <td>sec</td>

            </tr>
            <tr><td></td><td><input type="image" class="submitbt" /></td></tr></table>
        </form>
</div>
<div id="lowbar">
    
    <?php include("nightresult.php");?>
    
</div>
             <div id="low"></div>
        </div>
    </body>
</html>