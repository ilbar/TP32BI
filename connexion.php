<?php
try {
        $db= new PDO('mysql:host=localhost;dbname=TP3;charset=utf8', 'root', ''); 
    }
catch (Exception $e) {
        die('Error : ' . $e->getMessage()); 
    }
?>