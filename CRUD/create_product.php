<?php
 
require('../db/db_connect.php');   
              
    $name = $_POST['name'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO product (name) VALUES (?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name));
    Database::disconnect();
    
    $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 1";
    $q = $pdo->prepare($sql);
    $q->execute();
    $product= $q->fetch(PDO::FETCH_ASSOC);

    if($_POST['tags']){
        $tags = $_POST["tags"];
        for ($i = 0; $i < count($tags); $i++) {
            $sql = "INSERT INTO product_tag (product_id, tag_id) VALUES (?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($product['id'], $tags[$i]));
            Database::disconnect();
        }
    }

    echo"<script>  alert('Produto adicionado.');
        window.location.replace('../products.html');</script>";


?>  