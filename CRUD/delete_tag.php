<?php

require('../db/db_connect.php'); 

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM tag where id = ? ";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['cod']));
    Database::disconnect();
    echo"<script>  alert('Tag excluída');
                    window.location.replace('../tags.html');</script>";

?>
