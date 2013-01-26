
<table><tr>
<?php

$gha1 = find_sungha($_SESSION['sun1ts'],$_SESSION['sun1tm'],$_SESSION['sun1th'],$_SESSION['day'],$_SESSION['month'],$_SESSION['year']);
echo '<td>GHA1: </td><td>'. finddeg($gha1).'&deg'.findmin($gha1)."'";
  
?>
    
 <?php

$dec1 = find_sundec($_SESSION['sun1ts'],$_SESSION['sun1tm'],$_SESSION['sun1th'],$_SESSION['day'],$_SESSION['month'],$_SESSION['year']);
echo '<td>DEC1: </td><td>'. finddeg($dec1).'&deg'.findmin($dec1)."'";
   

    if(isset($gha1)&&isset($_SESSION['long']))
    {
        echo '<td>Sun P:</td><td>';
        $pol1 = $gha1+$_SESSION['long'];

        if($pol1 >= 360)
        {
            $pol1 = $pol1 - 360;
    }
        
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
    
    
    
                if(isset($dec1)&&isset($_SESSION['lat'])&&isset($pol1))
            {
                echo "<td>Sun He:</td><td>";
                $he1 = calc_he($_SESSION['lat'],$dec1,$pol1);

                echo finddeg($he1).'&deg '.findmin($he1)."'";
                echo '</td>';
              
            }
            
            
                       if(isset($_SESSION['lat'])&&isset($he1)&&isset($dec1)&&isset($pol1)&&isset($tippol1))
           {
               echo "<td>Star 1 Az:</td><td>";
               $az1 = calc_az($_SESSION['lat'], $he1, $dec1, $pol1, $tippol1);
               echo $az1.'&deg ';
               echo "</td>";
           }
?>       
        
        
        
</tr></table>