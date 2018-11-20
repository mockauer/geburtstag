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
      <h2 id="h2">Geburtstagsliste ändern</h2>
      <div align="center">
<a href="all.php" target="_self"><input type="button" class="button1" value="Alle Datensätze anzeigen"/></a><br/>
            <?php
            //Ändern Button
             if (isset($_GET["id"]))
              {
                //Datensatz raussuchen
                $sql="select * from geburtstag_".$_SESSION['user']." where id =" . $_GET["id"];
                $res=mysql_query($sql);
                $dsatz=mysql_fetch_assoc($res);
                //Änderugnen druch führen
                echo "<div align='center'>Nun können sie Änderungen durchführen.";
                echo "<form action='durchf.php' method='post'>";
                echo "<table border='1' width='500px'>";
                echo "<tr>";
                echo " <tr> <td align='right'>ID:</td> <td><input name='id' size='22' value='" . $_GET["id"] . "' readonly /></td> </tr>";
                echo "  <td align='right'>Vorname:</td> <td><input name='vorname' size='22' value='" .$dsatz["vorname"]. "'/></td> </tr>";
                echo " <tr> <td align='right'>Familienname:</td> <td><input name='famname' size='22' value='" . $dsatz["name"] . "' /></td> </tr>";
                echo "<tr>  <td align='right'>Geburtsdatum:</td> <td><input name='datumgeb' size='22' value='" . $dsatz["geburtsdatum"] . "' /></td> </tr>";
                echo "<tr>  <td align='right'>E-Mail:</td> <td><input name='mailgeb' size='22' value='" . $dsatz["mail"] . "' /></td> </tr>";
                echo "</tr>";
                echo "</table>";
                echo "<input type='submit' class='button1' value='Ändern'/> <input type='reset' class='button1' />";
                echo "</form>";
                echo "</div>";
            } else
            {
                echo "<p><font color=#F00>";
                echo "Es wurde kein Datensatz ausgewählt";
                echo "</font></p>";
            }
  ?>
</div>
  </div>
  <!-- End Right Column -->
  <!-- Begin Footer -->
  <div id="footer"> &copy; S.Lehmann ESEMOS GmbH 2011 | Version 2.0</div>
  <!-- End Footer -->
 </div>
<!-- End Wrapper -->
</body>
</html>