<?php
    require_once('../dbConfig.php');
    require_once('identifier.php');

    if (isset($_POST['input'])) {

        $input = $_POST['input'];

        $requete="SELECT * FROM users WHERE login LIKE '{$input}%' OR email LIKE '{$input}%'";

        $requeteCount="SELECT COUNT(*) countUser FROM users WHERE login LIKE '{$input}%'";

        $resultatUser=$pdo->query($requete);
        $resultatCount = $pdo->query($requeteCount);
        $tabCount = $resultatCount->fetch();
        $nbrUser = $tabCount['countUser'];

        if ($nbrUser > 0 ) {?>
        
            <div class="panel">
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    
                    <thead class="thead-dark">
                        <tr>
                            <th>login</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Etat</th>
                        </tr>
                    </thead>
                    <?php while ($user = $resultatUser->fetch()) { ?>
                    <tbody class="tbody-success">
                        
                            <td><?php echo $user['login'] ?> </td>
                            <td><?php echo $user['email'] ?> </td>
                            <td><?php echo $user['role'] ?> </td>
                            <td><?php echo $user['etat'] ?> </td>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    
    <?php

        } else {
            echo "<h6 class='text-danger text-center mt-3'>Utilisateur non trouvé !</h6>";
        }
    }

?>