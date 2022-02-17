<?php
 
require('../db/db_connect.php'); 
?>
    <select name="tags[]" class="form-select" multiple aria-label="multiple select example">
        <?php    
        $pdo = Database::connect();
        $sql = "SELECT * FROM tag ORDER BY id ASC";
        $q = $pdo->prepare($sql);
        $q->execute();
            foreach($pdo->query($sql)as $row){?>
                <option value="<?=$row['id']?>"><?=$row['id']?> - <?=$row['name']?></option>
            <?php } ?>
    </select>