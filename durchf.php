<?php
session_start();
if(!$_SESSION['user']){
echo "Du hast keinen Zutritt!";
echo "<meta http-equiv='refresh' content='1; URL=index.php'/>";
die();
}
require ("connect_inc_bday.php");
require ("connect_inc_user.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Geburtstagsdaten</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="refresh" content="3; URL=all.php"/>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <!-- Begin Header -->
  <div id="header"><h1>Geburtstagsdatenbank</h1></div>
  <!-- End Header -->
  <!-- Begin Left Column -->
  <div id="leftcolumn"> <div class="outer">
	<div class="menu">
		<ul>
		<li><a href="index.php" target="_self">Home</a></li>
				<li><a href="kontakt.php" target="_self">Support</a></li>
                                <li><a href="login1.php" target="_self">Benutzerseite</a></li>
                                <li><a href="logout.php" target="_self">Logout</a></li>
		</ul>
	</div>
              <div id="time">
              <?php
                $jetzt=time();
                $uhrzeit = date("H:i",$jetzt);
                $datum = date("d.m.Y",$jetzt);
                echo "$uhrzeit Uhr <br/> $datum";
              ?>
          </div>
</div>
 </div>
  <!-- End Left Column -->
  <!-- Begin Right Column -->
  <div id="rightcolumn">
      <h2 id="h2">Geburtstagslistenänderung bestätigen</h2>
      <div align="center">
<a href="all.php" target="_self"><input type="button" class="button1" value="Alle Datensätze anzeigen"/></a><br/>
		</div>
<br/><br/><br/>
        <?php
       //Update des Eintrages
        $sqlabfrage= "update geburtstag_".$_SESSION['user']." set " . "vorname= '" . $_POST["vorname"] . "',"
                    . " name= '" . $_POST["famname"] . "',"
                    . " geburtsdatum='" . $_POST["datumgeb"] . "',"
                    . " mail='" . $_POST["mailgeb"] . "'"
                    . " where id = " . $_POST["id"];
        mysql_query($sqlabfrage);
        $num=  mysql_affected_rows();
        if ($num>0)
        {
            echo "<p><font color='#008000'>";
            echo "Der Datensatz wurde erfolgreich geändert";
            echo "</font></p>";
        }
        else {
             echo "<p><font color='#F00'>";
             echo "Der Datensatz wurde nicht geändert";
             echo "</font></p>";
        }
  ?>
<p>
   <br/>Sie werden automatisch weitergeleitet...<br/>
   Wenn Sie nicht weitergeleitet werden, <a href="all.php" target="_self">hier</a> klicken.
</p>
 </div>
  <!-- End Right Column -->
  <!-- Begin Footer -->
  <div id="footer"> &copy; S.Lehmann ESEMOS GmbH 2011 | Version 2.0</div>
  <!-- End Footer -->
 </div>
<!-- End Wrapper -->
</body>
</html>