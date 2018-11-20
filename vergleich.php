<?php
require ("connect_inc_bday.php");
?>

        <?php
        //SQL-Abfrage
        $sql = "SHOW TABLES FROM usr_web122_1";
        $result = mysql_query($sql);
        if (!$result) {
        echo "DB Error, could not list tables\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
        }
        while ($row = mysql_fetch_row($result)) {
            //Datum vergleichen
            //Datum heute
            $heute=explode(".", $datum);
            $heutetag=$heute[0];
            $heutemonat=$heute[1];
            $tabname=substr($row[0],0,11);
            //SQL-Abfrage von Geburtsdatum und Mailadresse auslesen
            if(substr($row[0],0,11)=="geburtstag_"){
            $sqlab = mysql_query("SELECT geburtsdatum,mail,age,vorname FROM $row[0] ");
            while ($row1 = mysql_fetch_assoc($sqlab)) {
            //Datumstag und Datumsmonat einzeln
             $einzeln=explode("-", $row1['geburtsdatum']);
             $monatgeb=$einzeln[1];
             $taggeb=$einzeln[2];
            //Vergleich
            if ($taggeb==$heutetag && $monatgeb == $heutemonat){
            $usermail=substr($row[0],11);
            //E-Mail Header
            $from = "From: Geburtstagsdatenbank von $usermail\n";
            $from .= "Content-Type: text/html\n";
            mail($row1['mail'], "Geburtstagsmail", "Alles gute zum ". $row1["age"] .". Geburtstag liebe(r) " . $row1["vorname"] .".<br/> Liebe Gr&uuml;&szlig;e ".$usermail."<br/><br/><br/><small><small>Wenn du auch keinen Geburtstag deiner Freunde mehr vergessen willst, dann kannst du dir bei www.mockauer.de/Geburtstag/ auch einen Account anlegen und alle Geburtstage deiner Freunde verwalten.<br/>Dein Silvio Lehmann", $from);
                        }
                    }
                }
            }
            echo "Mail erfolgreich abgeschickt";
            ?>
