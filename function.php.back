<?php
function Yhdista()
{
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");


}
function TallennaAutotKentat()
{
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");
$query=mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
$row=mysqli_fetch_array($query);
echo "<table><form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\" name=\"autot\" enctype=\"multipart/form-data\"> 
<tr><td>Autot aloitusjarjestys(,) : <input type=\"text\" value=\"".$row['autot_string']."\" name=\"autotstring\" size=\"40\"></td></tr>
<tr><td><input type=\"submit\" name=\"tallennaa\" value=\"Tallenna\"></td></tr></form>
</table>";
}
function Tulosta($y,$m)
{
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
$query=mysqli_query($dbhandle,"Select * FROM ajovuoro.paivat WHERE MONTH(id)=$m and YEAR(id)=$y order by id asc");


$Kuukausi=$m;
$Vuosi=$y;
$pvvika= date("t",mktime(0,0,0,$Kuukausi,1,$Vuosi));
$pvsun= date("N",mktime(0,0,0,$Kuukausi,1,$Vuosi));
$u=$pvsun;



Switch ($Kuukausi)
{
case 1: 
$KuukausiNimi="Tammikuu";
break;
case 2: 
$KuukausiNimi="Helmikuu";
break;
case 3: 
$KuukausiNimi="Maaliskuu";
break;
case 4: 
$KuukausiNimi="Huhtikuu";
break;
case 5: 
$KuukausiNimi="Toukokuu";
break;
case 6: 
$KuukausiNimi="Kesäkuu";
break;
case 7: 
$KuukausiNimi="Heinäkuu";
break;
case 8: 
$KuukausiNimi="Elokuu";
break;
case 9: 
$KuukausiNimi="Syyskuu";
break;
case 10: 
$KuukausiNimi="Lokakuu";
break;
case 11: 
$KuukausiNimi="Marraskuu";
break;
case 12: 
$KuukausiNimi="Joulukuu";
break;
}
echo "<table border=\"1px\" width=\"200cm\" height=\"300cm\"  style=\"margin-bottom:6cm;\">";
Echo $KuukausiNimi." ".$Vuosi;
Echo "<tr><td>Maanantai</td><td>Tiistai</td><td>Keskiviikko</td><td>Torstai</td><td>Perjantai</td><td>Lauantai</td><td>Sunnuntai</td>	</tr>";
for ($h=1; $h <$u; $h++) {
echo "<td width=\"25cm\" height=\"25cm\"></td>";
}
$AutotLuku=1;	
for ($x=1; $x<=$pvvika; $x++) 
{
$query1=mysqli_query($dbhandle,"Select * FROM ajovuoro.paivat WHERE MONTH(id)=$m AND YEAR(id)=$y AND DAY(id)=$x");
while ($row1=mysqli_fetch_array($query1))
{
$Viikonp=$row1['vkp'];
$Autot=explode(",",$row1['autot']);
$AutotLuku=count($Autot);
}
error_reporting(0);	
if ($u=='7')
{
$u=0;
			

			echo "<td width=\"25cm\" height=\"25cm\">".$x."<br>";
			for ($g=0; $g<$AutotLuku; $g++) {
											
											$query2=mysqli_query($dbhandle,"Select maara,paiva FROM ajovuoro.vkpaivat WHERE paiva=$Viikonp");
											$row2=mysqli_fetch_array($query2);
											
											
											if ($g < $row2['maara'])
											{
											
											echo "<b>".$Autot[$g].",</b>";
											if ($g+1==$row2['maara']) { echo "<br>"; }
											}
											
											else 
											{
											echo $Autot[$g].",";
											}
											
											}
			
			echo "</td></tr><tr>"; //Viikonvaihto
			
			
			
} else 
{
			echo "<td width=\"25cm\" height=\"100cm\">".$x."<br>";
			for ($g=0; $g<$AutotLuku; $g++) {
											
											$query2=mysqli_query($dbhandle,"Select maara FROM ajovuoro.vkpaivat WHERE paiva=$Viikonp");
											$row2=mysqli_fetch_array($query2);
											if ($g < $row2['maara'])
											{
											echo "<b>".$Autot[$g].",</b>";
											if ($g+1==$row2['maara']) { echo "<br>"; }
											}
											else 
											{
											echo $Autot[$g].",";
											}
											
											 }
											 echo "</td>";
											 
}
$u++;

}
echo "</table>";

}
function LuoTaulutKentat()
{
echo "<table><form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" enctype=\"multipart/form-data\"> 
<tr><td>Alku pvm : </td><td>V.</td><td><input type=\"text\" name=\"vuosi1\" size=\"4\"></td><td>P.</td><td><input type=\"text\" name=\"paiva1\" size=\"2\"></td>
<td>K.</td><td><input type=\"text\" name=\"kuukausi1\" size=\"2\"></td></tr>
<tr><td>Loppu pvm : </td><td>V.</td><td><input type=\"text\" name=\"vuosi2\" size=\"4\"></td><td>P.</td><td><input type=\"text\" name=\"paiva2\" size=\"2\"></td>
<td>K.</td><td><input type=\"text\" name=\"kuukausi2\" size=\"2\"></td></tr>
<tr><td><input type=\"submit\" name=\"tallennat\" value=\"Tallenna\"></td></tr>
</form></table> ";
}

