<?php
session_start();
$_SESSION['page']=1;

require_once("functions.php");



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
     <form action="setpos.php" method="post">
        <table class="start"><tr>
                <td class="space"></td>
                <td>Estimated Latitude</td>
                <td class="input">
                <input class="trans" type="text" name="latdeg" value="<?php if(isset($_SESSION['lat'])) { echo only_deg($_SESSION['lat']); }?>"/>
                </td>
                <td class="space">&deg</td>
                <td class="input">
                <input class="trans" type="text" name="latmin" value="<?php if(isset($_SESSION['lat'])) { echo only_min($_SESSION['lat']); }?>"/>
                </td>
                <td class="space">'</td>
                <td class="input">
                <input class="trans" type="text" name="latsec" value="<?php if(isset($_SESSION['lat'])) { echo only_sec($_SESSION['lat']); }?>"/>
                </td>
                <td>"</td>
                <td><input type="radio" value="N" name="latname"
                <?php
                if(isset($_SESSION['lat']))
                {
                    if($_SESSION['lat']>=0)
                    {
                        echo 'checked="checked"';
                    }                    
                }
                else
                {
                    echo 'checked="checked"';
                }
                ?>/>
                N</td>
                <td><input type="radio" value="S" name="latname"
                <?php
                if(isset($_SESSION['lat']))
                {
                    if($_SESSION['lat']<0)
                    {
                        echo 'checked="checked"';
                    }                    
                } ?>           
                />S</td>
                </tr><tr>
                
                <td class="space"></td>
                <td>Estimated Longitude</td>
                <td class="input">
                <input class="trans" type="text" name="longdeg" value="<?php if(isset($_SESSION['long'])) { echo only_deg($_SESSION['long']); }?>"/>
                </td>
                <td class="space">&deg</td>
                <td class="input">
                <input class="trans" type="text" name="longmin" value="<?php if(isset($_SESSION['long'])) { echo only_min($_SESSION['long']); }?>"/>
                </td>
                <td class="space">'</td>
                <td class="input">
                <input class="trans" type="text" name="longsec" value="<?php if(isset($_SESSION['long'])) { echo only_sec($_SESSION['long']); }?>"/>
                </td>
                <td>"</td>
                <td><input type="radio" value="E" name="longname" <?php
                if(isset($_SESSION['long']))
                {
                    if($_SESSION['long']>=0)
                    {
                        echo 'checked="checked"';
                    }                    
                }
                else
                {
                    echo 'checked="checked"';
                }
                ?>/>E</td>
                <td><input type="radio" value="W" name="longname"
                <?php
                if(isset($_SESSION['long']))
                {
                    if($_SESSION['long']<0)
                    {
                        echo 'checked="checked"';
                    }                    
                } ?>           
                />W</td>
            </tr>
            <tr><td></td><td><input type="image" class="submitbt" /></td></tr>
        
        </table>  
    </form>   
    
    
    
    
    
    
    <form action="setdate.php" method="post">
    <table class="start"><tr>
                <td class="space"></td>
                <td>Date:</td>
                <td class="input"><input class="trans" type="text" name="day" value="<?php if(isset($_SESSION['day'])) { echo $_SESSION['day'];}?>"/></td>
                <td class="space">Day</td>
                <td class="input"><input class="trans" type="text" name="month" value="<?php if(isset($_SESSION['month'])) { echo $_SESSION['month'];}?>"/></td>
                <td class="space">Month</td>
                <td class="input"><input class="trans" type="text" name="year" value="<?php if(isset($_SESSION['year'])) { echo $_SESSION['year'];}?>"/></td>
                <td>Year</td>
                </tr>
        <tr><td class="space"></td>
            <td>Atm Pressure:</td><td class="input"><input class="trans" type="text" name="pressure" value="<?php if(isset($_SESSION['pressure'])) { echo $_SESSION['pressure'];}?>"/></td>
            <td>Temperature</td>
            <td class="input"><input class="trans" type="text" name="temp" value="<?php if(isset($_SESSION['temp'])) { echo $_SESSION['temp'];}?>"/></td>
        </tr><tr>
            <td class="space"></td>
            <td>Time Correction(s):</td>
            <td class="input"><input class="trans" type="text" name="timecorr" value="<?php if(isset($_SESSION['timecorr'])) { echo $_SESSION['timecorr'];}?>"/></td>
           
            <td><input type="image" class="submitbt" /></td>
              </tr>
    
    
    </table>
                </form>
    <center><table><tr>
    
    <td><a href="savedata.php" class="savebt"></a></td>
    <td><a href="loaddata.php" class="loadbt"></a></td>
    <td><a href="sessionkill.php" class="resetbt"></a></td>
    
    
        </tr></table></center>
    <br/>


    <?php 
    /*
        if(isset($_SESSION['lat']))
    {
    echo "Latitude: ".finddeg($_SESSION['lat']).'&deg '.findmin($_SESSION['lat'])."'";
    }
        if(isset($_SESSION['long']))
    {
    echo "<br/>Longitude: ".finddeg($_SESSION['long']).'&deg '.findmin($_SESSION['long'])."'";
    }


    if(isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year']))
    {
        echo "<br/>Date: ".$_SESSION['day']."-";
    
        echo $_SESSION['month'].'-';
    
        echo $_SESSION['year'];
    }
    
    if(isset($_SESSION['temp']))
    {
        echo '<br/>Temperature: '.$_SESSION['temp']."&degC";
    }
    if(isset($_SESSION['pressure']))
    {
        echo '<br/>Atmospheric Pressure: '.$_SESSION['pressure']." mb";
    }
    
*/
    ?>
    </div>
<div id="lowbar" >
</div>
                <div id="low"></div>
        </div>
 
    </body>
</html>