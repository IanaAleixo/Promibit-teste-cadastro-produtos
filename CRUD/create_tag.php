<?php
 
require('../db/db_connect.php');   
              
    $name = $_POST['name'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO tag (name) VALUES (?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name));
    Database::disconnect();
    echo"<script>  alert('Tag adicionada.');
        window.location.replace('../tags.html');</script>";

?>  