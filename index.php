<html>
<?php
include "function.php";
if (isset($_POST['reset']))
{
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"TRUNCATE ajovuoro.paivat");

}
if (isset($_POST['tallennap'])) {
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");

$Maanantai=$_POST['Maanantai'];
$Tiistai=$_POST['Tiistai'];
$Keskiviikko=$_POST['Keskiviikko'];
$Torstai=$_POST['Torstai'];
$Perjantai=$_POST['Perjantai'];
$Lauantai=$_POST['Lauantai'];
$Sunnuntai=$_POST['Sunnuntai'];

mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat WHERE paiva='1'");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.vkpaivat (paiva,maara,paivanimi)
VALUES('1','$Maanantai','Maanantai')");
mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat WHERE paiva='2'");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.vkpaivat (paiva,maara,paivanimi)
VALUES('2','$Tiistai','Tiistai')");
mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat WHERE paiva='3'");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.vkpaivat (paiva,maara,paivanimi)
VALUES('3','$Keskiviikko','Keskiviikko')");
mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat WHERE paiva='4'");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.vkpaivat (paiva,maara,paivanimi)
VALUES('4','$Torstai','Torstai')");
mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat WHERE paiva='5'");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.vkpaivat (paiva,maara,paivanimi)
VALUES('5','$Perjantai','Perjantai')");
mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat WHERE paiva='6'");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.vkpaivat (paiva,maara,paivanimi)
VALUES('6','$Lauantai','Lauantai')");
mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat WHERE paiva='7'");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.vkpaivat (paiva,maara,paivanimi)
VALUES('7','$Sunnuntai','Sunnuntai')");
}
if (isset($_POST['tallennaa'])) {
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");
$autot=$_POST['autotstring'];
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autot')");
}
if (isset($_POST['tallennat'])) {
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
 
$v1=$_POST['vuosi1'];
$m1=$_POST['kuukausi1'];
$p1=$_POST['paiva1'];
$v2=$_POST['vuosi2'];
$m2=$_POST['kuukausi2'];
$p2=$_POST['paiva2'];

$query=mysqli_query($dbhandle,"Select * FROM ajovuoro.autot WHERE id='1'");
$row=mysqli_fetch_array($query);
$stringi=$row['autot_string'];
$autot = explode(",", $stringi);

LuoTaulu($v1,$p1,$m1,$v2,$p2,$m2,$autot);
}
Resetoi();
date_default_timezone_set('UTC');
TallennaAutotKentat();
LuoTaulutKentat();
TallennaKiertoKentat();

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

While ($PVM != $LPVM) { // Ennen oli < ja kaikki oli vituillaan
$pv = mktime(0, 0, 0, date("$Alku[1]")+$i,date("1"), date("$Alku[0]"));
$PVM= date("Y-n",$pv);
$Aika=explode("-",$PVM);
Tulosta($Aika[0],$Aika[1]);
$i++;
}


?>
</html>
