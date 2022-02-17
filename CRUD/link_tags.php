<?php
    require('../db/db_connect.php');   

    $id = $_GET['cod'];
    $tags = $_POST["tags"];
    for ($i = 0; $i < count($tags); $i++) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO product_tag (product_id, tag_id) VALUES (?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($id, $tags[$i]));
        Database::disconnect();
    }
?>