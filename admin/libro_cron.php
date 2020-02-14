<?php

require '/var/www/html/virtual/jardinvalleencantado.cl/www/admin/class/libro_class.php';
$libro = new Libro();
$lib = $libro->libro_cron();

?>