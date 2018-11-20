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
                        $jetzt = time();
                        $uhrzeit = date("H:i", $jetzt);
                        $datum = date("d.m.Y", $jetzt);
                        echo "$uhrzeit Uhr <br/> $datum";
                        ?>
                    </div>
                </div>
            </div>
            <!-- End Left Column -->
            <!-- Begin Right Column -->
            <div id="rightcolumn">
                <div align="center">
                    <h2 id="h2">Versionen/Dokumentation</h2>
                    <ul>
                        <li><b>Version 0.1</b>: 14.01.2011 Fertigstellung des Design</li>
                        <li><b>Version 0.2</b>: 17.01.2011 Fertigstellung des Kontaktformulars</li>
                        <li><b>Version 0.21</b>: 17.01.2011 Fertigstellung des Datums und der Uhrzeit</li>
                        <li><b>Version 0.3</b>: 17.01.2011 Fertigstellung das alle Datensätze angezeigt werden können</li>
                        <li><b>Version 0.4</b>: 18.01.2011 Fertigstellung des Eintragungsformular</li>
                        <li><b>Version 0.5</b>: 18.01.2011 Fertigstellung Datenbank anlegen</li>
                        <li><b>Version 0.51</b>: 19.01.2011 Fertigstellung Datenbankinhalte anzeigen</li>
                        <li><b>Version 0.52</b>: 19.01.2011 Fertigstellung Eintragsfeld ID</li>
                        <li><b>Version 0.53</b>: 19.01.2011 Fertigstellung neuer Eintrag in Datenbank</li>
                        <li><b>Version 0.54</b>: 19.01.2011 Automatische Altersberechnung; Eintragung in DB geht nicht mehr</li>
                        <li><b>Version 0.6</b>: 20.01.2011 Eintrag in DB geht wieder; Änder und Löschbutton erstellt; Testmandat doppelte Eintragung, ID Feld zeigt noch nciht das richtige an</li>
                        <li><b>Version 0.61</b>: 20.01.2011 ID-Feld weggemacht + Kontakt in Support unbenannt</li>
                        <li><b>Version 0.7</b>: 07.02.2011 Bearbeiten und Löschen der Datensätze möglich</li>
                        <li><b>Version 0.8</b>: 09./10.02.2011 Erfolgreiches Einbinden auf Webspace und Mailfunktion funktioniert</li>
                        <li><b>Version 0.9</b>: 10./11.02.2011 Funktionstest des Cronjobs</li>
                        <li><b>Version 1.0 (Alphaversion)</b>: 11.02.2011 Grundgerüst geht --> Verbesserungen nötig</li>
                        <li><b>Version 1.1 </b>: 14.02.2011 E-Mail wird versand, mit Alter und Namen und formatierten $header</li>
                        <li><b>Version 1.2 </b>: 17.02.2011 Sortierung in der Tabelle möglich</li>
                        <li><b>Version 1.3 </b>: 21.02.2011 Suchfunktion eingebaut</li>
                        <li><b>Version 1.4 </b>: 23.02.2011 nächsten 5 Geburtstagskinder auf der Startseite eingefügt</li>
                        <li><b>Version 1.41 </b>: 24.02.2011 Auslagerung des Connecten zur DB; erster Loginversuch fehlgeschlagen</li>
                        <li><b>Version 1.5 </b>: 28.02.2011 Login/Logout/Benutzer möglich</li>
                        <li><b>Version 1.51 </b>: 28.02.2011 eigene Benutzertabelle</li>
                        <li><b>Version 1.6 </b>: 01.03.2011 Neustrukturierung Menü</li>
                        <li><b>Version 1.7 </b>: 03.03.2011 Automatische E-Mail versendung, bei mehreren Tabellen funktioniert</li>
                        <li><b>Version 1.8 </b>: 03./04.03.2011 Funktionskontrolle Cronjob, bei mehreren Tabellen</li>
                        <li><b>Version 1.9 </b>: 03.03.2011 Doppelte Benutzernameanmeldung wurde ausgeschlossen</li>
                        <li><b>Version 2.0 (Betaphase)</b>: 04.03.2011 kleinere Bugs behoben und Quellcode versch&ouml;nert</li>
                    </ul>
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