function LuoTaulu($y1,$d1,$m1,$y2,$d2,$m2,$autot) { // Alku vuosi,päivä,kuukausi : Kohde Vuosi,päivä,kuukausi
date_default_timezone_set('UTC');
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");

$nytten=date_create($y1."-".$m1."-".$d1); //Vuosi - kuukausi - päivä
$kohde=date_create($y2."-".$m2."-".$d2);
$vali=date_diff($kohde,$nytten);
$valiluku=$vali->days;
//echo $y1.".".$m1.".".$d1."-".$y2.".".$m2.".".$d2."<br>";
//echo $valiluku;
$taulukko =array();
$Paivat=array();
//muista poistaa sulku kommentoinnin poiston jälkeen

for ($i=0; $i <= $valiluku; $i++) 
{
$pv  = mktime(0, 0, 0, date("$m1"),date("$d1")+$i, date("$y1")); //Alku + 1päivä kuukausi- päivä - vuosi
$pv1  = mktime(0, 0, 0, date("$m1"),date("$d1"), date("$y1")); //
$paiva  = date("j",$pv);
$kuukausi  = date("n",$pv);
$vuosi  = date("Y",$pv);
$vkpaiva=date("N",$pv);
$taulup[$i]=date("j",$pv);
$tauluk[$i]=date("n",$pv);
$tauluv[$i]=date("Y",$pv);
$n=$taulup[$i]."-".$tauluk[$i]."-".$tauluv[$i];
$nyt = $nytten->format('j-n-Y'); //Ensimmäinen päivä string muotoon

if ($nyt==$n) {
$vkpaiva=date("N",$pv);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
$time = $tauluv[$i].".".$tauluk[$i].".".$taulup[$i];
mysqli_query($dbhandle,"Select * FROM ajovuoro.paivat");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.paivat (id,autot,vkp) 
VALUES ('$time','$autotstring','$vkpaiva')");
//Ensimmäinen päivä, lähtöjärjestys ei muutu

} else 
{
switch ($vkpaiva)
{
case 1: //Maanantai
$query=mysqli_query($dbhandle, "Select * FROM ajovuoro.vkpaivat WHERE paiva='7'");
$row=mysqli_fetch_array($query);
$Sunnuntai=$row['maara'];

$autot_temp=array_splice($autot,$Sunnuntai-1);
$autot= array_merge((array)$autot_temp,(array)$autot);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
break;
case 2: //Tiistai
$query=mysqli_query($dbhandle, "Select * FROM ajovuoro.vkpaivat WHERE paiva='1'");
$row=mysqli_fetch_array($query);
$Maanantai=$row['maara'];

$autot_temp=array_splice($autot,$Maanantai-1);
$autot= array_merge((array)$autot_temp,(array)$autot);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
break;
case 3: //Keskiviikko
$query=mysqli_query($dbhandle, "Select * FROM ajovuoro.vkpaivat WHERE paiva='2'");
$row=mysqli_fetch_array($query);
$Tiistai=$row['maara'];

$autot_temp=array_splice($autot,$Tiistai-1);
$autot= array_merge((array)$autot_temp,(array)$autot);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
break;
case 4: //Torstai
$query=mysqli_query($dbhandle, "Select * FROM ajovuoro.vkpaivat WHERE paiva='3'");
$row=mysqli_fetch_array($query);
$Keskiviikko=$row['maara'];

$autot_temp=array_splice($autot,$Keskiviikko-1);
$autot= array_merge((array)$autot_temp,(array)$autot);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPALCE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
break;
case 5: //Perjantai
$query=mysqli_query($dbhandle, "Select * FROM ajovuoro.vkpaivat WHERE paiva='4'");
$row=mysqli_fetch_array($query);
$Torstai=$row['maara'];

$autot_temp=array_splice($autot,$Torstai-1);
$autot= array_merge((array)$autot_temp,(array)$autot);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
break;
case 6: //Lauanatai
$query=mysqli_query($dbhandle, "Select * FROM ajovuoro.vkpaivat WHERE paiva='5'");
$row=mysqli_fetch_array($query);
$Perjantai=$row['maara'];

$autot_temp=array_splice($autot,$Perjantai);
$autot= array_merge((array)$autot_temp,(array)$autot);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
break;
case 7: //Sunnuntai
$query=mysqli_query($dbhandle, "Select * FROM ajovuoro.vkpaivat WHERE paiva='6'");
$row=mysqli_fetch_array($query);
$Lauantai=$row['maara'];

$autot_temp=array_splice($autot,$Lauantai);
$autot= array_merge((array)$autot_temp,(array)$autot);
$autotstring = implode(",", $autot);
mysqli_query($dbhandle,"Select * FROM ajovuoro.autot");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.autot (id,autot_string)
VALUES ('1','$autotstring')");
break;
}

$autotstring = implode(",", $autot);
$time = $tauluv[$i].".".$tauluk[$i].".".$taulup[$i];
mysqli_query($dbhandle,"Select * FROM ajovuoro.paivat");
mysqli_query($dbhandle,"REPLACE INTO ajovuoro.paivat (id,autot,vkp) 
VALUES ('$time','$autotstring','$vkpaiva')");
/*echo "<br>".$vkpaiva." : : ".$time." : ";
foreach ($autot as &$value) {
echo $value; */
}
}

}
function TallennaKiertoKentat() 
{
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");
$vkpaivat=mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat");
echo "<table><form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";
while ($row=mysqli_fetch_array($vkpaivat))
{
echo "<tr><td>".$row['paivanimi']."</td><td><input type=\"text\" name=\"".$row['paivanimi']."\" value=\"".$row['maara']."\" size=\"1\"></td></tr>";
}
echo "<tr><td><input type=\"submit\" name=\"tallennap\" value=\"Tallenna\">
</form></td></tr></table>";
}
function Resetoi()
{
echo "<table><form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";
echo "<input type=\"submit\" name=\"reset\" value=\"Nollaa kaikki\">";
echo"</form></table><br><br>";
}

?>
