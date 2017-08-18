<?php
include 'function.php';
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");
$query=mysqli_query($dbhandle,"Select MIN(id) as minpv, MAX(id) as maxpv FROM ajovuoro.paivat");
while ($row=mysqli_fetch_array($query))
{

$Alku =explode("-",$row['minpv']);
$Loppu=explode("-",$row['maxpv']);
}

$pv = mktime(0, 0, 0, date("$Alku[1]"),date("1"), date("$Alku[0]"));
$loppupv=mktime(0, 0, 0, date("$Loppu[1]"),date("1"), date("$Loppu[0]"));
$AlkuK  = date("n",$pv);
$AlkuV = date("Y",$pv);
$i=0;
$PVM=  date("Y-n",$pv);
$LPVM= date("Y-n",$loppupv);

While ($PVM != $LPVM) { //Alunperin < 
$pv = mktime(0, 0, 0, date("$Alku[1]")+$i,date("1"), date("$Alku[0]"));
$PVM= date("Y-n",$pv);
$Aika=explode("-",$PVM);
Tulosta($Aika[0],$Aika[1]);
$i++;
}


?>
