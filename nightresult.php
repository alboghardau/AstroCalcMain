<table><tr>

<?php

if(isset($_SESSION['star1h'])&&isset($_SESSION['temp'])&&isset($_SESSION['pressure']))
{

    echo "<td>Star 1 Alt:</td><td>";
    $star1h = $_SESSION['star1h'];
    $star1h = $star1h - meanrefraction($star1h)+degtonum(0,tempcorr($star1h,$_SESSION['temp']),0)+degtonum(0,  prescor($star1h, $_SESSION['pressure']),0);
    //var_dump(tempcorr($star1h,0));
    echo finddeg($star1h)."&deg ".  findmin($star1h)."'";
    echo '</td>';
    
}

if(isset($_SESSION['star1th'])&&isset($_SESSION['star1tm'])&&isset($_SESSION['star1ts']))    
{
    echo "<td>Star 1 GHA:</td><td>";
    $gha = find_gha($_SESSION['star1ts'], $_SESSION['star1tm'], $_SESSION['star1th'], $_SESSION['day'], $_SESSION['month'], $_SESSION['year']);
    echo finddeg($gha)."&deg ".findmin($gha)."'";
    echo "</td>";
    
}
  
    if(isset($_SESSION['star1id']))
    {
        echo '<td>Star 1 SHA:</td><td>';
        $sha =  find_sha($_SESSION['day'], $_SESSION['month'], $_SESSION['year'], $_SESSION['star1id']);
        echo finddeg($sha).'&deg '.findmin($sha)."'";
        echo "</td>";
    }
        
    if(isset($gha)&&isset($sha)&&isset($_SESSION['long']))
    {
        echo '<td>Star 1 P:</td><td>';
        $pol1 = polarangle($gha, $sha, $_SESSION['long']);

        
        if($pol1 <=180)
        {
            echo finddeg($pol1).'&deg '.findmin($pol1)."'";
            $tippol1 = "Pw";
            echo " Pw";
        }
        
        if($pol1 >180)
        {
            $pol1 = 360-$pol1;
            echo finddeg($pol1).'&deg '.findmin($pol1)."'";
            echo " Pe";
            $tippol1 = "Pe";
        }
        echo "</td>";
    }
    
    ?>
        
    </tr>    
    <tr>
            <?php 
            
            if(isset($_SESSION['star1id'])&&isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year']))
            {
                echo "<td>Star 1 Dec:</td><td>";
                $star1dec = find_stardec($_SESSION['day'],$_SESSION['month'],$_SESSION['year'],$_SESSION['star1id']);
                echo finddeg($star1dec).'&deg '.findmin($star1dec)."'";
                echo "</td>";
            }
            

            
            if(isset($star1dec)&&isset($_SESSION['lat'])&&isset($pol1))
            {
                echo "<td>Star1 He:</td><td>";
                $he1 = calc_he($_SESSION['lat'],$star1dec,$pol1);

                echo finddeg($he1).'&deg '.findmin($he1)."'";
                echo '</td>';
              
            }
 
           
           if(isset($_SESSION['lat'])&&isset($he1)&&isset($star1dec)&&isset($pol1)&&isset($tippol1))
           {
               echo "<td>Star 1 Az:</td><td>";
               $az1 = calc_az($_SESSION['lat'], $he1, $star1dec, $pol1, $tippol1);
               echo $az1.'&deg ';
               echo "</td>";
           }

           ?> 
            
            
</tr></table>
<?php

include('settings.php');

    if(isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year'])&&isset($gha)&&isset($_SESSION['long']))
    {

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);
    
    $db = mysql_select_db($data, $conn);
    
    $date = gmmktime(12, 0, 0, $_SESSION['month'], $_SESSION['day'], $_SESSION['year']);
    
    $query = "SELECT * FROM stars WHERE startdate<".$date." AND enddate>".$date;
    
    $result = mysql_query($query);
    
    echo 'Possible Star Match: ';
    


    while($row = mysql_fetch_array($result))
    {
    
        $polx = polarangle($gha, $row['sha'], $_SESSION['long']);
               
        if($polx >180)
        {
            $polx = 360-$polx;
        }
        
        $hex = calc_he($_SESSION['lat'],$row['declination'],$polx);
                
         
                
        if($hex - $_SESSION['star1h'] >-2){
          if($hex - $_SESSION['star1h'] <2)  
        {
              
              
              $query2 = "SELECT * FROM starsname WHERE id=".$row['idstar'];
              
              $result2 = mysql_query($query2);
              
              $row2 = mysql_fetch_array($result2);
              
              echo $row2['name']." ".'<a href="starselect.php?number=1&id='.$row2['id'].'"><img src="img/star.png" alt="star"/></a>';
        }
        }
}
    }
    

?>

<table><tr>
        
<?php 

if(isset($_SESSION['star2h'])&&isset($_SESSION['temp'])&&isset($_SESSION['pressure']))
{
    echo "<td>Star 2 Alt:</td><td>";
    $star2h = $_SESSION['star2h'];
    $star2h = $star2h - meanrefraction($star2h)+degtonum(0,tempcorr($star2h ,$_SESSION['temp']),0)+degtonum(0,  prescor($star2h, $_SESSION['pressure']),0);
    //var_dump(tempcorr($star1h,0));
    echo finddeg($star2h)."&deg ".  findmin($star2h)."'";
    echo '</td>';
}



if(isset($_SESSION['star2th'])&&isset($_SESSION['star2tm'])&&isset($_SESSION['star2ts']))
{
    echo "<td>Star 2 GHA:</td><td>";
    $gha2 = find_gha($_SESSION['star2ts'], $_SESSION['star2tm'], $_SESSION['star2th'], $_SESSION['day'], $_SESSION['month'], $_SESSION['year']);
    echo finddeg($gha2)."&deg ".findmin($gha2)."'";    
    echo "</td>";
}


    
    if(isset($_SESSION['star2id']))
    {
        echo "<td>Star 2 SHA:</td><td>";
        $sha2 =  find_sha($_SESSION['day'], $_SESSION['month'], $_SESSION['year'], $_SESSION['star2id']);
        echo finddeg($sha2).'&deg '.findmin($sha2)."'";
        echo "</td>";
    }
    

    
    if(isset($gha2)&&isset($sha2)&&isset($_SESSION['long']))
    {
        echo "<td>Star 2 P:</td><td>";
        $pol2 = polarangle($gha2, $sha2, $_SESSION['long']);

        
        if($pol2 <=180)
        {
            echo finddeg($pol2).'&deg '.findmin($pol2)."'";
            echo " Pw";
            $tippol2 = "Pw";
        }
        
        if($pol2 >180)
        {
            $pol2 = 360-$pol2;
            echo finddeg($pol2).'&deg '.findmin($pol2)."'";
            echo " Pe";
            $tippol2 = "Pe";
        }
        echo "</td>";
    }
    
    ?>
    
</tr><tr>

            <?php 
            
            if(isset($_SESSION['star2id'])&&isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year']))
            {
                echo '<td>Star 2 Dec:</td><td>';
                $star2dec = find_stardec($_SESSION['day'],$_SESSION['month'],$_SESSION['year'],$_SESSION['star2id']);
                echo finddeg($star2dec).'&deg '.findmin($star2dec)."'";
                echo "</td>";
            }
            
            
            if(isset($star2dec)&&isset($_SESSION['lat'])&&isset($pol2))
            {
                echo "<td>Star2 He:</td><td>";
                $he2 = calc_he($_SESSION['lat'],$star2dec,$pol2);
                echo finddeg($he2).'&deg '.findmin($he2)."'";;
                echo "</td>";
            }
            
           
           if(isset($_SESSION['lat'])&&isset($he2)&&isset($star2dec)&&isset($pol2)&&isset($tippol2))
           {
               echo "<td>Star2 Az:</td><td>";
               $az2 = calc_az($_SESSION['lat'], $he2, $star2dec, $pol2, $tippol2);
               echo $az2.'&deg ';
               echo "</td>";
           }
           
           ?> 

</tr></table>

<?php

include('settings.php');

    if(isset($_SESSION['day'])&&isset($_SESSION['month'])&&isset($_SESSION['year'])&&isset($gha)&&isset($_SESSION['long']))
    {

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);
    
    $db = mysql_select_db($data, $conn);
    
    $date = gmmktime(12, 0, 0, $_SESSION['month'], $_SESSION['day'], $_SESSION['year']);
    
    $query = "SELECT * FROM stars WHERE startdate<".$date." AND enddate>".$date;
    
    $result = mysql_query($query);
    
    echo 'Possible Star Match: ';
    


    while($row = mysql_fetch_array($result))
    {
    
        $polx = polarangle($gha, $row['sha'], $_SESSION['long']);
               
        if($polx >180)
        {
            $polx = 360-$polx;
        }
        
        $hex = calc_he($_SESSION['lat'],$row['declination'],$polx);
                
         
                
        if($hex - $_SESSION['star2h'] >-2){
          if($hex - $_SESSION['star2h'] <2)  
        {
              
              
              $query2 = "SELECT * FROM starsname WHERE id=".$row['idstar'];
              
              $result2 = mysql_query($query2);
              
              $row2 = mysql_fetch_array($result2);
              
              echo $row2['name']." ".'<a href="starselect.php?number=2&id='.$row2['id'].'"><img src="img/star.png" alt="star"/></a>';
        }
        }
}
    }
    

?>