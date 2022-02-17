<?php

require('../db/db_connect.php'); 
?>

    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">Produtos</th>
            </tr>
        </thead>
        <tbody>
        <?php                
            $pdo = Database::connect();
            $sql = "SELECT * FROM product ORDER BY id ASC";
            $q = $pdo->prepare($sql);
            $q->execute();
            foreach($pdo->query($sql)as $row){?>
                <tr>
                    <td>
                        <b>Código: </b><?php echo $row['id']?><br>
                        <b>Nome: </b><?php echo $row['name']?><br>
        
                        <button type="button" class="btn btn-secondary" onclick="location.href='edit-product.html?cod=<?=$row['id']?>'"><i class="ri-edit-2-fill"></i> Editar</button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ViewTagModal"><i class="bi bi-eye"></i> Ver tags</button>
                        <button type="button" class="btn btn-secondary" onclick="location.href='link-tag.html?cod=<?=$row['id']?>'"><i class="bi bi-tag-fill"></i> Vincular tag</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash-fill"></i> Deletar</button>
                    </td>

                    <!-- ViewTag Modal -->
                    <div class="modal fade" id="ViewTagModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Ver tags</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php 
                                $query = "SELECT * FROM tag WHERE id in 
                                (SELECT tag_id from product_tag where product_id = 
                                (SELECT id from product where id = ".$row['id']."))";
                                $q2 = $pdo->prepare($query);
                                $q2->execute();
                                foreach($pdo->query($query)as $srow){?>
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Tag:</b> <a href="tags.html"> <?=$srow['name']?></a></li>
                                    </ul>
                               <?php } ?>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                        </div>
                    </div><!-- End ViewTag Modal-->

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Deletar tag</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Certeza que deseja deletar o produto <?php echo $row['name']?>?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-danger" onclick="location.href='CRUD/delete_product.php?cod=<?=$row['id']?>'">Deletar</button>
                            </div>
                        </div>
                        </div>
                    </div><!-- End Delete Modal-->
                </tr>
            <?php 
            }  
            Database::disconnect();
            ?>