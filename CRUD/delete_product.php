<?php

require('../db/db_connect.php'); 

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM product where id = ? ";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['cod']));
    Database::disconnect();
    echo"<script>  alert('Produto excluído');
                    window.location.replace('../products.html');</script>";

?>
