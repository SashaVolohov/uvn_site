<?php
    
    $mysql_settings = array(
        'server' => "localhost",
        "user" => "root",
        "password" => "root",
        "db" => "vir_countries"
    );

    $connection = mysqli_connect($mysql_settings['server'], $mysql_settings['user'], $mysql_settings['password']);
    $select_db = mysqli_select_db($connection, $mysql_settings['db']);

?>
