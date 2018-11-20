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
            <div id="leftcolumn">
              <div class="outer">
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
      <div align="center">
          <h2 id="h2">Benutzeroberfl&auml;che</h2>
          Willkommen
             <?php
                echo "<b>".$_SESSION['user']."</b>";
                echo "<br/><br/>";
                function geburtstage($anzahl) {
                $return = "";  // String
                $sql_geb = "SELECT `name`, `vorname`, `age`, DATE_FORMAT(`geburtsdatum`, '%d.%m.') AS `geburtsdatum_gib`
                            FROM `geburtstag_".$_SESSION['user']."`
                            WHERE DATE_FORMAT(`geburtsdatum`, '%m-%d') >= DATE_FORMAT(NOW(), '%m-%d')
                            ORDER BY DATE_FORMAT(`geburtsdatum`, '%m-%d') ASC LIMIT 0, 5";
                // Natuerlich solltest du vorher noch ueberpruefen, ob $anzahl ein int ist, nicht, dass jmd. boesartigerweise dir einen string gibt, der deine ganze sql-Abfrage schrottet
                $res_geb = mysql_query($sql_geb) OR die(mysql_error());
                while ($row_geb = mysql_fetch_array($res_geb)) {
                $return .= $row_geb['vorname']." ".$row_geb['name']. " (".$row_geb['age'].") am ".$row_geb['geburtsdatum_gib']."<br />\n";
                }
                // Sollte es uebers Jahr hinausgehen
                if(mysql_num_rows($res_geb) < 6) {
                $anzahl = $anzahl - mysql_num_rows($res_geb);  // int
                $sql_geb = "SELECT * FROM `geburtstag_".$_SESSION['user']."`ORDER BY DATE_FORMAT(`geburtsdatum`, '%m-%d') ASC LIMIT 0, 5";
                $res_geb = mysql_query($sql_geb) OR die(mysql_error());
                while ($row_geb = mysql_fetch_array($res_geb) < $anzahl) {
                $return .= $row_geb['vorname']." ".$row_geb['name']. " (".$row_geb['age'].") am ".$row_geb['geburtsdatum_gib']."<br />\n";
                        }
                    }
                    return $return;
                }
                echo "<b>Es haben als n&auml;chstes ...</b><br/> <br />\n".geburtstage(15)." <br/><b>Geburtstag.</b>";
             ?>
<br/>
          <a href="all.php" class="button1">Alle Datens&auml;tze</a><br/>
           <a href="eintrag.php" class="button1">Datensatz eintragen</a><br/>
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