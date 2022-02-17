<?php

require('../db/db_connect.php'); 
?>

    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">Tags</th>
            </tr>
        </thead>
        <tbody>
        <?php                
            $pdo = Database::connect();
            $sql = "SELECT * FROM tag ORDER BY id ASC";
            $q = $pdo->prepare($sql);
            $q->execute();
            foreach($pdo->query($sql)as $row){?>
                <tr>
                    <td>
                        <b>Código: </b><?php echo $row['id']?><br>
                        <b>Nome: </b><?php echo $row['name']?><br>
        
                        <button type="button" class="btn btn-secondary" onclick="location.href='edit-tag.html?cod=<?=$row['id']?>'"><i class="ri-edit-2-fill"></i> Editar</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash-fill"></i> Deletar</button>
                    </td>
                </tr>

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Deletar tag</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Certeza que deseja deletar a tag <?php echo $row['name']?>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-danger" onclick="location.href='CRUD/delete_tag.php?cod=<?=$row['id']?>'">Deletar</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Delete Modal-->
            <?php 
            }  
            Database::disconnect();
            ?>