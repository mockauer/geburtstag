<?php
require ("connect_inc_bday.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Geburtstagsdaten</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="refresh" content="1; URL=all.php"/>
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
          <h2 id="h2">Datenbankerstellung</h2>
       
      
            <?php
         

           //Einzelnen Spalten werden erstellt
              $sql= "CREATE TABLE geburtstag (
                vorname varchar(30) NOT NULL,
                name varchar(30) NOT NULL,
                id int(10) NOT NULL auto_increment,
                geburtsdatum date NOT NULL,
                age int NOT NULL,
                mail varchar(60) NOT NULL,
                UNIQUE KEY id (id)
                )  ENGINE=MyISAM DEFAULT CHARSET=latin1";
           $db=mysql_query($sql);

         if ($db)
        {
            echo "<p><font color='#008000'>";
            echo "Der Datenbank wurde erfolgreich kreiert";
            echo "</font></p>";
        }
        else {
            echo "<p><font color='#F00'>";
             echo "Die Datenkbank existiert bereits";
             echo "</font></p>";
            
             
        }
          
           ?>
</div>

  </div>
  <!-- End Right Column -->
  <!-- Begin Footer -->
  <div id="footer"> &copy; S.Lehmann ESEMOS GmbH 2011 | Version 1.5</div>
  <!-- End Footer -->
 </div>
<!-- End Wrapper -->
</body>
</html>
