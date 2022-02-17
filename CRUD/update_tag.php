<?php
 
require('../db/db_connect.php'); 
        $name = $_POST['name'];
        
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tag SET name=? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $_GET['cod']));
        Database::disconnect();
        echo"<script>  alert('Tag editada');
                     window.location.replace('../tags.html');</script>";
?>  