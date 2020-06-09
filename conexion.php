<?php
    $servidor = 'bqejlphwelhmqmqkgixg-mysql.services.clever-cloud.com';
    $usuario = 'uf1l6xcn5mhhk7sm';
    $clave = 'S3YIznA9DyhJzOcS6JIm';
    $base = 'bqejlphwelhmqmqkgixg';
    try {
        //code...
        $conn = new PDO("mysql:host=$servidor;dbname=$base;",$usuario,$clave);
    } catch (PDOException $e) {
            # code..
            die("Error en la conexion".$e->getMessage());   
    }
?>