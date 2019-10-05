<?php
ob_start();
session_start();

$appname=$_POST['lname'];
$quantity= $_POST['quant'];
$watts=$_POST['watts'];
$hours=$_POST['hours'];
$quantity1= $_POST['quant1'];
$watts1=$_POST['watts1'];
$hours1=$_POST['hours1'];
$quantity2= $_POST['quant2'];
$watts2=$_POST['watts2'];
$hours2=$_POST['hours2'];
$quantity3= $_POST['quant3'];
$watts3=$_POST['watts3'];
$hours3=$_POST['hours3']; 
$whp1=$_POST['watth'];
$whp2=$_POST['watth1'];
$whp3=$_POST['watth2'];
$whp4=$_POST['watth3'];
$twhpd=$_POST['twatth'];
$twhp=$_POST['twatthp'];
$hours4=$_POST['hours4'];
$solar=$_POST['solar'];
$p1=$_POST['panel1'];
$p2=$_POST['panel2'];
$panel=$_POST['panel'];




if (isset ($_POST['calculate']))
{
    
$a=($quantity * $hours) + ($quantity1 * $hours1) + ($quantity2 * $hours2) + ($quantity3 * $hours3);
$b= $quantity + $quantity1 + $quantity2 + $quantity3;
$c= $a /$b;

  $whp1=  $quantity * $watts * $hours;
  $whp2=  $quantity1 * $watts1 * $hours1;
  $whp3=  $quantity2* $watts2 * $hours2;
  $whp4=  $quantity3* $watts3 * $hours3;
  $twhpd= $whp1 + $whp2 + $whp3 + $whp4;
  $twhp= $twhpd / $c;


}


if (isset ($_POST['calculate2']))
{
   
if ($panel=='panel1'){
 $solar=($twhp / $hours4 * 30) / $p1;
} elseif ($panel=='panel2'){
    $solar=($d * 30) / $p2;
} elseif ($pane=''){
    echo "Please Choose Panel Watts";
}


}

?>