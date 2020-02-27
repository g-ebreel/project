<?php

$dbname = "phonebook"; // name of database

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("phonebook") or die(mysql_error());

?> 