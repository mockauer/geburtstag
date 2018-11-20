<?php
session_start();
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
          <h2 id="h2">Geburtstagsdatenbankapplikation</h2>
          Herzlich Willkommen, <br/>dies ist eine Webapplikation, welche die Geburtstage deiner Freunde, Kollegen, Familienangehörigen und so weiter speichert und verwaltet.<br/>
          Du kannst alle Geburtstage speichern und es wird automatisch eine Geburtstagmail an die entsprechende Person geschickt.
          <hr class="hr"/>
     <br/>
     <a href="verlauf.php" ><input type="button" name="verlauf" value="Historie" class="button1"/></a><br/>
        <h2 id="h2">Login</h2>
            <form action="index.php" method="post" >
           <table>
               <tr>
                   <td align="right">Benutzername:</td>
                   <td align="left"><input name="username" type="text" size="35" /></td>
               </tr>
               <tr>
                   <td align="right">Passwort:</td>
                   <td align="left"><input name="password" type="password" size="35" /></td>
               </tr>
           </table>
        <input type="submit" class="button1" value="Login" name="login" size="35"/>
        </form>
        Sollten Sie noch nicht registriert sein, k&ouml;nnen Sie sich hier <a class="button1" href="registrierung.php">registrieren.</a><br/><br/>
                <?php
                    $username=$_POST['username'];
                    $password=md5($_POST['password']);
                    $query=mysql_query("SELECT username, password FROM user WHERE username ='".$username."'") or die("konnte nicht selecten!!!");
                    mysql_real_escape_string($username);
                    mysql_real_escape_string($password);
                    $result=mysql_fetch_array($query);
                    if(!$result['username']){
                    echo "<p><font color='#F00'>";
                    echo "Die Logindaten sind falsch.<br/>";
                    echo "</font> Bei Fragen können Sie sich an den <a class='button1' href='mailto:admin@mockauer.de'>Administrator</a> wenden.</p>";
                    } elseif($password != $result['password']){
                    echo "<p><font color='#F00'>";
                    echo "Die Logindaten sind falsch.<br/>";
                    echo "</font> Bei Fragen können Sie sich an den <a class='button1' href='mailto:admin@mockauer.de'>Administrator</a> wenden.</p>";
                    } else {
                    $_SESSION['user']=$username;
                    echo "<p><font color='#008000'>";
                    echo "Du hast dich erfolgreich eingeloggt!";
                    echo "</font></p>";
                    echo "<meta http-equiv='refresh' content='2; URL=login1.php'/>";
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
