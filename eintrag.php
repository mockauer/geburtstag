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
      <h2 id="h2">Geburtstagsliste</h2>
      <div align="center">
          <a href="all.php" target="_self"><input type="button" class="button1" value="Alle Datensätze anzeigen"/></a><br/>
          <p margin-bottom="10px">  Hier können Sie weitere Datensätze eintragen.</p>
        <form method="post" action="eintrag.php">
           <table border="1" width="500px">
                <tr>
                    <td align="right">Vorname:</td>
                    <td align="left"><input name="vorname" size="22"/></td>
                </tr>
		<tr>
                    <td align="right">Familienname:</td>
                     <td align="left"><input name="famname" size="22"/></td>
                </tr>
		<tr>
                    <td align="right">Geburtsdatum:</td>
                     <td align="left"><input name="datumgeb" size="22"/> (JJJJ-MM-TT)</td>
                </tr>
		<tr>
                    <td align="right">E-Mail Adresse:</td>
                     <td align="left"><input name="mailgeb" size="22"/></td>
                </tr>
                <tr>
                    <td align="right" rowspan="2"></td>
                    <td rowspan="2"><input type="submit" class="button1" name="sendeintrag"/>&nbsp;<input type="reset" class="button1"/></td>
		</tr>
            </table>
        </form>
<br/><br/><br/>
        <?php
            $sendeintrag=$_POST["sendeintrag"];
            $name=$_POST["famname"];
            $vorname=$_POST["vorname"];
            $datumgeb=$_POST["datumgeb"];
            $mail=$_POST["mailgeb"];
            //Prüfen, ob alles eingetragen wurde
            if (empty($name) || empty($vorname) || empty($datumgeb) || empty($mail)){
                    echo "<p><font color='#F00'>";
            echo "Sie m&uuml;ssen alle Felder ausf&uuml;llen.";
            echo "</font></p>";
            exit;
            }else {
            echo "<p><font color='#008000'>";
            echo "Datensatz wurde erfolgreich hinzugef&uuml;gt";
            echo "</font></p>";
            $datum=time();
            $datumspreng=explode("-", $datumgeb);
            $datumspreng=mktime(0, 0, 0, $datumspreng[1], $datumspreng[2], $datumspreng[0]);
            $age=$datum-$datumspreng;
            $age=floor(($age)/(60*60*24*365));
            if (isset($sendeintrag)){
            //Einfügen der eingegeben neuen Datensetze von Formular
            $sqlabfrage= "insert into geburtstag_".$_SESSION['user']."" . "(vorname, name, geburtsdatum, age, mail)" . "VALUES ('" . $vorname . "','"
                        . $name . "','" . $datumgeb . "'," . $age . ",'" . $mail . "')";
            mysql_query($sqlabfrage);
                }
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