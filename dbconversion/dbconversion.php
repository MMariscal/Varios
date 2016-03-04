<?php
    $dbname = 'ntcserie22';
    mysql_connect('localhost', 'user', '123456');
    mysql_query("ALTER DATABASE `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
    $result = mysql_query("SHOW TABLES FROM `$dbname`");
    while($row = mysql_fetch_row($result)) {
     $query = "ALTER TABLE {$dbname}.`{$row[0]}` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci";
     mysql_query($query);
     $query = "ALTER TABLE {$dbname}.`{$row[0]}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
     mysql_query($query);
    }
    echo 'Todas las tablas han sido modificadas';
?>