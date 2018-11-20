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
      <h2 id="h2">Support</h2>
      <div align="center">
          <form method="post" action="kontakt.php">
          <table>
              <tr>
                  <td align="right">Name:</td>
                  <td><input name="namekontakt" size="25"/></td>
              </tr>
              <tr>
                  <td align="right">E-Mail-Adresse:</td>
                  <td><input name="mailkontakt" size="25"/></td>
              </tr>
              <tr>
                  <td align="right">Betreff:</td>
                  <td><input name="betreff" size="25"/></td>
              </tr>
              <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
              </tr>
              <tr>
                  <td align="right">Nachricht:</td>
                  <td><textarea name="nachricht" cols="25" rows="10"></textarea></td>
              </tr>
              <tr>
                  <td align="right"></td>
                  <td><input type="submit" class="button1" name="send"/>&nbsp;<input type="reset" class="button1"/></td>
              </tr>
          </table>
      </form>
      </div>
        <?php
        $send=$_POST["send"];
        $nachricht=$_POST["nachricht"];
        $betreff=$_POST["betreff"];
        $mailkontakt=$_POST["mailkontakt"];
        $namekontakt=$_POST["namekontakt"];
        $to="support@mockauer.de";
        //E-Mail Header
        $from = "From: Support Geburtsdatenbank\n <$mailkontakt>\n";
        if (isset($send)){
        if ($nachricht != "" && $betreff !="" && $mailkontakt != "" && $namekontakt!=""){
          echo "<p><font color='#008000'>";
          echo "Der Support wird sich umgehend bei Ihnen melden";
          echo "</font></p>";
        mail($to, $betreff, "Von $namekontakt wurde eine Supportanfrage gestellt. \n Antworten k&ouml;nnen Sie $namekontakt per Mail: $mailkontakt \n \n Folgende Nachricht wurde Ihnen zugesandt: \n $nachricht", $from);
        } else {
          echo "<p><font color='#F00'>";
          echo "Sie müssen alle Felder ausfüllen!";
          echo "</font></p>";
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