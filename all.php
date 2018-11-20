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
	 <a href="eintrag.php" target="_self"><input type="button" class="button1" value="Neuen Datensatz hinzufügen"/></a><br/>
</div>
        <?php
               //SQL-Abfrage
              $sort=(isset($_GET['sort']))?$_GET['sort']:'name';
              $sd=$_GET['sd'];
              //?'desc':'asc'; heißt so viel wie ist Parameter sd vorhanden, nimm den ersten Wert, also 'desc', wenn nicht, nimm den 2. Wert, also 'asc'.
              $qq="SELECT * FROM geburtstag_".$_SESSION['user']." order by ".$sort." ".$sd;
              $all=mysql_query($qq);
              //Ermitteln der Datensätze
              $num=mysql_num_rows($all);
              if ($num == 0)
                  {
                  echo "Es sind keine Datensätze vorhanden";
                  } elseif ($num == 1){
                       echo "<table border='0' width='auto'>
                      <colgroup>
                        <col width='auto' />
                        <col width='auto'/>
                      </colgroup>
                        <tr><td>Es wurde <b>$num</b> Datensatz gefunden</td></tr>
                        <tr><td align='center'>
                        <form method='get' action='suche.php'>
                        <input type='text' name='suche'/><input type='submit' value='Suchen' class='button1'/>
                        </form>
                        </td>
                        </tr></table>";
                    } else {
                            echo "<table border='0' width='auto'>
                            <colgroup>
                            <col width='auto' />
                            <col width='auto'/>
                            </colgroup>
                            <tr><td>Es wurden <b>$num</b> Datensätze wurden gefunden</td></tr>
                            <tr><td align='left'>
                            <form method='get' action='suche.php'>
                            <input type='text' name='suche'/>&nbsp;<input type='submit' value='Suchen' class='button1'/>
                            </form>
                            </td>
                            </tr></table>";
                    }
                    //Tabellenbeginn
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
                    <td align='center'>Vorname&nbsp;<a class='linktabelle' href='all.php?sort=vorname&sd=asc'><img src='img/dreieck.gif'/></a><a class='linktabelle' href='all.php?sort=vorname&sd=desc'><img src='img/dreiecku.gif'/></a></td>
                    <td align='center'>Familienname&nbsp;<a class='linktabelle' href='all.php?sort=name&sd=asc'><img src='img/dreieck.gif'/></a><a class='linktabelle' href='all.php?sort=name&sd=desc'><img src='img/dreiecku.gif'/></a></td>
                    <td align='center'>Geburtsdatum&nbsp;<a class='linktabelle' href='all.php?sort=geburtsdatum&sd=asc'><img src='img/dreieck.gif'/></a><a class='linktabelle' href='all.php?sort=geburtsdatum&sd=desc'><img src='img/dreiecku.gif'/></a></td>
                    <td align='center'>Alter&nbsp;<a class='linktabelle' href='all.php?sort=age&sd=asc'><img src='img/dreieck.gif'/></a><a class='linktabelle' href='all.php?sort=age&sd=desc'><img src='img/dreiecku.gif'/></a></td>
                    <td align='center'>E-Mail Adresse&nbsp;<a class='linktabelle' href='all.php?sort=mail&sd=asc'><img src='img/dreieck.gif'/></a><a class='linktabelle' href='all.php?sort=mail&sd=desc'><img src='img/dreiecku.gif'/></a></td>
                    <td  align='center'>&nbsp;</td>
                    <td align='center'>&nbsp;</td>
                    </tr>";
                   //Datensätze in Tabelle einlesen
                   while ($dsatz=  mysql_fetch_assoc($all)){
                   echo "<tr>";
                   echo "<td align='center'>" . $dsatz["vorname"] . "</td>";
                   echo "<td align='center'>" . $dsatz["name"] . "</td>";
                   echo "<td align='center'>" . $dsatz["geburtsdatum"] . "</td>";
                   echo "<td align='center'>" . $dsatz["age"] . "</td>";
                   echo "<td align='center'>" . $dsatz["mail"] . "</td>";
                   echo "<input name='id' value='" .$dsatz['id'] ."' type='hidden'/>";
                   echo "<td align='center'><a class='button1' href='aendern.php?id=" .$dsatz['id'] ."'>Ändern</a></td>";
                   echo "<td align='center'><a class='button1' href='loeschen.php?id=" . $dsatz['id'] ."'>Löschen</a></td>";
                   echo "</tr>";
                   }
                   echo "</table>";
                   ?>
</div>
  <!-- End Right Column -->
  <!-- Begin Footer -->
  <div id="footer"> &copy; S.Lehmann ESEMOS GmbH 2011 | Version 2.0</div>
  <!-- End Footer --> </div>
<!-- End Wrapper -->
</body>
</html>