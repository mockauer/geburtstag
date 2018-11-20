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
      <div align="center">
          <h2 id="h2">Suche</h2>
          <a href="all.php" target="_self"><input type="button" class="button1" value="Alle Datensätze anzeigen"/></a><br/>		
      </div>
      <?php
        //SQL-Abfrage
          $qq="SELECT * FROM geburtstag_".$_SESSION['user']."";
          $all=mysql_query($qq);
        //Suche
        $suchen=$_GET["suche"];
        if(isset($suchen))
        {           
            $suchquery="SELECT * FROM geburtstag_".$_SESSION['user']." WHERE name like '%".$suchen."%' or vorname like '%".$suchen."%' or mail like '%".$suchen."%'";
            $sqlsuche=mysql_query($suchquery);
            //Anzahl der gefunden Datensätze
            $numsuche=mysql_num_rows($sqlsuche);
             if ($numsuche == 0){
             echo "<p><font color='#F00'>";
             echo "Es wurden keine Datensätz gefunden.";
             echo "</font></p>";
               } elseif ($numsuche == 1){
                       echo "$numsuche Datensatz wurden gefunden<br/><br/>";
               echo "<table border='1' bordercolor='#FFCC00' style='background-color:#FFFFCC' width='678'>
             <colgroup>
                <col width='auto' />
                <col width='auto'/>
                <col width='auto'/>
                <col width='auto' />
                <col width='auto'/>
                <col width='auto'/>
                <col width='auto'/>
             </colgroup>";
            //Spalten mit Überschriften erstellen
               echo "<tr>
		<td align='center'>Vorname</td>
		<td align='center'>Familienname</td>
		<td align='center'>Geburtsdatum</td>
		<td align='center'>Alter</td>
		<td align='center'>E-Mail Adresse</td>
                <td  align='center'>&nbsp;</td>
                <td align='center'>&nbsp;</td>
                </tr>";
            while ($dsatz_suche=  mysql_fetch_assoc($sqlsuche)){
           echo "<tr>";
           echo "<td align='center'>" . $dsatz_suche["vorname"] . "</td>";
           echo "<td align='center'>" . $dsatz_suche["name"] . "</td>";
           echo "<td align='center'>" . $dsatz_suche["geburtsdatum"] . "</td>";
           echo "<td align='center'>" . $dsatz_suche["age"] . "</td>";
           echo "<td align='center'>" . $dsatz_suche["mail"] . "</td>";
           echo "<input name='id' value='" .$dsatz_suche['id'] ."' type='hidden'/>";
           echo "<td align='center'><a class='button1' href='aendern.php?id=" .$dsatz_suche['id'] ."'>Ändern</a></td>";
           echo "<td align='center'><a class='button1' href='loeschen.php?id=" . $dsatz_suche['id'] ."'>Löschen</a></td>";
           echo "</tr>";
              }
            echo "</table>";
            } else {
                  echo "Es wurden <b>$numsuche</b> Datens&auml;tze gefunden<br/><br/>";
            //Tabellenbeginn Suche
             echo "<table border='1' bordercolor='#FFCC00' style='background-color:#FFFFCC' width='678'>
             <colgroup>
                <col width='auto' />
                <col width='auto'/>
                <col width='auto'/>
                <col width='auto' />
                <col width='auto'/>
                <col width='auto'/>
                <col width='auto'/>
             </colgroup>";
             //Spalten mit Überschriften erstellen
               echo "<tr>
		<td align='center'>Vorname</td>
		<td align='center'>Familienname</td>
		<td align='center'>Geburtsdatum</td>
		<td align='center'>Alter</td>
		<td align='center'>E-Mail Adresse</td>
                <td  align='center'>&nbsp;</td>
                <td align='center'>&nbsp;</td>
               </tr>";
            while ($dsatz_suche=  mysql_fetch_assoc($sqlsuche)){
                echo "<tr>";
                echo "<td align='center'>" . $dsatz_suche["vorname"] . "</td>";
                echo "<td align='center'>" . $dsatz_suche["name"] . "</td>";
                echo "<td align='center'>" . $dsatz_suche["geburtsdatum"] . "</td>";
                echo "<td align='center'>" . $dsatz_suche["age"] . "</td>";
                echo "<td align='center'>" . $dsatz_suche["mail"] . "</td>";
                echo "<input name='id' value='" .$dsatz_suche['id'] ."' type='hidden'/>";
                echo "<td align='center'><a class='button1' href='aendern.php?id=" .$dsatz_suche['id'] ."'>Ändern</a></td>";
                echo "<td align='center'><a class='button1' href='loeschen.php?id=" . $dsatz_suche['id'] ."'>Löschen</a></td>";
                echo "</tr>";
                    }
                echo "</table>";
              }
        }
?>
  </div>
  <!-- End Right Column -->
  <!-- Begin Footer -->
  <div id="footer"> &copy; S.Lehmann ESEMOS GmbH 2011 | Version 2.0</div>
  <!-- End Footer -->
 </div>
<!-- End Wrapper -->
</body>
</html>