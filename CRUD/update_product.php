<?php
 
require('../db/db_connect.php');   
              
    $name = $_POST['name'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($_POST['tags']){
        $tags = $_POST["tags"];
        for ($i = 0; $i < count($tags); $i++) {
            $sql = "UPDATE product_tag SET tag_id = ? WHERE product_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_GET['cod'], $tags[$i]));          
        }
    }
    $sql = "UPDATE product SET name = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $_GET['cod']));
    Database::disconnect();
    echo"<script>  alert('Produto atualizado.');
        window.location.replace('../products.html');</script>";


?>  