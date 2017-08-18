<?php
$username = "root";
$password = "ijn3ergh3";
$hostname = "localhost";
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"Select * FROM ajovuoro.vkpaivat");
mysqli_query($dbhandle,"INSERT INTO ajovuoro.vkpaivat (paiva,maara,paivanimi) VALUES ('1','5','Maanantai')");
mysqli_query($dbhandle,"INSERT INTO ajovuoro.vkpaivat (paiva,maara,paivanimi) VALUES ('2','5','Tiistai')");
mysqli_query($dbhandle,"INSERT INTO ajovuoro.vkpaivat (paiva,maara,paivanimi) VALUES ('3','5','Keskiviikko')");
mysqli_query($dbhandle,"INSERT INTO ajovuoro.vkpaivat (paiva,maara,paivanimi) VALUES ('4','5','Torstai')");
mysqli_query($dbhandle,"INSERT INTO ajovuoro.vkpaivat (paiva,maara,paivanimi) VALUES ('5','5','Perjantai')");
mysqli_query($dbhandle,"INSERT INTO ajovuoro.vkpaivat (paiva,maara,paivanimi) VALUES ('6','5','Lauantai')");
mysqli_query($dbhandle,"INSERT INTO ajovuoro.vkpaivat (paiva,maara,paivanimi) VALUES ('7','5','Sunnuntai')");




?>